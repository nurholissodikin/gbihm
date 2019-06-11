<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    protected $table = 'villages';
    public $incrementing = false;

     public function divisi()
    {
      return $this->hasMany('App\Divisi','kelurahan','id');
    }
    public function subrayon()
    {
      return $this->hasMany('App\Subrayon','kelurahan','id');
    }
    public function cabang()
    {
      return $this->hasMany('App\Cabang','kelurahan','id');
    }
    public function kebaktian()
    {
      return $this->hasMany('App\Kebaktian','kelurahan','id');
    }
    public function personal()
    {
      return $this->hasMany('App\Personal','kelurahan','id');
    }
     public function kegiatan()
    {
      return $this->hasMany('App\Kegiatan','kelurahan','id');
    }
    public function ibadahraya()
    {
      return $this->hasMany('App\Ibadahraya','kelurahan','id');
    }
}
