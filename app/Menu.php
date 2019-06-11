<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $fillable= [
	'nama',
	'icon',
	'url',
	'usercreated',
	'userupdated',
	'list_order'
    ];
    public function menulist()
    {
    	return $this->hasMany('App\Menulist','menu_id','id');
    }
    public function parentlist()
    {
        return $this->hasMany('App\Menulist','parent_id','id');
    }
}
