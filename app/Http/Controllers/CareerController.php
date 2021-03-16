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
                        $data = Career::select("*")->where("term_id", $term_id)->where("active", 1)->get();
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
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                $career = new Career;
                $career->code = $request->code;
                $career->term_id = $request->term_id;
                $career->name = $request->name;
                $career->description = $request->desc;
                $career->hours = $request->hours;
                $career->start = $request->start;
                $career->end = $request->end;

                $status = $career->save();
                if ($status) {
                    $data = ["status" => "Cicle creart correctament."];
                    Log::channel('dblogging')->info("Ha creado un Ciclo", ["user_id" => Auth::id(), "career_id" => $career->id]);
                }
            }
        }
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
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                if ($request->type === "softDelete") {
                    $career->active = 0;
                } else {
                    $career->code = $request->code;
                    $career->name = $request->name;
                    $career->description = $request->desc;
                    $career->hours = $request->hours;
                    $career->start = $request->start;
                    $career->end = $request->end;
                }
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
