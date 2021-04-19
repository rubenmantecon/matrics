<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Enrolment;
use App\Models\Log;
use Carbon\Carbon;
use App\Http\Controllers\TermController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Enrolment_ufController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\UploadController;
use App\Models\Enrolment_uf;
use App\Http\Controllers\MpsController;
use App\Http\Controllers\Profile_reqController;
use App\Http\Controllers\RequirementController;
use App\Models\Profile_req;
use App\Http\Controllers\RegisterAdminController;
use App\Models\Career;
use App\Models\Mp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $year = Carbon::now()->year;
    $nextYear = $year + 1;
    return view('pages.landing', ["year" => "$year/$nextYear"]);
});

Route::get('/sample', function () {
    return view('pages.sample');
});

Route::get('/dashboard/profile', function () {
    $user_id = auth::id();
    $enrollments = Enrolment::where('user_id', $user_id)->get();
    return view('pages.profile', ['enrollments' => $enrollments]);
});
Route::get('/dashboard', function () {
    $user_id = auth::id();
    if(count(Enrolment::where('user_id', $user_id)->where('state', 'unregistered')->get()) > 0){
    	if(count(Enrolment::where('user_id', $user_id)->get()) > count(Enrolment::where('user_id', $user_id)->where('state', 'unregistered')->get()) ){
    		// Alumno que tiene que hacer la matricula, pero ya tiene una antigua (Antiguo alumno).
    		return redirect('/dashboard/requirements');
    	}
    	else{
    		// Alumno que tiene que hacer la matricula, (Alumno nuevo)
    		return redirect('/dashboard/requirements');
    	}
    }
    else{
    	// Alumno que ya ha hecho la matricula (actual).
    	return view('pages.dashboard');
    }

})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/requirements', function () {
    $profile_req = Profile_req::all();
    return view('pages.requirements', ['profile_req' => $profile_req]);
});

Route::post('/dashboard/enrolments', function (Request $request) {
	$user_id = auth::id();

	/*
		Podemos enviarlos a la siguiente pagina
		o
		Podemos almacenarlos en la db (por si el usuario se queda a medias)
	*/
	$career = Enrolment::join("careers", "enrolments.career_id", "=", "careers.id")->where("enrolments.user_id", $user_id)->where("enrolments.state", "unregistered")->orderBy("enrolments.id", "DESC")->first(['careers.code', 'careers.name', 'careers.id', 'enrolments.birth_date']);

    $rights = '{"age": "'.Carbon::parse($career['birth_date'])->age.'","image": "'.$request->pr_image.'", "excursions": "'.$request->pr_excursions.'", "extracurricular": "'.$request->pr_extracurricular.'"}';

    $mps = Mp::where('career_id', $career["id"])->get(); //Mp::careers();

    return view('pages.studentsEnrolments', ['career' => $career, 'mps' => $mps, 'rights' => $rights]);
});

Route::get('/dashboard/documents', function () {
    return view('pages.documents');
});

Route::get('/dashboard/documents', function () {
    return view('pages.documents');
});


Route::resource('api/terms', TermController::class);
Route::resource('api/careers', CareerController::class);
Route::resource('api/logs', LogController::class);
Route::resource('api/students', StudentController::class);
Route::resource('api/import', ImportController::class);
Route::resource('api/ufs', UfController::class);
Route::resource('api/enrolments', EnrolmentController::class);
Route::resource('api/enrolment_ufs', Enrolment_ufController::class);
Route::resource('api/mps', MpsController::class);
Route::resource('api/profile_reqs', Profile_reqController::class);
Route::resource('api/requirements', RequirementController::class);
Route::resource('api/createAdmin', RegisterAdminController::class);
Route::resource('api/documents',  UploadController::class);

require __DIR__ . '/auth.php';

Route::name('admin') /*admin/dashboard*/
    ->prefix('admin')
    ->middleware(['auth', 'can:accessAdmin'])
    ->group(function () {
        require __DIR__ . '/admin.php';
    });

Route::get('auth/redirect', 'App\Http\Controllers\SocialController@redirect');
Route::get('auth/callback', 'App\Http\Controllers\SocialController@callback');

/*BREADCRUMB*/

// Dashboard
Breadcrumbs::for('home', static function ($trail) {
    $trail->push('Inici', route('dashboard'));
});

// Dashboard > Profile
Breadcrumbs::for('profile', static function ($trail) {
    $trail->parent('home');
    $trail->push('Dades personals', '/dashboard/profile');
});

// Dashboard > Documents
Breadcrumbs::for('documents', static function ($trail) {
    $trail->parent('home');
    $trail->push('Documents', '/dashboard/documents');
});

// Dashboard > Enrolments
Breadcrumbs::for('enrolments', static function ($trail) {
    $trail->parent('home');
    $trail->push('Preu', '/dashboard/enrolments');
});
