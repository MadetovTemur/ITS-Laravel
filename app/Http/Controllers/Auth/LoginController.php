<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Forms\LoginUserForm;

class LoginController extends Controller
{
    //

    public function index() 
    {
        return view("auth.login", ['form'=> LoginUserForm::class ]);
    }

    public function authenticate(LoginRequest $request) 
    {

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        // Auth::guard('web')->user() Hash::info($admin['password']), 
        // $teacher = Auth::guard('teacher')->attempt($credentials, $request->boolean('remember'));
        
        if (Auth::guard('admin')->attempt($credentials)) {

            $request->session()->regenerate();
            return redirect(route('admin.dashboard'));
        } elseif(Auth::guard('teacher')->attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect(route('teacher.dashboard'));
        }
        //  elseif(Auth::guard('student')->attempt($credentials)) {    
        //     $request->session()->regenerate();
        //     return redirect()->intended('dashboard');
        // }

        return back()->withErrors([
            'username' => 'Username yoki Password hatto !!',
        ])->onlyInput('username');
    }


    public function distroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();  
        return redirect('/');
    }
}
