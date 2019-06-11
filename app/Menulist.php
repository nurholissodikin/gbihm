<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menulist extends Model
{
    //
    protected $table = 'menu_list';
    protected $primaryKey = 'id';
    protected $fillable= [
	'menu_id',
	'parent_id',
	'order',
	'usercreated',
	'userupdated'
    ];

    public function menu()
    {
    	return $this->belongsTo('App\Menu','menu_id','id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Menu','parent_id','id');
    }
}
