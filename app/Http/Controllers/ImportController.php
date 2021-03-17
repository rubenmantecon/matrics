<?php

namespace App\Http\Controllers;

use \Datetime;
use Carbon\Carbon;

use App\Models\Career;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Validator, Redirect, Response, File;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $token = $request->header('token');
        $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];

        if ($user['token']) {
        */

        //dd($request);
        if (isset($request->import_file)) {
            $tmp = base64_decode(explode(",", $request->file)[1]);
            $array = array_map("str_getcsv", explode("\n", $tmp));
            $stash_control = array();
            $stash = array();
            $array = array_slice(array_slice($array, 1), 0, -1);
            foreach ($array as $element) {
                //Existe CODI_CICLE_FORMATIU?
                if (array_key_exists($element[0], $stash_control)) {
                    // Existe CODI_MODUL?
                    if (array_key_exists($element[6], $stash_control[$element[0]]["modulos"])) {
                        $stash_control[$element[0]]["modulos"][$element[6]]["ufs"][$element[12]] = $element[13];
                    } else {
                        $stash_control[$element[0]]["modulos"][$element[6]] = array("NOM_MODUL" => $element[7], "DURADA_MIN_MODUL" => $element[8], "DURADA_MAX_MODUL" => $element[9], "DATA_INICI_MODUL" => $element[10], "DATA_FI_MODUL" => $element[11], "ufs" => array($element[12] => $element[13]));
                    }
                } else {
                    // nuevo ciclo
                    if (sizeof($element) == 19) {
                        $stash_control[$element[0]] = array("NOM_CICLE_FORMATIU" => $element[1], "CODI_ADAPTACIO_CURRICULAR" => $element[2], "HORES_CICLE_FORMATIU" => $element[3], "DATA_INICI_CICLE_FORMATIU" => $element[4], "DATA_FI_CICLE_FORMATIU" => $element[5], "modulos" => array());
                    }
                }
            }

            $json = json_encode($stash_control);
            return $json;
        } else {
            // Check if term_id exist
            $careers = json_decode($request->data, true);
            foreach ($careers as $career) {
                $c = new Career;
                $c->term_id = $request->term_id;
                $c->code = $career["CODI"];
                $c->name = $career["NOM_CICLE_FORMATIU"];
                $c->description = "";
                $c->hours = $career["HORES_CICLE_FORMATIU"];
                $c->start = $career["DATA_INICI_CICLE_FORMATIU"];

                if (config('app.env') != "local") {
                    $source = $career["DATA_INICI_CICLE_FORMATIU"];
                    $date = date_create(str_replace("/", "-", $source));
                    $newFormat = Carbon::parse(date_format($date, 'd-m-y'));
                    $c->start = $newFormat->format('m-d-y');
                }

                if (empty($career["DATA_FI_CICLE_FORMATIU"])) {
                    $c->end = null;
                } else {
                    $c->end = $career["DATA_FI_CICLE_FORMATIU"];
                }

                $status = $c->save();
                if ($status) {
                    $data = ["status" => "Nou cicle creat correctament."];
                    Log::channel('dblogging')->info("Ha creado un nuevo Ciclo", ["user_id" => Auth::id(), "career_id" => $c->id]);
                }
            }
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $user)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    // {
    //     //
    // }
}
