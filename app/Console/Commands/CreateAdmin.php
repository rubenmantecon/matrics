<?php

namespace App\Console\Commands;

use App\Models\Enrolment;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un usuario administrador basico';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    $name = $this->ask('Name?');
    $email = $this->ask('Email?');
    $pwd = $this-> secret('Password?');
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
            'token' => $token,
            
        ]);

    Enrolment::query()
        ->create([
            'user_id' => 1,
            'career_id' => 1,
            'dni' => "12345678Z",
            'state' => "registered",
            'term_id' => 1,
        ]);    


    $this->info('Account created for '.$name.'and a standard Enrolment');


}
    }

