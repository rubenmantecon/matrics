<?php


use App\Models\Term;
use App\Models\Career;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsGenerator;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsManager;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/dashboard/terms', function () {
    return view('terms');
});

Route::get('/dashboard/careers', function (Request $request) {
    if (!isset($request->term)) {
        return redirect('/admin/dashboard/terms');
    }
    $result = Term::select("name")->where('id', $request->term)->get()[0];
    if ($result) {
        return view('careers', ['term' => $result["name"]]);
    } else {
        return redirect('/admin/dashboard/terms');
    }
});

Route::get('/dashboard/careers/import', function () {
    return view('pages.careers.import');
});

Route::get('/dashboard/careers/delete/{career_id}', function ($career_id) {
    $career = Career::select("*")->where('id', $career_id)->get();
    if (sizeof($career) > 0) {
        return view('pages.careers.delete', ["career" => $career[0]]);
    } else {
        return redirect("/admin/dashboard/terms");
    }
});

Route::get('/dashboard/logs', function () {
    return view('logs');
});

Route::get('/dashboard/terms/delete/{term_id}', function ($term_id) {
    $term = Term::select("*")->where('id', $term_id)->get();
    if (sizeof($term) > 0) {
        return view('deleteTerm', ["term" => $term[0]]);
    } else {
        return redirect("/admin/dashboard/terms");
    }
});

Route::get('/dashboard/students', function () {
    return view('students.index');
});


/*
    * You may use either the Breadcrumbs facade or the $breadcrumbs variable in this file,
    * both of which reference the `BreadcrumbsManager` service
    */

/** @var $breadcrumbs BreadcrumbsManager */

// Dashboard
Breadcrumbs::for('dashboard', static function ($trail) {
    $trail->push('Panell de control', route('dashboard'));
});

// Dashboard > Students
Breadcrumbs::for('students', static function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Alumnes', '/admin/dashboard/students');
});

// Dashboard > Terms
Breadcrumbs::for('terms', static function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Cursos', '/admin/dashboard/terms');
});

// Dashboard > Terms > Delete[Term]
Breadcrumbs::for('term_delete', function ($trail, $term) {
    $trail->parent('terms');
    $trail->push($term->name, '/dashboard/terms/delete/{term_id}');
});

// Dashboard > Terms > [Term]
Breadcrumbs::for('term', function ($trail, $term) {
    $trail->parent('terms');
    $trail->push($term, '/admin/dashboard/careers?term={term_id}');
});

// Dashboard > Careers > Import
Breadcrumbs::for('career_import', function ($trail) {
    $trail->parent('terms');
    $trail->push("Cicles", '/admin/dashboard/careers/import?term={term_id}');
});

// Dashboard > Careers > Delete[Term]
Breadcrumbs::for('career_delete', function ($trail, $career) {
    $trail->parent('terms');
    $trail->push($career->name, '/dashboard/careers/delete/{career_id}');
});
