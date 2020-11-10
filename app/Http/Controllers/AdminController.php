<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Absent;

class AdminController extends Controller
{
    protected $user; 
    protected $absen;

    public function __contruct(User $user, Absent $absen)
    {
        $this->absen = $absen;
        $this->user = $user;
        $this->middleware('auth:admin');
    }
    public function index()
    {
        // dd($this->getCountEmployee());
        
        return view('admin.index',['user' => Auth::user(),'karyawan' => User::getEmployeeNotAbsent()]);
        
    }
}
