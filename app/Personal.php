<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $table= 'personal';
    protected $primaryKey = 'idpersonal';
    public $incrementing = false;
    protected $casts = ['rtrw' => 'array'];
    protected $fillable = [
    'urlphoto', 
    'nokkj', 
    'idprofesi', 
    'idjenispekerjaan', 
    'idbidangpekerjaan', 
    'ktpid', 
    'simid', 
    'passportid', 
    'aktalahirid', 
    'ktpberlakusd', 
    'simberlakusd', 
    'passportberlakusd', 
    'namalengkap', 
    'namadepan',  
    'namatengah',  
    'namabelakang',  
    'namapanggilan',  
    'gelarawal',  
    'gelartengah',  
    'gelarakhir',  
    'tempatlahir',  
    'tanggallahir', 
    'jeniskelamin',  
    'golongandarah',  
    'agama', 
    'statusperkawinan',  
    'sejaktanggalstatuskawin', 
    'kewarganegaraan', 
    'statuspersonal',  
    'sejaktanggalstatuspersonal', 
    'catatanpersonal', 
    'alamattinggal', 
    'rtrw',  
    'kecamatan',  
    'kelurahan',  
    'kabkota',  
    'provinsi',  
    'kodepos',  
    'googlemapadd', 
    'latitude',  
    'longitude',  
    'notelp',  
    'nohp',  
    'whatsapp',  
    'email',  
    'facebook', 
    'twitter', 
    'statuspekerjaan', 
    'hobi', 
    'dok_kkj',
    'keanggotaan', 
    'gerejaasal', 
    'mulaiberjemaat', 
    'baptisrohkudus', 
    'keadaandarurathub',
    'hubkeluarga',
    'dokumen_ktp', 
    'usercreated',  
    'userupdated'];

    public function bidangpekerjaan()
    {
        return $this->belongsTo('App\Bidangpekerjaan','idbidangpekerjaan','idbidangpekerjaan');
    }
    public function jenispekerjaan()
    {
        return $this->belongsTo('App\Jenispekerjaan','idjenispekerjaan','idjenispekerjaan');
    }
    public function profesi()
    {
        return $this->belongsTo('App\Profesi','idprofesi','idprofesi');
    }
    public function pendidikan()
    {
        return $this->belongsTo('App\Pendidikan','idpersonal','idpersonal');
    }
     public function kkj()
    {
        return $this->hasMany('App\Kkj','idpersonal','idpersonal');
    }
    public function dokumen()
    {
        return $this->hasMany('App\Dokumen','idpersonal','idpersonal');
    }
     public function rayon()
    {
        return $this->hasMany('App\Rayon','pemimpin','idpersonal');
    }
    public function divisi()
    {
        return $this->hasMany('App\Divisi','pemimpin','idpersonal');
    }
     public function divisia()
    {
        return $this->hasMany('App\Divisi','wakilpemimpin','idpersonal');
    }
    public function cabang()
    {
        return $this->hasMany('App\Cabang','idcabangranting','idcabangranting');
    }
    public function subrayon()
    {
        return $this->hasMany('App\Subrayon','pemimpin','idpersonal');
    }
     public function subrayona()
    {
        return $this->hasMany('App\Subrayon','wakilpemimpin','idpersonal');
    }
     public function kebaktian()
    {
        return $this->hasMany('App\Kebaktian','kordinator','idpersonal');
    }
     public function keanggotaan()
    {
        return $this->hasMany('App\Keanggotaan','idpersonal','idpersonal');
    }
     public function diserahkan()
    {
        return $this->hasMany('App\Diserahkan','idpersonal','idpersonal');
    }
    public function diserahkana()
    {
        return $this->hasMany('App\Diserahkan','idpelayan','idpersonal');
    }
    public function baptisanper()
    {
        return $this->hasMany('App\Baptisanair','idpersonal','idpersonal');
    }
    public function baptisanpel()
    {
        return $this->hasMany('App\Baptisanair','idpelayan','idpersonal');
    }
    public function baptisanayah()
    {
        return $this->hasMany('App\Baptisanair','idayah','idpersonal');
    }
    public function baptisanibu()
    {
        return $this->hasMany('App\Baptisanair','idibu','idpersonal');
    }
    public function ayahibu()
    {
        return $this->hasMany('App\Ayahibu','idpersonal','idpersonal');
    }
    public function anak()
    {
        return $this->hasMany('App\Anak','idpersonal','idpersonal');
    }
    public function pe_anak()
    {
        return $this->hasMany('App\Anak','idpersonalanak','idpersonal');
    }
    public function anakpelayan()
    {
        return $this->hasMany('App\Ayahibu','idpelayan','idpersonal');
    }
    public function provinsia()
    {
      return $this->belongsTo('App\Provinces','provinsi','id');
    }
    public function kabkotaa()
    {
      return $this->belongsTo('App\Regencies','kabkota','id');
    }
     public function kecamatana()
    {
      return $this->belongsTo('App\Districts','kecamatan','id');
    }
     public function kelurahana()
    {
      return $this->belongsTo('App\Villages','kelurahan','id');
    }
     public function komisi()
    {
      return $this->hasMany('App\Komisi','idpersonal','idpersonal');
    }
     public function pelayanan()
    {
        return $this->hasMany('App\Pelayanan','idpersonal','idpersonal');
    }
     public function jabatanpelayanan()
    {
        return $this->hasMany('App\Jabatanpelayanan','idpersonal','idpersonal');
    }
     public function jabatanpengerja()
    {
        return $this->hasMany('App\Jabatanpelayanan','pengerja','idpersonal');
    }
     public function kegiatan()
    {
        return $this->hasMany('App\Kegiatan','kordinator','idpersonal');
    }
    public function murid()
    {
        return $this->hasMany('App\Murid','idpersonal','idpersonal');
    }
    public function guru()
    {
        return $this->hasMany('App\Guru','idpersonal','idpersonal');
    }
    public function pelayankegiatan()
    {
        return $this->hasMany('App\Pelayankegiatan','idpersonal','idpersonal');
    }
    public function pesertakegiatan()
    {
        return $this->hasMany('App\Pesertakegiatan','idpeserta','idpersonal');
    }
    public function baptis_roh_kudus()
    {
        return $this->hasMany('App\Baptisrohkudus','idpersonal','idpersonal');
    }
    public function cool()
    {
        return $this->hasMany('App\Cool','gembala','idpersonal');
    }
    public function anggotacool()
    {
        return $this->hasMany('App\Anggotacool','idpersonal','idpersonal');
    }
    public function ibadahraya()
    {
        return $this->hasMany('App\Ibadahraya','kordinator','idpersonal');
    }
    public function personal()
    {
        return $this->hasMany('App\Ibadahrayapelayan','idpersonal','idpersonal');
    }
    public function bpncalonguru()
    {
        return $this->hasMany('App\Bpncalonguru','idpersonal','idpersonal');
    }
     public function bpnguru()
    {
        return $this->hasMany('App\Bpnguru','idpersonal','idpersonal');
    }
    public function bpnpeserta_pria()
    {
        return $this->hasMany('App\Bpnpeserta','idpria','idpersonal');
    }
    public function bpnpeserta_wanita()
    {
        return $this->hasMany('App\Bpnpeserta','idwanita','idpersonal');
    }
}
	