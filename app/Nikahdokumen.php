<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nikahdokumen extends Model
{
    //
    protected $table = 'dokumen_pernikahan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama',
    'dokumen',
    'usercreated',
    'userupdated',
    'status'
    ];
}
