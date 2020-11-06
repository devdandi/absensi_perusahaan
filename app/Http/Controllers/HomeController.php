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
        date_default_timezone_set('Asia/Jakarta');
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
        return view('home',['config' => $this->config->getCOnfig()]);
    }
    public function in()
    {
        $check = $this->absent->where('id_user', Auth::id())->whereDate('created_at','=', Carbon::today()->toDateString())->where('status','IN')->count();
        if($check > 0)
        {
            return redirect()->back()->with(['error' => 'Kamu telah absen hari ini !']);
        }else{
            // $this->absent->in();
            $date = explode(" ", now());
            
            $pecah_date_now = explode(":", $date[1]);

            $date_config = explode(" ", $this->config->find(1)->jam_masuk);

            $pecah_config_date = explode(":", $date_config[0]);

            if($pecah_date_now[0] > $pecah_config_date[0])
            {
                $this->absent->in(FALSE);
                return redirect()->back()->with(['error' => 'Kamu datang terlambat !']);
            }else if($pecah_date_now[0] > $pecah_config_date[0] AND $pecah_date_now[1] > $pecah_config_date[1])
            {
                $this->absent->in(FALSE);
                return redirect()->back()->with(['error' => 'Kamu datang terlambat beberapa menit!']);
            }else if($pecah_date_now[0] < $pecah_config_date[0])
            {
                $this->absent->in(TRUE);
                return redirect()->back()->with(['success' => 'Kamu datang tepat waktu !']);
            }else if($pecah_date_now[0] == $pecah_config_date[0] AND $pecah_date_now[1] <= $pecah_config_date[1])
            {
                $this->absent->in(TRUE);
                return redirect()->back()->with(['success' => 'Kamu datang tepat waktu !']);
            }
        }
    }
    public function out()
    {
        $check = $this->absent->where('id_user', Auth::id())->whereDate('created_at','=', Carbon::today()->toDateString())->where('status','OUT')->count();
        if($check > 0)
        {
            return redirect()->back()->with(['error' => 'Kamu telah absen pulang hari ini !']);
        }else{
            // $this->absent->in();
            $date = explode(" ", now());
            
            $pecah_date_now = explode(":", $date[1]);

            $date_config = explode(" ", $this->config->find(1)->jam_keluar);

            $pecah_config_date = explode(":", $date_config[0]);

            if($pecah_date_now[0] < $pecah_config_date[0])
            {
                $this->absent->out(FALSE);
                return redirect()->back()->with(['error' => 'Kamu pulang terlalu cepat !']);
            }else if($pecah_date_now[0] > $pecah_config_date[0] AND $pecah_date_now[1] > $pecah_config_date[1])
            {
                $this->absent->out(FALSE);
                return redirect()->back()->with(['error' => 'Kamu pulang lebih cepat beberapa menit!']);
            }else if($pecah_date_now[0] < $pecah_config_date[0])
            {
                $this->absent->out(TRUE);
                return redirect()->back()->with(['success' => 'Kamu pulang tepat waktu !']);
            }else if($pecah_date_now[0] == $pecah_config_date[0] AND $pecah_date_now[1] >= $pecah_config_date[1])
            {
                $this->absent->in(TRUE);
                return redirect()->back()->with(['success' => 'Kamu pulang tepat waktu !']);
            }
        }
    }
}
