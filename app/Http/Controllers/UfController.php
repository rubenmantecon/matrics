<?php

namespace App\Http\Controllers;

use App\Models\Uf;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UfController extends Controller
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
                $mp_id = $request->header('mp_id');
                if (isset($mp_id) && $mp_id != "empty") {
                    $data = Uf::select("*")->where("active", 1)->where("mp_id", $mp_id)->get();
                    if (sizeof($data) == 0){
                        return response()->json(['status' => "warning", "text" => 'No hi ha Unitats Formatives']);
                    } else {
                        return response()->json($data);
                    }
                } else {
                    return response()->json(['status' => "error", "text" => 'Modul no trobat']);
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

                $Uf = new Uf;
                $Uf->start = $request->mp_id;
                $Uf->end = $request->code;
                $Uf->name = $request->name;
                $Uf->description = $request->desc;

                $status = $Uf->save();
                if ($status) {
                    $data = ["status" => "Nova unitat formativa creada correctament."];
                    Log::channel('dblogging')->info("Ha creado una nueva UF", ["user_id" => Auth::id(), "uf_id" => $Uf->id]);
                }
            }
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    // public function show(Uf $uf)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    // public function edit(Uf $uf)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uf  $uf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uf $Uf)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                if ($request->type === "softDelete") {
                    $Uf->active = 0;
                } else {
                    $Uf->name = $request->name;
                    $Uf->description = $request->desc;
                }
                $Uf->touch();

                $status = $Uf->save();
                if ($status)
                    $data = ["status" => "Unitat formativa actualitzada correctament."];

                if ($request->type === "softDelete") {
                    $data = ["status" => "Unitat formativa eliminada correctament."];
                    Log::channel('dblogging')->info("Ha eliminado una Unidad Formativa", ["user_id" => Auth::id(), "uf_if" => $Uf->id]);
                } else {
                    $data = ["status" => "Unitat formativa actualitzada correctament."];
                    Log::channel('dblogging')->info("Ha actualizado una unidad formativa", ["user_id" => Auth::id(), "uf_id" => $Uf->id]);
                }
            }
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\uf  $uf
     * @return \Illuminate\Http\Response
     */
    // public function destroy(uf $uf)
    // {
    //     //
    // }
}
