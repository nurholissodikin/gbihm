<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenispekerjaan extends Model
{
    //
     protected $table = 'jenis_pekerjaan';
    protected $primaryKey = 'idjenispekerjaan';
     protected $fillable= [
	'jenispekerjaan',
	'usercreated',
	'userupdated',
	'active'
    ];

    public function personal()
    {
    	return $this->hasMany('App\Personal','idjenispekerjaan','idjenispekerjaan');
    }
}
