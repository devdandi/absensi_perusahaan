<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Absent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nik','jabatan','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function getEmployeeNotAbsent()
    {
        $date = date('Y-m-d');
        return DB::select(DB::raw("SELECT * FROM users WHERE NOT EXISTS (SELECT * FROM absents WHERE users.id = absents.id_user AND absents.created_at LIKE '$date%' AND absents.status = 'IN') LIMIT 10"));
        // SELECT * FROM users WHERE NOT EXISTS(SELECT * FROM absents WHERE users.id = absents.id_user AND absents.keterangan='IN' OR absents.keterangan = 'OUT')
    }
    public static function getCountEmployee()
    {
        if(Cache::get('getCountEmployee') === null)
        {
            return Cache::remember('getCountEmployee', now()->addMinutes(60), function() {
                return User::count();
            });
        }
        return Cache::get('getCountEmployee');
    }
    public static function getEmployee()
    {
        return User::paginate(25);
    }
}
