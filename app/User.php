<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','cabang_id','idpersonal','form','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cool_created()
    {
        return $this->hasMany('App\Cool','usercreated','id');
    }
    public function cool_updated()
    {
        return $this->hasMany('App\Cool','userupdated','id');
    }
    public function materi_kom_created()
    {
        return $this->hasMany('App\Cool','usercreated','id');
    }
    public function materi_kom_updated()
    {
        return $this->hasMany('App\Cool','userupdated','id');
    }
    public function cool_anggota_created()
    {
        return $this->hasMany('App\Anggotacool','usercreated','id');
    }
    public function cool_anggota_updated()
    {
        return $this->hasMany('App\Anggotacool','userupdated','id');
    }
    public function materi_guru_created()
    {
        return $this->hasMany('App\Materiguru','usercreated','id');
    }
    public function materi_guru_updated()
    {
        return $this->hasMany('App\Materiguru','userupdated','id');
    }
    public function jabatan_anggota_created()
    {
        return $this->hasMany('App\JabatanAnggotaCool','usercreated','id');
    }
    public function jabatan_anggota_updated()
    {
        return $this->hasMany('App\JabatanAnggotaCool','userupdated','id');
    }
    public function jabatan_gembala_created()
    {
        return $this->hasMany('App\JabatanGembalaCool','usercreated','id');
    }
    public function jabatan_gembala_updated()
    {
        return $this->hasMany('App\JabatanGembalaCool','userupdated','id');
    }
    public function kom_seri_created()
    {
        return $this->hasMany('App\Komseri','usercreated','id');
    }
    public function kom_seri_updated()
    {
        return $this->hasMany('App\Komseri','userupdated','id');
    }
    public function role()
    {
        return $this->belongsTo('App\Libraries\Acl\Models\Role','role_id','id');
    }
    public function cabang()
    {
        return $this->belongsTo('App\Cabang','cabang_id','idcabangranting');
    }
    public function personal()
    {
        return $this->belongsTo('App\Personal','idpersonal','idpersonal');
    }
}
