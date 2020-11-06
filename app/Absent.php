<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Absent extends Model
{
    protected $table = "absents";
    protected $fillable = ['id_user','status'];

    public function in()
    {
        return $this->create(['id_user' => Auth::id(),'status' => 'IN']);
    }
    public function out()
    {
        return $this->create(['id_user' => Auth::id(),'status' => 'OUT']);

    }
}
