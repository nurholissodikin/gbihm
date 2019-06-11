<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table = 'districts';

     public function divisi()
    {
      return $this->hasMany('App\Divisi','kecamatan','id');
    }
    public function subrayon()
    {
      return $this->hasMany('App\Subrayon','kecamatan','id');
    }
    public function cabang()
    {
      return $this->hasMany('App\Cabang','kecamatan','id');
    }
     public function kebaktian()
    {
      return $this->hasMany('App\Kebaktian','kecamatan','id');
    }
    public function personal()
    {
      return $this->hasMany('App\Personal','kecamatan','id');
    }
    public function kegiatan()
    {
      return $this->hasMany('App\Kegiatan','kecamatan','id');
    }
    public function ibadahraya()
    {
      return $this->hasMany('App\Ibadahraya','kecamatan','id');
    }
}
