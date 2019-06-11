<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    //
    protected $table = 'jabatan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable= [
	'kode_jabatan',
	'jabatan',
	'usercreated',
	'userupdated',
	'active'
    ];
}