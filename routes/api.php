<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Term;
use App\Models\Career;
use App\Models\Mp;
use App\Models\Uf;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Duplicate a specific Term with every career, MP and UF associated.
Route::post('/duplicate/{id}', function(Request $request) {
    $data = ['status' => 'Unauthorized, error 503'];
    $token = $request->header('token');
    if ($token) {
        $user = User::select("token")->where('token', $token)->get()[0];
        if ($user['token']) {
            $term = Term::find($request->route('id'));
            $newTerm = $term->replicate();
            $newTerm->save();
            foreach (Career::where('term_id', $term->id)->cursor() as $career) {
                $newCareer = $career->replicate()->fill(['term_id' => $newTerm->id]);
                $newCareer->save();
                foreach (Mp::where('career_id', $career->id)->cursor() as $mp){
                    $newMp = $mp->replicate()->fill(['career_id' => $newCareer->id]);
                    $newMp->save();
                    foreach (Uf::where('mp_id', $mp->id)->cursor() as $uf) {
                        $newUf = $uf->replicate()->fill(['mp_id' => $newMp->id]);
                        $newUf->save();
                    }
                }
            }
            $data = ['status' => 'done'];
        }
    }
    return response()->json($data);
});
