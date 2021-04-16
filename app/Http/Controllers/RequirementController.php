<?php

namespace App\Http\Controllers;

use App\Models\Requirement;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RequirementController extends Controller
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
                $profile_req_id = $request->header('profile_req_id');
                if (isset($profile_req_id) && $profile_req_id != "empty") {
                    $data = Requirement::select("*")->where("profile_req_id", $profile_req_id)->get();
                    if (sizeof($data) == 0){
                        return response()->json(['status' => "warning", "text" => 'No hi ha requeriments per aquest perfil.']);
                    } else {
                        return response()->json($data);
                    }
                } else {
                    return response()->json(['status' => "error", "text" => 'Perfil no trobat']);
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

                $req = new Requirement;
                $req->profile_id = $request->profile_id;
                $req->name = $request->name;

                $status = $req->save();
                if ($status) {
                    $data = ["status" => "Nou requeriment creat correctament."];
                    Log::channel('dblogging')->info("Ha creado un nuevo requerimiento", ["user_id" => Auth::id(), "requirement_id" => $req->id]);
                }
            }
					}
					if (isset($data['status'])) {
						Log::channel('dblogging')->info("No se ha enviado token de identificación en la request. Conexión rechazada. HTTP 503");
					}
					return response()->json($data);
				}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    // public function show(Requirements $requirements)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    // public function edit(Requirements $requirements)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requirement $requirement)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                $requirement->name = $request->name;
                $requirement->touch();

                $status = $requirement->update();
                if ($status){
                    $data = ["status" => "Requeriment actualitzat correctament."];
                    Log::channel('dblogging')->info("Ha actualizado un requerimiento", ["user_id" => Auth::id(), "requirement_id" => $requirement->id]);
                } else {
                    $data = ["status" => "Requeriment NO actualitzat."];
                }
            }
        }
				if (isset($data['status'])) {
					Log::channel('dblogging')->info("No se ha enviado token de identificación en la request. Conexión rechazada. HTTP 503");
				}
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requirement  $requirements
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Requirement $requirement)
    // {
    //     //
    // }

    public function destroy(Request $request, Requirement $req)
    {
        $id = $req->id;
        Requirement::destroy($id);
    }
}
