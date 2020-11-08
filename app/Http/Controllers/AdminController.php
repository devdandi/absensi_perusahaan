<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class AdminController extends Controller
{
    protected $user; 

    public function __contruct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin.index',['user' => Auth::user()]);
    }
}
