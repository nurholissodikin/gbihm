<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensipertemuan extends Model
{
    //
    protected $table = 'absensi_pertemuan';
    protected $primaryKey = 'id';
    protected $fillable = [
    'idpertemuan',
	'idpengerja',
	'kehadiran',
	'usercreated',
	'userupdated',
	'alasan',
	'idtamukhusus',
	'idpengerja_cool',
	'jenis'

    ];
    public function pertemuan()
    {
        return $this->belongsTo('App\Pertemuan','idpertemuan','id');
    }
    public function jabatanpelayan()
    {
        return $this->belongsTo('App\Jabatanpelayanan','idpengerja','id');
    }
    public function tamukhusus()
    {
        return $this->belongsTo('App\Ptamukhusus','idtamukhusus','idtamukhusus');
    }
    public function pengerjacool()
    {
        return $this->belongsTo('App\Coolpengerja','idpengerja_cool','id');
    }
}
