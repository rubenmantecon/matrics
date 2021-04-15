<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
/*
Artisan::command('user:createadmin', function () {
    $name = $this->ask('Name?');
    $email = $this->ask('Email?');
    $pwd = $this->secret('Password?');
    $firstname = $this->ask('Firstname?');
    $lastname1 = $this->ask('Surname?');
    $lastname2 = $this->ask('Lastname?');
  	$token = hash("sha256" , $email);

    User::query()
        ->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pwd),
            'firstname' => $firstname,
            'lastname1' => $lastname1,
            'lastname2' => $lastname2,
            'role' => "admin",
            'token' => $token,
            
        ]);

    $this->info('Account created for '.$name);
});*/