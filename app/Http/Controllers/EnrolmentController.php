<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use App\Models\User;
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
                $filter = $request->header('filter');
                // Filter enrolments by user (user_id)
                if (isset($filter) && $filter == "user") {
                    $user_id = $request->header('user_id');
                    if (isset($user_id) && $user_id != "empty"){
                        // Estado de los documentos, nombre de usuario, ciclo y módulo
                        // ->join('contacts', 'users.id', '=', 'contacts.user_id')
                        $data = Enrolment::join('users', 'enrolments.user_id', '=', 'users.id')->join('careers', 'enrolments.career_id', '=', 'careers.id')->join('mps', 'career.id', '=', 'mps.career_id')->select("*")->where("user_id", $user_id);
                        if (sizeof($data) == 0){
                            return response()->json(['status' => "warning", "text" => 'No hi ha matriculacions']);
                        } else {
                            return response()->json($data);
                        }
                    } else {
                        return response()->json(['status' => "error", "text" => "Usuari no trobat"]);
                    }
                // Filter enrolments by term (term_id)(Curso)
                } else if (isset($filter) && $filter == "term"){
                    $term_id = $request->header('term_id');
                    if (isset($term_id) && $term_id != "empty") {
                        $data = Enrolment::join('users', 'enrolments.user_id', '=', 'users.id')->join('careers', 'enrolments.career_id', '=', 'careers.id')->join('mps', 'career.id', '=', 'mps.career_id')->select("*")->where("term_id", $term_id);
                        if (sizeof($data) == 0){
                            return response()->json(['status' => "warning", "text" => 'No hi ha matriculacions']);
                        } else {
                            return response()->json($data);
                        }
                    }else {
                        return response()->json(['status' => "error", "text" => 'Curs no trobat']);
                    }
                // Filter enrolments by career (career_id) (Grado)
                } else if (isset ($filter) && $filter == "carrer"){
                    $career_id = $request->header('career_id');
                    if (isset($career_id) && $career_id != "empty") {
                        $data = Enrolment::join('users', 'enrolments.user_id', '=', 'users.id')->join('careers', 'enrolments.career_id', '=', 'careers.id')->join('mps', 'career.id', '=', 'mps.career_id')->select("*")->where("career_id", $career_id);
                        if (sizeof($data) == 0){
                            return response()->json(['status' => "warning", "text" => 'No hi ha matriculacions']);
                        } else {
                            return response()->json($data);
                        }
                    } else {
                        return response()->json(['status' => "error", "text" => 'Curs no trobat']);
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

                $enrolment = new Enrolment;
                $enrolment->user_id = $request->user_id;
                $enrolment->term_id = $request->term_id;
                $enrolment->career_id = $request->career_id;
                $enrolment->dni = $request->dni;
                $enrolment->state = "pending"; // Matrícula. Pending/validated
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
    public function update(Request $request, Enrolment $enrolment)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                $enrolment->user_id = $request->user_id;
                $enrolment->term_id = $request->term_id;
                $enrolment->career_id = $request->career_id;
                $enrolment->dni = $request->dni;
                $enrolment->state = $request->state; // pending or validated
                $enrolment->touch();
                
                $status = $enrolment->save();
                if ($status){
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
