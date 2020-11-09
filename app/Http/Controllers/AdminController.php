<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Absent;
use DB;

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
        return view('admin.index',['user' => Auth::user(),'karyawan' => User::getEmployeeNotAbsent()]);
    }
}
