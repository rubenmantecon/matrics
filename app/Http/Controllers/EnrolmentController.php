<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Enrolment;
use App\Models\User;
use App\Models\Career;
use App\Models\Mp;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EnrolmentController extends Controller
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
                $user_id = $request->header('user_id');
                if (isset($user_id) && $user_id != "empty") {
                    // ME FALTA COGER LOS REQUERIMINETOS CON LOS ARCHIVOS
                    $user = User::where("id", $user_id)->get()[0];
                    $enrolment = Enrolment::where("user_id", $user_id)->get()[0];
                    $career = Career::where("id", $enrolment['career_id'])->get()[0];
                    $mps = Mp::where("career_id", $career['id'])->get();
                    $data = ["user" => $user, "career" => $career, "mps" => $mps];
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

                $enrolment = new Enrolment;
                $enrolment->user_id = $request->user_id;
                $enrolment->term_id = $request->term_id;
                $enrolment->career_id = $request->career_id;
                $enrolment->dni = $request->dni;
                $enrolment->state = "pending"; // Matrícula. Pending/validated
                // $status = $enrolment->save();
                // if ($status) {
                //     $data = ["status" => "Nova matricula creada correctament."];
                //     Log::channel('dblogging')->info("Ha creado una nueva matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
                // }
                $status = $enrolment->save();
                if ($status) {
                    $data = ["status" => "Nova matricula creada correctament."];
                    Log::channel('dblogging')->info("Ha creado una nueva matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
                }
            }
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    // public function show(Enrolment $enrolment)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    // public function edit(Enrolment $enrolment)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Enrolment $enrolment, User $user)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                // Update enrolment
                $enrolment->user_id = $request->user_id;
                $enrolment->term_id = $request->term_id;
                $enrolment->dni = $request->dni;
                $enrolment->state = $request->state; // pending or validated
                $enrolment->touch();
                $status1 = $enrolment->save();

                // Update user
                $user->user_id = $request->user_id;
                $user->firstname = $request->firstname;
                $user->lastname1 = $request->lastname1;
                $user->lastname2 = $request->lastname2;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->touch();
                $status2 = $user->save();
                
                if ($status1 && $status2){
                    $data = ["status" => "Matricula actualitzada correctament."];
                    Log::channel('dblogging')->info("Ha actualizado una matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
                } else {
                    $data = ["status" => "Error en actualitzar enrolment."];
                }
            }
        }
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enrolment  $enrolment
     * @return \Illuminate\Http\Response
     */
    // public function destroy(enrolment $enrolment)
    // {
    //     //
    // }

    public function destroy(Request $request, Enrolment $enrolment)
    {
        $id = $request->id;
        Enrolment::destroy($id);
    }
}
