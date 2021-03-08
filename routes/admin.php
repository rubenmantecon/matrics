<?php
    Route::get('/dashboard', function() {
        return view('dashboard');
    });

    Route::get('/dashboard/terms', function() {
        return view('terms');
    });
    
    Route::get('/dashboard/logs', function() {
        return view('logs');
    });   
   
