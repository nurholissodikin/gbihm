<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    //
    protected $table = 'kompetensi';
    protected $primaryKey = 'idkompetensi';

    public function keanggotaan(){
    	return $this->hasMany('App\Keanggotaan','idkompetensi','idkompetensi');
    }
}
