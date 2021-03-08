<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::select("token")->where('token', $request->header('token'))->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];
        if ($user['token'])
            $data = Term::select("*")->where("active", 1)->get();
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
        $token = $request->header('token');
        $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];

        if ($user['token']) {
            $term = new Term;
            $term->name = $request->name;
            $term->description = $request->desc;
            $term->start = $request->start;
            $term->end = $request->end;
            $term->active = 1; // NO HARDCODEAR
            $term->created_at = $request->created;
            $term->updated_at = $request->updated;

            $status = $term->save();
            if ($status)
                $data = ["status" => "Nou curs creat correctament."];
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
    public function update(Request $request, Term $term)
    {
        $token = $request->header('token');
        $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];

        if ($user['token']) {
            $term->name = $request->name;
            $term->description = $request->desc;
            $term->start = $request->start;
            $term->end = $request->end;
            $term->updated_at = $request->updated;

            $status = $term->save();
            if ($status)
                $data = ["status" => "Curs actualitzat correctament."];
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
