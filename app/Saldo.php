<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    //
    protected $table= 'transaksi';
    protected $primaryKey = 'idtransaksi';
    protected $fillable = [
  	'tanggal',
  	'rek_asal', 
    'rek_tujuan',  
    'kode_transfer',
  	'jumlah',
  	'berita',
  	'bukti',
    'jenis_transaksi',
  	'idrayon',
  	'usercreated',
  	'userupdated',
    'iddivisi',
    'idsubrayon',
    'idcabangranting',
    'idpersonal'
];

    public function rayon()
    {
      return $this->belongsTo('App\Rayon','idrayon','idrayon');
    }
    public function bank()
    {
      return $this->belongsTo('App\Bank','rek_asal','idbank');
    }
    public function banka()
    {
      return $this->belongsTo('App\Bank','rek_tujuan','idbank');
    }
    public function divisi()
    {
      return $this->belongsTo('App\Divisi','iddivisi','iddivisi');
    }
    public function subrayon()
    {
      return $this->belongsTo('App\Subrayon','idsubrayon','idsubrayon');
    }
    public function cabang()
    {
      return $this->belongsTo('App\Cabang','idcabangranting','idcabangranting');
    }
}
