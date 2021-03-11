<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ['status' => 'Unauthorized, error 503'];
        $token = $request->header('token');
        if ($token) {
            $user = User::select("token")->where('token', $token)->get()[0];
            if ($user['token'])
                $data = User::select("id", "name", "email", "created_at", "updated_at")->where("role", "alumne")->get();
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
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $user)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, User $user)
    // {
    //     $data = ['status' => 'Unauthorized, error 503'];
    //     $token = $request->header('token');
    //     if ($token) {
    //         $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
    //         if ($user['token']) {
    //             $user->name = $request->name;
    //             $user->email = $request->email;
    //             $user->updated_at = $request->updated;

    //             $status = $user->save();
    //             if ($status) {
    //                 $data = ["status" => "Alumne actualitzat correctament."];
    //                 Log::channel('dblogging')->info("Ha actualizado un Alumno", ["user_id" => Auth::id(), "student_id" => $user->id]);
    //             } else {
    //                 $data = ["status" => "No s'ha pogut actualizar correctament l'alumne."];
    //                 Log::channel('dblogging')->info("Error al actualizar un Alumno", ["user_id" => Auth::id(), "student_id" => $user->id]);
    //             }
    //         }
    //     }
    //     return response()->json($data);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    // public function destroy(User $user)
    // {
    //     //
    // }
}
