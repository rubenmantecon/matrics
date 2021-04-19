<?php

namespace App\Http\Controllers;

use DB;

use App\Models\Req_enrol;
use App\Models\Upload;
use App\Models\Enrolment;
use App\Models\Term;
use App\Models\User;
use App\Models\Career;
use App\Models\Mp;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                $term_id = $request->header('term_id');
                if (isset($user_id) && $user_id != "empty" && isset($term_id) && $term_id != "empty") {
                    if ($user_id == "new") {
                        $terms = Term::all();
                        $careers = Career::all();
                        $data = ["terms" => $terms, "careers" => $careers];
                    } else {
                        $user = User::where("id", $user_id)->get()[0];
                        $enrolment = Enrolment::where("user_id", $user_id)->where("term_id", $term_id)->get()[0];
                        $career = Career::select("careers.id AS career_id", "careers.term_id", "careers.code AS career_code", "careers.name AS career_name", "terms.name AS term_name", "terms.start", "terms.end")->where("careers.id", $enrolment['career_id'])->join("terms", "careers.term_id", "terms.id")->get()[0];
                        $mps = Mp::where("career_id", $career['career_id'])->get();
                        $files = Req_enrol::select("req_enrols.id AS req_enrol_id", "req_enrols.enrolment_id", "req_enrols.req_id", "req_enrols.state", "requirements.profile_id", "requirements.name AS req_name", "profile_reqs.name AS profile_name", "uploads.id AS upload_id")->join('requirements', 'req_enrols.req_id', '=', 'requirements.id')->join('profile_reqs', 'requirements.profile_id', '=', 'profile_reqs.id')->join('uploads', 'req_enrols.id', '=', 'uploads.req_enrol_id')->where("enrolment_id", $enrolment['id'])->get();
                        $data = ["user" => $user, "career" => $career, "mps" => $mps, "enrolment" => $enrolment, "files" => $files];
                    }
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
        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname1 = $request->lastname1;
        $user->lastname2 = $request->lastname2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = "alumne";
        $user->password = Hash::make("ieti" . date("Y"));
        $user->token = hash("sha256", $request->email);
        $user->save();

        $enrolment = new Enrolment;
        $enrolment->user_id = $user->id;
        $enrolment->term_id = $request->term;
        $enrolment->career_id = $request->career;
        $enrolment->dni = $request->dni;
        $enrolment->state = "unregistered"; // Matrícula. Pending/validated
        $status = $enrolment->save();
        if ($status) {
            $data = ["status" => "Nova matricula creada correctament."];
            Log::channel('dblogging')->info("Ha creado una nueva matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
        }
        $status = $enrolment->save();
        if ($status) {
            $data = ["status" => "Nova matricula creada correctament."];
            Log::channel('dblogging')->info("Ha creado una nueva matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
        }
        return redirect("/admin/dashboard/students");
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
        $user = User::where('id', $request->user_id)->first();

        // Update enrolment
        $enrolment->user_id = $request->user_id;
        $enrolment->term_id = $request->term_id;
        $enrolment->dni = $request->dni;
        // $enrolment->state = $request->state; // pending or validated
        $enrolment->state = "unregistered"; // pending or validated
        $enrolment->touch();
        $status1 = $enrolment->update();

        // Update user
        $user->id = $request->user_id;
        $user->firstname = $request->firstname;
        $user->lastname1 = $request->lastname1;
        $user->lastname2 = $request->lastname2;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->touch();
        $status2 = $user->update();

        if ($status1 && $status2) {
            $data = ["status" => "Matricula actualitzada correctament."];
            Log::channel('dblogging')->info("Ha actualizado una matricula", ["user_id" => Auth::id(), "enrolment_id" => $enrolment->id]);
        } else {
            $data = ["status" => "Error en actualitzar enrolment."];
        }
        return redirect("/admin/dashboard/students");
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
