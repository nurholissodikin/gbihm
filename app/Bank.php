<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $table = 'bank';

     public function saldo()
    {
        return $this->hasMany('App\Saldo','rek_asal','idbank');
    }
    public function saldoa()
    {
        return $this->hasMany('App\Saldo','rek_tujuan','idbank');
    }
}
