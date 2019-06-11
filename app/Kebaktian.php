<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebaktian extends Model
{
    //
    protected $table= 'kebaktian';
    protected $primaryKey = 'idkebaktian';
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
  	'idrayon',
	'idsubrayon',
	'idcabangranting',
	'kodekebaktian',
	'namakebaktian',
	'jam',
	'alamat',
	'rtrw',
	'kecamatan',
	'kelurahan',
	'kota',
	'provinsi',
	'kodepos',
	'tempat',
	'kordinator',
	'notelepon',
	'fax',
	'email',
	'noref',
	'keterangan',
	'status',
	'usercreated',
	'userupdated',
	'kebaktian'];

     public function rayon()
    {
      return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
     public function subrayon()
    {
      return $this->belongsTo('App\Subrayon','idsubrayon','idsubrayon');
    }
     public function cabang()
    {
      return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
     public function personal()
    {
      return $this->belongsTo('App\Personal','kordinator','idpersonal');
    }
}
