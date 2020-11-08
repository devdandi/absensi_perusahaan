<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    public function index()
    {
        return view('auth.loginadmin');
    }
    public function login(Request $req)
    {
        if(auth()->guard('admin')->attempt($req->only('email','password')))
        {
            return redirect()->intended(route('admin.home'));
        }else{
            $this->incrementLoginAttempts($req);
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(["Incorrect user login details!"]);
        }
    }
}
