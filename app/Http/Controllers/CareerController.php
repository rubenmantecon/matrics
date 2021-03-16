<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if ($user['token']) {
                $term_id = $request->header('term_id');
                if (isset($term_id) && $term_id != "empty") {
                    $term = Term::select("active")->where("id", $term_id)->get();
                    if (sizeof($term) == 0)
                        return response()->json(['status' => "warning", "text" => 'Curs desactivat, redireccionant ...']);
                    if ($term[0]['active']) {
                        $data = Career::select("*")->where("term_id", $term_id)->get();
                    } else {
                        $data = ['status' => "warning", "text" => 'Curs desactivat, redireccionant ...'];
                    }
                } else {
                    $data = ['status' => "error", "text" => 'Curs no trobat, redireccionant ...'];
                }
            }
        }
        return response()->json($data);
    }

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
                if (empty($career["DATA_FI_CICLE_FORMATIU"])) {
                    $c->end = null;
                } else {
                    $c->end = $career["DATA_FI_CICLE_FORMATIU"];
                }

                $status = $c->save();
            }
        }

        if ($status)
            $data = ["status" => "Nou cicle creat correctament."];
        Log::channel('dblogging')->info("Ha creado un nuevo Ciclo", ["user_id" => Auth::id(), "career_id" => $c->id]);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    // public function show(Term $term)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    // public function edit(Term $term)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $token = $request->header('token');
        $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];

        if ($user['token']) {
            $career->code = $request->code;
            $career->name = $request->name;
            $career->description = $request->desc;
            $career->hours = $request->hours;
            $career->start = $request->start;
            $career->end = $request->end;
            if ($request->type === "softDelete")
                $career->active = 0;
            $career->touch();

            $status = $career->save();
            if ($status)
                $data = ["status" => "Cicle actualitzat correctament."];

            if ($request->type === "softDelete") {
                $data = ["status" => "Curs eliminat correctament."];
                Log::channel('dblogging')->info("Ha eliminado un Ciclo", ["user_id" => Auth::id(), "career_id" => $career->id]);
            } else {
                $data = ["status" => "Curs actualitzat correctament."];
                Log::channel('dblogging')->info("Ha actualizado un Ciclo", ["user_id" => Auth::id(), "career_id" => $career->id]);
            }
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Term $term)
    // {
    //     //
    // }
}
