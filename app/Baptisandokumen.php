<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptisandokumen extends Model
{
    //
    protected $table = 'dokumen_baptisan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama',
    'dokumen',
    'usercreated',
    'userupdated',
    'status'
    ];
}
