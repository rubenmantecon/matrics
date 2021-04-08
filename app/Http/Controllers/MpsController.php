<?php

namespace App\Http\Controllers;

use App\Models\Mp;
use App\Models\User;
use App\Models\Career;


use Illuminate\Http\Request;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mp  $mp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mp $mp)
    {
        //
    }
}
