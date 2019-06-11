<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptamu extends Model
{
    //
    protected $table = 'p_tamu';
    protected $primaryKey = 'idtamu';
    protected $guarded = [];
    public $incrementing = false;
    protected $fillable = [
    'idtamu',
    'namalengkap',
	'namapanggilan',
	'jeniskelamin',
	'demonisasi',
	'institusi',
	'notelp',
	'keterangan',
	'jabatan',
	'status',
	'alamat',
	'email',
	'tanggallahir',
	'usercreated',
	'userupdated'];
}
