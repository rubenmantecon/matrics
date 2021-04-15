<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use Auth;
use App\Models\User;

class SocialController extends Controller
{

public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    try {
            $SocialUser = Socialite::driver('google')->user();
            $user = User::where('email', $SocialUser->email)->first();
            if($user){
                Auth::login($user);
                return redirect('/dashboard');
            }else{
                return redirect('/');
            }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
   }
}