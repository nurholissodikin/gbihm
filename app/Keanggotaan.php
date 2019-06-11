<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    //
    protected $table = 'keanggotaan';
    protected $primaryKey = 'idkeanggotaan';
    protected $fillable = [
    'idpersonal',
    'idkompetensi',
    'idcabangranting',
    'tglregistrasipindah',
    'statuskeanggotaan',
    'alasanpindah',
    'dokumen',
    'usercreated',
    'userupdated',
    'active',
    'idrayon',
    'idsubrayon',
    'active'
     ];
    public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    public function kompetensi()
    {
    	return $this->belongsTo('App\Kompetensi','idkompetensi','idkompetensi');
    }
     public function cabang()
    {
    	return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
}
