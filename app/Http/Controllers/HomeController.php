<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use App\Absent;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\RedirectResponse;


class HomeController extends Controller
{
    protected $config;
    protected $absent;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Configuration $config, Absent $absent)
    {
        $this->absent = $absent;
        $this->config = $config;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $absen;
        foreach($this->absent->where('id_user', Auth::id())->whereDate('created_at','=', Carbon::today()->toDateString())->where('status','IN')->get() as $a)
        {
            $absen = $a;
        }
        return view('home',['config' => $this->config->getCOnfig(),'absen' => $absen]);
    }
    public function in()
    {
        $check = $this->absent->where('id_user', Auth::id())->whereDate('created_at','=', Carbon::today()->toDateString())->where('status','IN')->count();
        if($check > 0)
        {
            return redirect()->back()->with(['error' => 'Kamu telah absen hari ini !']);
        }else{
            $this->absent->in();
        }
    }
    public function out()
    {

    }
}
