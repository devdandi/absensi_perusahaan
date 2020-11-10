<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getCountEmployee()
    {
        return User::getCountEmployee();
    }
    public function checknik($nik)
    {
        if(User::where('nik', $nik)->count() > 0)
        {
            return true;
        }
        return false;
    }
}
