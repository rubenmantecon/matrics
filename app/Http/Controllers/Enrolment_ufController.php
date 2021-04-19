<?php

namespace App\Http\Controllers;

use App\Models\Enrolment_uf;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Enrolment_ufController extends Controller
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
                $filter = $request->header('filter');
                // Filter enrolment_ufs by uf (uf_id)
                if (isset($filter) && $filter == "uf") {
                    $uf_id = $request->header('uf_id');
                    if (isset($uf_id) && $uf_id != "empty"){
                        $data = Enrolment_uf::select("*")->where("uf_id", $uf_id);
                        if (sizeof($data) == 0){
                            return response()->json(['status' => "warning", "text" => 'No hi ha matriculacions per aquesta unitat formativa']);
                        } else {
                            return response()->json($data);
                        }
                    } else {
                        return response()->json(['status' => "error", "text" => "Unitat formativa no trobada"]);
                    }
                // Filter enrolment_ufs by enrolment_id (enrolment_id)
                } else if (isset($filter) && $filter == "enrolment"){
                    $enrolment_id = $request->header('enrolment_id');
                    if (isset($enrolment_id) && $enrolment_id != "empty") {
                        $data = Enrolment_uf::select("*")->where("enrolment_id", $enrolment_id);
                        if (sizeof($data) == 0){
                            return response()->json(['status' => "warning", "text" => 'No hi ha ufs per aquesta matriculacio']);
                        } else {
                            return response()->json($data);
                        }
                    }else {
                        return response()->json(['status' => "error", "text" => 'Matricula no trobada']);
                    }
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
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {

                $enrolment_uf = new Enrolment_uf;
                $enrolment_uf->uf_id = $request->uf_id;
                $enrolment_uf->enrolment_id = $request->enrolment_id;
                $status = $enrolment_uf->save();
                if ($status) {
                    $data = ["status" => "Unitat formativa afegida a la matricula."];
                    Log::channel('dblogging')->info("Ha añadido una uf a la matricula", ["user_id" => Auth::id(), "enrolment_uf_id" => $enrolment_uf->id]);
                }
            }
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrolment_uf  $enrolment_uf
     * @return \Illuminate\Http\Response
     */
    // public function show(Enrolment_uf $enrolment_uf)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrolment_uf  $enrolment_uf
     * @return \Illuminate\Http\Response
     */
    // public function edit(Enrolment_uf $enrolment_uf)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrolment_uf  $enrolment_uf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrolment_uf $enrolment_uf)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                $enrolment_uf->uf_id = $request->uf_id;
                $enrolment_uf->enrolment_id = $request->enrolment_id;
                $enrolment_uf->touch();
                $status = $enrolment_uf->save();
                if ($status){
                    $data = ["status" => "Unitat formativa de la matricula actualitzada correctament."];
                    Log::channel('dblogging')->info("Ha actualizado una matricula", ["user_id" => Auth::id(), "enrolment_uf_id" => $enrolment_uf->id]);
                } else {
                    $data = ["status" => "Error en actualitzar la uf del enrolment."];
                }
                    
            }
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrolment_uf  $enrolment_uf
     * @return \Illuminate\Http\Response
     */
    // public function destroy(enrolment_uf $enrolment_uf)
    // {
    //     //
    // }

    public function destroy(Request $request, Enrolment_uf $enrolment_uf)
    {
        $id = $request->enrolment_uf_id;
        Enrolment_uf::destroy($id);
    }
}
