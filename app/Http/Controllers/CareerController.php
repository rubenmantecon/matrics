<?php

namespace App\Http\Controllers;

use App\Models\Career;
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
        $user = User::select("token")->where('token', $request->header('token'))->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];
        if ($user['token'])
            $data = Career::select("*")->get();
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
        /*
        $token = $request->header('token');
        $user = User::select("token")->where('token', $token)->where("role", "admin")->get()[0];
        $data = ['status' => 'Unauthorized, error 503'];

        if ($user['token']) {
        */
        
        	//dd($request);
        	
        	if(isset($request->import_file)){
        		$tmp = base64_decode(explode(",", $request->file)[1]);
        		
        		$array = array_map("str_getcsv", explode("\n", $tmp));
        		
        		$last = "";
        		$last_wrap = array();
        		foreach($array as $element){
        			if($last == ""){
        				$last = $element[0];
        			}
        			else{
        				if($last == $element[0]){
        					array_push($last_wrap, $element);
        					
        					
        				}
        				else{
        					// Save last wrap
							
        				}
        				$last = $element[0];
        			}
        		}
        		
				$json = json_encode(array_slice($array, 0, -1));
        		
        		return $json;
        	}
        	else{
        		$career = new Career;
		        $career->code = $request->code;
		        $career->name = $request->name;
		        $career->description = $request->desc;
		        
		        //
		        $career->hours = $request->hours;
		        //
		        
		        $career->start = $request->start;
		        $career->end = $request->end;

		        $status = $career->save();
        	}

            if ($status)
                $data = ["status" => "Nou cicle creat correctament."];
                Log::channel('dblogging')->info("Ha creado un nuevo Ciclo", ["user_id" => Auth::id(), "career_id" => $career->id]);
        /*
        }
        */
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
            if ($request->type === "softDelete")
                $term->active = 0;
            $term->updated_at = $request->updated;

            $status = $term->save();
            if ($status)
                $data = ["status" => "Curs actualitzat correctament."];
               
                if ($request->type === "softDelete"){
                    $data = ["status" => "Curs eliminat correctament."];
                     Log::channel('dblogging')->info("Ha eliminado un Curso", ["user_id" => Auth::id(), "term_id" => $term->id]);
                }
                else{
                    $data = ["status" => "Curs actualitzat correctament."];
                    Log::channel('dblogging')->info("Ha actualizado un Curso", ["user_id" => Auth::id(), "term_id" => $term->id]);
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
