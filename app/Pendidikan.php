<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    protected $table = 'pendidikan';
    protected $primaryKey = 'idpendidikan';
    protected $fillable = [
    'idpersonal',
    'tingkatpendidikan',
    'institusi',
    'lokasi',
    'jurusan',
    'cpguru',
    'tahun',
    'usercreated',
    'userupdated',
    'active'
     ];
    public function personal()
    {
    	return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
    
}
