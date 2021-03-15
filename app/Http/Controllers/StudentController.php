<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Career;
use App\Models\Enrolment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                $data = User::select("id", "firstname", "lastname1", "lastname2", "email")->where("role", "alumne")->paginate(20)->onEachSide(2);
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
		    		
		    		$array = array_slice($array, 0, -1);
		    		
		    		$q = 0;
		    		$status_controller = ["okey" => 0, "failed" => 0];
		    		
		    		$interesting_index = ["firstname" => null, "lastname1" => null, "lastname2" => null, "email" => null];
		    		
		    		foreach($array as $element){
		    			if($q == 0){
		    				// search for certain column names
		    				$interesting_index["firstname"] = array_search("Nom", $element);
		    				$interesting_index["lastname1"] = array_search("Primer cognom", $element);
		    				$interesting_index["lastname2"] = array_search("Segon cognom", $element);
		    				$interesting_index["email"] = array_search("Correu electrònic", $element);
		    				$interesting_index["career_id"] = array_search("Codi ensenyament P1
", $element);
		    			}
		    			else{
		    				// validate, if someone is not valid add to $status_controller["failed"] and skip it
		    				if(empty($element[$interesting_index["firstname"]])){
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				if(empty($element[$interesting_index["lastname1"]])){
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				if(empty($element[$interesting_index["lastname2"]])){
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				if(empty($element[$interesting_index["email"]])){
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				if(empty($element[$interesting_index["career_id"]])){
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				
		    				// lets check if the career exists
		    				$response = Career::select("code", "term_id")->where('code', $element[$interesting_index["career_id"]])->orderBy("term_id", "desc")->get();
		    				
		    				if(sizeof($response) == 0){
								// We don't have that actual career, just skip it for now
		    					$status_controller["failed"]++;
		    					continue;
		    				}
		    				
		    				// Insert user in the db
							$user = new User;
							$user->name = strtolower(str_replace(" ", "", substr($element[$interesting_index["firstname"]], 0, 1) . $element[$interesting_index["firstname"]] . $element[$interesting_index["lastname2"]]));
							$user->firstname = $element[$interesting_index["firstname"]];
							$user->lastname1 = $element[$interesting_index["lastname1"]];
							$user->lastname2 = $element[$interesting_index["lastname2"]];
							$user->email = $element[$interesting_index["email"]];
							/* TODO Mejorar contraseña default a DNI */
							$user->password = Hash::make("ieti" . date("Y"));
							/* Para salir del paso */
							$user->token = hash("sha256", $element[$interesting_index["email"]]);
							
							$user->created_at = $request->created;
							$user->updated_at = $request->updated;

							$status = $user->save();
							if ($status){
								$enrollment = new Enrolment;
								$enrollment->user_id = $user->id;
								$enrollment->term_id = $response["term_id"];
								$enrollment->career_id = $response["code"];
								$enrollment->dni = $element[$interesting_index["dni"]];
								$enrollment->state = "unregistered";
								$enrollment->created_at = $request->created;
								$enrollment->updated_at = $request->updated;
								
								$enrollment->save();
								
								$status_controller["okey"]++;

							}
							else{
								$status_controller["failed"]++;
							}

		    			}
		    			$q++;
		    			
		    		}
		    		
		    		if($status_controller["okey"] + $status_controller["failed"] > 0){
		    			if($status_controller["okey"] > 0){
							if($status_controller["failed"] > 0){
								$data = ["status" => "warning", "text" => "Importació d'usuaris completada correctament.<br>{$status_controller["okey"]} afegits<br>{$status_controller["failed"]} no s'han afegit."];
							}
							else{
								$data = ["status" => "success", "text" => "Importació d'usuaris completada correctament.<br>{$status_controller["okey"]} afegits."];
							}		    			
		    			}
		    			else{
		    				$data = ["status" => "error", "text" => "Importació d'usuaris fallida.<br>{$status_controller["failed"]} no s'han afegit."];
		    			}

		    			
		    		}
		    		else{
		    			$data = ["status" => "error", "text" => "Importació d'usuaris fallida, no s'han trobat alumnes al CSV."];
		    		}
		    		
		    		
								//Log::channel('dblogging')->info("Ha importado alumnos (", ["user_id" => Auth::id(), "term_id" => $term->id]);
		    		
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
