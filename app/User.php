<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Absent;
use Carbon\Carbon;
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
       return DB::select(DB::raw("SELECT * FROM users WHERE NOT EXISTS(SELECT * FROM absents WHERE users.id = absents.id_user)"));
        // SELECT * FROM users WHERE NOT EXISTS(SELECT * FROM absents WHERE users.id = absents.id_user AND absents.keterangan='IN' OR absents.keterangan = 'OUT')
    }
}
