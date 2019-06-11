<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regencies extends Model
{
    protected $table = 'regencies';

     public function divisi()
    {
      return $this->hasMany('App\Divisi','kota','id');
    }
    public function subrayon()
    {
      return $this->hasMany('App\Subrayon','kota','id');
    }
     public function cabang()
    {
      return $this->hasMany('App\Cabang','kota','id');
    }
    public function kebaktian()
    {
      return $this->hasMany('App\Kebaktian','kota','id');
    }
     public function personal()
    {
      return $this->hasMany('App\Personal','kota','id');
    }
     public function kegiatan()
    {
      return $this->hasMany('App\Kegiatan','kabkota','id');
    }
     public function cool()
    {
      return $this->hasMany('App\Cool','kabkota','id');
    }
    public function ibadahraya()
    {
      return $this->hasMany('App\Ibadahraya','kabkota','id');
    }
}
