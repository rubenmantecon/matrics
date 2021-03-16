<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
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
            if ($user['token'])
                $data = Term::select("*")->where("active", 1)->get();
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

                $term = new Term;
                $term->name = $request->name;
                $term->description = $request->desc;
                $term->start = $request->start;
                $term->end = $request->end;
                $term->active = 1;

                $status = $term->save();
                if ($status) {
                    $data = ["status" => "Nou curs creat correctament."];
                    Log::channel('dblogging')->info("Ha creado un nuevo Curso", ["user_id" => Auth::id(), "term_id" => $term->id]);
                }
            }
            return response()->json($data);
        }
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
    public function update(Request $request, Term $term)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
            if ($user['token']) {
                if ($request->type === "softDelete") {
                    $term->active = 0;
                } else {
                    $term->name = $request->name;
                    $term->description = $request->desc;
                    $term->start = $request->start;
                    $term->end = $request->end;
                }
                $term->touch();

                $status = $term->save();
                if ($status)
                    $data = ["status" => "Curs actualitzat correctament."];

                if ($request->type === "softDelete") {
                    $data = ["status" => "Curs eliminat correctament."];
                    Log::channel('dblogging')->info("Ha eliminado un Curso", ["user_id" => Auth::id(), "term_id" => $term->id]);
                } else {
                    $data = ["status" => "Curs actualitzat correctament."];
                    Log::channel('dblogging')->info("Ha actualizado un Curso", ["user_id" => Auth::id(), "term_id" => $term->id]);
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
