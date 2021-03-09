<?php
    use App\Models\Term;
    
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/terms', function() {
        return view('terms');
    });
    
    Route::get('/dashboard/logs', function() {
        return view('logs');
    });   
   
    Route::get('/dashboard/terms/delete/{term_id}', function ($term_id) {
        $term = Term::select("*")->where('id', $term_id)->get()[0];
        return view('deleteTerm', ["term" => $term]);
    });