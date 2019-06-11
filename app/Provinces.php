<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $table = 'provinces';

     public function divisi()
    {
      return $this->hasMany('App\Divisi','provinsi','id');
    }
    public function subrayon()
    {
      return $this->hasMany('App\Subrayon','provinsi','id');
    }
    public function cabang()
    {
      return $this->hasMany('App\Cabang','provinsi','id');
    }
    public function kebaktian()
    {
      return $this->hasMany('App\Kebaktian','provinsi','id');
    }
    public function personal()
    {
      return $this->hasMany('App\Personal','provinsi','id');
    }
    public function kegiatan()
    {
      return $this->hasMany('App\Kegiatan','provinsi','id');
    }
    public function cool()
    {
      return $this->hasMany('App\Cool','provinsi','id');
    }
     public function ibadahraya()
    {
      return $this->hasMany('App\Ibadahraya','provinsi','id');
    }
}
