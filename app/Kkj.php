<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kkj extends Model
{
    //
    protected $table = 'kkj';
    protected $primaryKey = 'id';
  
    protected $fillable = ['nokkj',
    'idpersonal',
    'keadaandarurat',
    'telpdarurat',
    'dokumen' ,
    'usercreated',
    'userupdated',
    ' active'
     ];
     public function personal()
    {
      return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
