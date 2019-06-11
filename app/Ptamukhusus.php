<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptamukhusus extends Model
{
    //
    protected $table = 'p_tamu_khusus';
    protected $primaryKey = 'idtamukhusus';
    public $incrementing = false;
    protected $fillable = [
    'idtamukhusus',
    'namalengkap',
	'namapanggilan',
	'jeniskelamin',
	'nik',
	'jabatan',
	'gereja',
	'email',
	'jenisbadge',
	'status',
	'menyutujui',
	'mengetahui',
	'tanggallahir',
    'verifikasi',
	'usercreated',
	'userupdated'];



	public function nmengetahui()
    {
        return $this->belongsTo('App\Jabatanpelayanan','mengetahui','id');
    }
    public function nmenyetujui()
    {
        return $this->belongsTo('App\Jabatanpelayanan','menyutujui','id');
    }
    public function absensi_pertemuan()
    {
    	return $this->hasMany('App\Absensipertemuan','idtamukhusus','idtamukhusus');
    }
}
