<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function validateLogin(Request $request){
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
            ]);

            $user = User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if($request) {
            Auth::login($user);
            return back()->with('status', 'Login Sucessful');
        }

        return back()->with('status', 'User does not exist');
            
    }
}
