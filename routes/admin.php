<?php
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/courses', function() {
        return view('terms');
    });   
   
