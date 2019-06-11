  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pelayanan Jemaat
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Data Peserta Penyerahan Anak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. ID</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->idpersonalanak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namalengkap_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namadepan_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namatengah_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namabelakang_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->tempatlahir_anak}}, {{$anak->tanggallahir_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->nokkj_anak}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->idayahper}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namadepan_ayah}} {{$anak->nm_depan_ayah}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namatengah_ayah}} {{$anak->nm_tengah_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namabelakang_ayah}} {{$anak->nm_belakang_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->idibuper}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namadepan_ibu}} {{$anak->nm_depan_ibu}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namatengah_ibu}} {{$anak->nm_belakang_ibu}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namatengah_ibu}} {{$anak->nm_belakang_ibu}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Dokumen Pendaftaran Penyerahan Anak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Kelahiran</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_aktakelahiran/'.$anak->d_aktakelahiran.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_aktakelahiran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga (KK)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_kk/'.$anak->d_kk.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_kk}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pasfoto Berwarna (3 x 4) 2 Lembar</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_foto1/'.$anak->d_foto1.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_foto1}}</a></label> 
                      <label> &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_foto2/'.$anak->d_foto2.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_foto2}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 1</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_saksi1/'.$anak->d_saksi1.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_saksi1}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 2</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_saksi2/'.$anak->d_saksi2.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_saksi2}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pernyataan Dari Orang Tua</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_sp_ortu/'.$anak->d_sp_ortu.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_sp_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perkawinan Orang Tua</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_kawin_ortu/'.$anak->d_kawin_ortu.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_kawin_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perceraian + Putusan Pengadilan No.</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_perceraian/'.$anak->d_perceraian.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_perceraian}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tanda Terima Dokumen Pendaftaran Penyerahan Anak</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_ttd_anak/'.$anak->d_ttd_anak.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_ttd_anak}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Berita Acara Pelaksanaan Penyerahan Anak</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_berita/'.$anak->d_berita.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_berita}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pendaftaran Penyerahan Anak</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_pendaftaran/'.$anak->d_pendaftaran.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_pendaftaran}}</a></label> 
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <label>Dokumen Lain</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/anak/d_lain/'.$anak->d_lain.'')}}" class="btn btn-xs" target="_blank">{{$anak->d_lain}}</a></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Berita Acara Pelaksanaan Penyerahan Anak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Hari, Tanggal</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->tanggal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang/Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pelayan Penyerahan Anak</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$anak->namalengkap_pelayan}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="demo-button">
              <button type="submit" class="btn btn-block btn-primary   waves-effect" value="BACK" onCLick="history.go(-1);">Kembali</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  