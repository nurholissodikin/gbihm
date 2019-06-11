<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    //
    protected $table = 'dokumen';
    protected $primaryKey = 'iddokumen';
    protected $fillable = [
    'idpersonal',
    'urldokumen',
    'usercreated',
    'userupdated',
    'active'
    ];

    public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
