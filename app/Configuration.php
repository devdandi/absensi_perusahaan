<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = "configuration";

    public function getConfig()
    {
        return $this->all();
    }
}
