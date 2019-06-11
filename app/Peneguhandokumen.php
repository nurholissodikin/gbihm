<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneguhandokumen extends Model
{
    //
    protected $table = 'dokumen_peneguhan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'nama',
    'dokumen',
    'usercreated',
    'userupdated',
    'status'
    ];
}
