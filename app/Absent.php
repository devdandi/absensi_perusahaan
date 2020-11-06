<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Absent extends Model
{
    protected $table = "absents";
    protected $fillable = ['id_user','status','keterangan'];

    public function in($keterangan)
    {
        if($keterangan === TRUE)
        {
            return $this->create(['id_user' => Auth::id(),'status' => 'IN','keterangan' => 'ONTIME']);
        }
        return $this->create(['id_user' => Auth::id(),'status' => 'IN','keterangan' => 'LATE']);

    }
    public function out($keterangan)
    {
        if($keterangan === TRUE)
        {
            return $this->create(['id_user' => Auth::id(),'status' => 'OUT','keterangan' => 'ONTIME']);
        }
        return $this->create(['id_user' => Auth::id(),'status' => 'OUT','keterangan' => 'TOOFAST']);
    }
}
