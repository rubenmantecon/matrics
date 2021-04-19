<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesState extends Controller
{
    //
    public function __invoke() {

    $user= Auth::user();
	$req_enrols=$user->enrolments().first->req_enrols()
	return render("semafor",["req_enrols"=>$req_enrols]);
}
}