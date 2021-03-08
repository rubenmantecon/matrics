<?php
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/terms', function() {
        return view('terms');
    });   
   
