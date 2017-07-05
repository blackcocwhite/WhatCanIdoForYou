<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class EmailController extends Controller
{
    public function verify($token)
    {
        $user = User::where("confirmation_token",$token)->first();

        if(count($user) < 1){
            return redirect('/');
        }

        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $user->save();

        Auth::login($user);

        return redirect('/home');
    }
}
