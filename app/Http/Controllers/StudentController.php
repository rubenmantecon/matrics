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
			$user = User::select("token", "id")->where('token', $token)->get()[0];
			if ($user['token']){
				if($request->filter){
					// There is some filter present!
					$filters = json_decode($request->filter, true);				
					$filters = is_array($filters) ? $filters : array($filters);
					
					$allowed_filters = ["firstname", "lastname1", "lastname2", "order_firstname", "order_firstname", "order_lastname1", "order_lastname2"];
					
					if(sizeof(array_diff(array_keys($filters), $allowed_filters)) == 0){
						$students = User::select("users.id", "users.firstname", "users.lastname1", "users.lastname2", "users.email", "careers.name", "enrolments.term_id", "enrolments.state")->join('enrolments', 'users.id', '=', 'enrolments.user_id')->join('careers', 'enrolments.career_id', '=', 'careers.id')->where("role", "alumne");
						foreach($filters as $filter => $value){
							if($filter == "firstname"){
								$students->where("users.firstname", $value);
							}
							elseif($filter == "lastname1"){
								$students->where("users.lastname1", $value);
							}
							elseif($filter == "lastname2"){
								$students->where("users.lastname2", $value);
							}
							elseif($filter == "order_firstname"){
								if($value == "DESC"){
									$students->orderBy('users.firstname', 'DESC');
								}
								else{
									$students->orderBy('users.firstname', 'ASC');
								}
							}
							elseif($filter == "order_lastname1"){
								if($value == "DESC"){
									$students->orderBy('users.lastname1', 'DESC');
								}
								else{
									$students->orderBy('users.lastname1', 'ASC');
								}
							}
							elseif($filter == "order_lastname2"){
								if($value == "DESC"){
									$students->orderBy('users.lastname2', 'DESC');
								}
								else{
									$students->orderBy('users.lastname2', 'ASC');
								}
							}						}
						$data = $students->paginate(20)->onEachSide(2);
					}
				}
				else{
					$data = User::select("users.id", "users.firstname", "users.lastname1", "users.lastname2", "users.email", "careers.name", "enrolments.term_id", "enrolments.state")->join('enrolments', 'users.id', '=', 'enrolments.user_id')->join('careers', 'enrolments.career_id', '=', 'careers.id')->where("role", "alumne")->paginate(20)->onEachSide(2);
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

		// Check if the file contains csv extensión.
		if (!str_contains($request->file, 'data:text/csv;')) {
			$res = ["status" => "error", "text" => "El archiu no te una extensió correcte. Archius admesos: .csv"];
			return response()->json($res);
		}

		if ($token) {
			$user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
			if ($user['token']) {
				if (isset($request->import_file)) {
					$tmp = base64_decode(explode(",", $request->file)[1]);
					$array = array_map("str_getcsv", explode("\n", $tmp));
					$array = array_slice($array, 0, -1);
					$q = 0;
					$status_controller = ["okey" => 0, "failed" => 0];
					$interesting_index = ["firstname" => null, "lastname1" => null, "lastname2" => null, "email" => null];

					foreach ($array as $element) {
						if ($q == 0) {
							// search for certain column names
							$interesting_index["firstname"] = array_search("Nom", $element);
							$interesting_index["lastname1"] = array_search("Primer cognom", $element);
							$interesting_index["lastname2"] = array_search("Segon cognom", $element);
							$interesting_index["email"] = array_search("Correu electrònic", $element);
							$interesting_index["career_id"] = array_search("Codi ensenyament P1", $element);
							$interesting_index["identificacion"]["dni"] = array_search("DNI", $element);
							$interesting_index["identificacion"]["nie"] = array_search("NIE", $element);
							$interesting_index["identificacion"]["pass"] = array_search("PASS", $element);
						} else {
							// validate, if someone is not valid add to $status_controller["failed"] and skip it
							if (empty($element[$interesting_index["firstname"]])) {
								$status_controller["failed"]++;
								//continue;
							}
							if (empty($element[$interesting_index["lastname1"]])) {
								$status_controller["failed"]++;
								//continue;
							}
							if (empty($element[$interesting_index["lastname2"]])) {
								$status_controller["failed"]++;
								//continue;
							}
							if (empty($element[$interesting_index["email"]])) {
								$status_controller["failed"]++;
								// continue;
							}
							if (empty($element[$interesting_index["career_id"]])) {
								$status_controller["failed"]++;
								// continue;
							}

							// Check what type of identification is the user using.
							if (!empty($interesting_index["identificacion"]["dni"])) {
								$interesting_index["identificacion"]["actual"] =  $interesting_index["identificacion"]["dni"];
							} else if (!empty($interesting_index["identificacion"]["nie"])) {
								$interesting_index["identificacion"]["actual"] =  $interesting_index["identificacion"]["nie"];
							} else if (!empty($interesting_index["identificacion"]["pass"])) {
								$interesting_index["identificacion"]["actual"] =  $interesting_index["identificacion"]["pass"];
							} else {
								$status_controller["failed"]++;
								// continue;
							}

							// lets check if the career exists
							$response = Career::select("id", "term_id")->where('code', $element[$interesting_index["career_id"]])->orderBy("term_id", "desc")->get();
							if (sizeof($response) == 0) {
								// We don't have that actual career, just skip it for now
								$status_controller["failed"]++;
								// continue;
							}

							// Search user by mail or create it.
							$user = User::firstOrCreate(
								['email' => $element[$interesting_index["email"]]],
								[
									'name' => utf8_encode(strtolower(str_replace(" ", "", substr($element[$interesting_index["firstname"]], 0, 1) . $element[$interesting_index["lastname1"]]))),
									'firstname' => $element[$interesting_index["firstname"]],
									'lastname1' => $element[$interesting_index["lastname1"]],
									'lastname2' => $element[$interesting_index["lastname2"]],
									'password' => Hash::make("ieti" . date("Y")),
									'token' => hash("sha256", $element[$interesting_index["email"]])
								]
							);

							if ($user) {
								$response = $response[0];
								// Create Enrolment or update it if exists.
								$enrollment = Enrolment::updateOrCreate(
									[
										'dni' => $element[$interesting_index['identificacion']['actual']],
										'term_id' => $response->term_id,
										'career_id' => $response->id
									],
									[
										'user_id' => $user->id,
										'state' => 'unregistered',
										'created_at' => $request->created,
										'updated_at' => $request->updated
									]
								);
								$status_controller["okey"]++;
							} else {
								$status_controller["failed"]++;
							}
						}
						$q++;
					}

					if ($status_controller["okey"] + $status_controller["failed"] > 0) {
						if ($status_controller["okey"] > 0) {
							if ($status_controller["failed"] > 0) {
								$data = ["status" => "warning", "text" => "Importació d'usuaris completada correctament.<br>{$status_controller["okey"]} afegits<br>{$status_controller["failed"]} no s'han afegit."];
							} else {
								$data = ["status" => "success", "text" => "Importació d'usuaris completada correctament.<br>{$status_controller["okey"]} afegits."];
							}
						} else {
							$data = ["status" => "error", "text" => "Importació d'usuaris fallida.<br>{$status_controller["failed"]} no s'han afegit."];
						}
					} else {
						$data = ["status" => "error", "text" => "Importació d'usuaris fallida, no s'han trobat alumnes al CSV."];
					}


					//Log::channel('dblogging')->info("Ha importado alumnos (", ["user_id" => Auth::id(), "term_id" => $term->id]);

				} else {
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
