<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anakdokumen extends Model
{
    //

    protected $table = 'dokumen_anak';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama',
    'dokumen',
    'usercreated',
    'userupdated',
    'status'
    ];
}
