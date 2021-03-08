<?php
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/cursos', function() {
        return view('terms');
    });   
   
