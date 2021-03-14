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
                $data = User::select("id", "name", "email", "created_at", "updated_at")->where("role", "alumne")->paginate(20)->onEachSide(2);
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
		    
		    	if(isset($request->import_file)){
		    		$tmp = base64_decode(explode(",", $request->file)[1]);
		    		
		    		$array = array_map("str_getcsv", explode("\n", $tmp));
		    		
		    		$stash_control = array();
		    		$stash = array();
		    		
		    		$array = array_slice(array_slice($array, 1), 0, -1);
		    		
		    		$q = 0;
		    		$status_controller = ["okey" => 0, "failed" => 0];
		    		
		    		$interesting_index = ["name" => null, "lastname1" => null, "lastname2" => null
		    		
		    		foreach($array as $element){
		    			if($q == 0){
		    				// search for certain column names
		    				$interesting_index["name"] = array_search("Nom", $element);
		    				$interesting_index["lastname1"] = array_search("Primer cognom", $element);
		    				$interesting_index["lastname2"] = array_search("Segon cognom", $element);
		    			}
		    			else{
		    				// validate, if someone is not valid add to $status_controller["failed"] and skip it
		    				
		    				// Insert in the db
		    				
		    			}
		    			$q++;
		    			/*
		    			$user = new User;
						$user->name = $request->name;
						$user->description = $request->desc;
						$user->start = $request->start;
						$user->end = $request->end;
						$user->active = 1; // NO HARDCODEAR
						$user->created_at = $request->created;
						$user->updated_at = $request->updated;

						$status = $user->save();
						if ($status){
						    $data = ["status" => "Importació d'usuaris completada correctament."];
						    Log::channel('dblogging')->info("Ha importado N alumnos", ["user_id" => Auth::id(), "term_id" => $term->id]);
						}
		    			*/
		    		}
		    	}
		    	else{
		    	
		    	}
		    }
        	return response()->json($data);
    	}
    }

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
