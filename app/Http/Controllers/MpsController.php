<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\User;
use App\Models\Career;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MpsController extends Controller
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
        $career_id = $request->header('career-id');
        if ($token) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if ($user['token'])
                $data = Mp::select("*")->where("career_id", $career_id)->get();
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
    }

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
        $parsedReq = json_decode($request->data, true);
        if ($token) {
            $mp = new Mp;
            $mp->career_id = $parsedReq['career_id'];
            $mp->code = $parsedReq['code'];
            $mp->name = $parsedReq['name'];
            $mp->description = $parsedReq['description'];
            $status = $mp->save();
            if ($status) {
                $data = ["status" => "Nou modul creat correctament."];
                Log::channel('dblogging')->info("Ha creado un nuevo Modulo", ["user_id" => Auth::id(), "mp_id" => $mp->id]);
            }
        }
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mp  $mp
     * @return \Illuminate\Http\Response
     */
    public function show(Mp $mp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mp  $mp
     * @return \Illuminate\Http\Response
     */
    public function edit(Mp $mp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mp  $mp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mp $mp)
    {
        $parsedReq = json_decode($request->data, true);
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                if ($request->type === "softDelete") {
                    $mp->active = 0;
                } else {
                    $mp->name = $parsedReq->name;
                    $mp->description = $parsedReq['description'];
                    $mp->code = $parsedReq['code'];
                }
                $mp->touch();

                $status = $mp->save();
                if ($status)
                    $data = ["status" => "MOdulo actualitzat correctament."];

                if ($request->type === "softDelete") {
                    $data = ["status" => "Modul eliminat correctament."];
                    Log::channel('dblogging')->info("Ha eliminado un Modulo", ["user_id" => Auth::id(), "mp_id" => $mp->id]);
                } else {
                    $data = ["status" => "Modul actualitzat correctament."];
                    Log::channel('dblogging')->info("Ha actualizado un Modulo", ["user_id" => Auth::id(), "mp_id" => $mp->id]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mp  $mp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mp $mp)
    {
    }
}
