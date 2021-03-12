<?php


use App\Models\Term;
use App\Models\Career;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsGenerator;
use BabDev\Breadcrumbs\Contracts\BreadcrumbsManager;
    
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/terms', function() {
        return view('terms');
    });
    
    Route::get('/dashboard/terms/delete/{term_id}', function ($term_id) {
        $term = Term::select("*")->where('id', $term_id)->get()[0];
        return view('deleteTerm', ["term" => $term]);
    });

    Route::get('/dashboard/logs', function() {
        return view('logs');
    });   

    Route::get('/dashboard/students', function() {
        return view('students.index');
    });  

    Route::get('/dashboard/students/import', function() {
        return view('students.import');
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

    // Dashboard > Terms
    Breadcrumbs::for('terms', static function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Cursos', '/admin/dashboard/terms');
    });

    Breadcrumbs::for('students', static function ($trail) {
        $trail->parent('dashboard');
        $trail->push('Alumnes', '/admin/dashboard/students');
    });

    // Dashboard > Terms > [Term]
    Breadcrumbs::for('term', function ($trail, $term) {
        $trail->parent('terms');
        $trail->push($term->name, '/dashboard/terms/delete/{term_id}');
    });

    // Dashboard > Terms > [Term] > [Career]
    /* Breadcrumbs::for('career', static function ($trail, Career $career) {
        $trail->parent('term', $career->term_id);
        $trail->push($career->name, route('career', $career->career_id));
    }); */
