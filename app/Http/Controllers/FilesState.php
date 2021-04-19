<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesState extends Controller
{
    //
    public function __invoke() {
    	$actual=Auth::user()->id ;
    	$dni= DB::select('SELECT rq.state FROM req_enrol rq, requirements rs, enrolments e WHERE e.user_id = ? and profile_id = 1 and e.id = rq.enrolment_id and rs.req_id = rq.id', [$actual]);
    	$data = array();
    	array_push($data, $dni) ;
    	$sanitaria= DB::select('SELECT rq.state FROM req_enrol, requirements rs, enrolments e WHERE e.user_id = ? and profile_id = 2 and e.id = rq.enrolment_id and rs.req_id = rq.id', [$actual]);
    	$title= DB::select('SELECT rq.state FROM req_enrol, requirements rs, enrolments e WHERE e.user_id = ? and profile_id = 3 and e.id = rq.enrolment_id and rs.req_id = rq.id', [$actual]);   
    	return response()->json($data);
    }
}
