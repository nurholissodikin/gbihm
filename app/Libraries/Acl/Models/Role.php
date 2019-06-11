<?php

namespace App\Libraries\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'acl_role';
    protected $primaryKey = 'id';

    public function urls()
    {
        return $this->belongsToMany('\App\Libraries\Acl\Models\Url','acl_rule','role_id','url_id')->withPivot(['access']);
    }    
}
