<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
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
                $upload_id = $request->header('upload_id');
                if (isset($upload_id) && $upload_id != "empty") {
                    $data = Upload::select("data")->where("id", $upload_id)->get()[0];
                    return response()->json($data);
                } else {
                    return response()->json(['status' => "error", "text" => "Usuari no trobat"]);
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // prototipo, a la espera de poner en comun con el equipo de front alumno        
        //dd($request);
        $count = 0;
        if ($request->DNI) {
            // return ("El dni ha llegao");
            $upload = new Upload;
            $upload->data = base64_encode(file_get_contents($request->DNI));
            $upload->req_enrol_id = 1;
            $upload->save();
            $count++;
        }

        if ($request->tarjeta_sanitaria) {
            $upload = new Upload;
            $upload->data = base64_encode(file_get_contents($request->tarjeta_sanitaria));
            $upload->req_enrol_id = 1;
            $upload->save();
            $count++;
        }
        if ($request->resguard_del_titol) {
            $upload = new Upload;
            $upload->data = base64_encode(file_get_contents($request->resguard_del_titol));
            $upload->req_enrol_id = 1;
            $upload->save();
            $count++;
        }
        if ($request->resguard_del_pagament) {
            $upload = new Upload;
            $upload->data = base64_encode(file_get_contents($request->resguard_del_pagament));
            $upload->req_enrol_id = 1;
            $upload->save();
            $count++;
        }
        if ($count > 0) {
            return redirect("/dashboard/documents?status=success&text=Importació de documents completada correctament.");
        } else {
            return redirect("/dashboard/documents?status=error&text=La importació de documents ha fallat intenta-ho de nou més tard");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }
}
