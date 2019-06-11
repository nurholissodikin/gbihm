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
              <h3 class="box-title ">Data Peserta</h3>
               <div class="pull-right">
                <button type="submit" class="btn btn-block btn-primary btn-xs  waves-effect" value="BACK" onCLick="history.go(-1);">Kembali</button>
              </div>
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
                      <label>: &nbsp; <b><span>{{$baptisan->idpersonal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namalengkap_p}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namadepan_p}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namatengah_p}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namabelakang_p}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->tempatlahir}}, {{$baptisan->tanggallahir}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span></span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->nokkj}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->idayahper}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namadepan_ayah}} {{$baptisan->namadepanibu}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namatengah_ayah}} {{$baptisan->namatengahibu}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namabelakang_ayah}} {{$baptisan->namabelakangibu}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->idibuper}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namadepan_ibu}} {{$baptisan->namadepan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namatengah_ibu}} {{$baptisan->namatengah}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namabelakang_ibu}} {{$baptisan->namabelakang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Baptisan Air</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->baptisanair}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Dokumen Pendaftaran Baptisan Air</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Baptisan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_aktakelahiran/'.$baptisan->d_aktakelahiran.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_aktakelahiran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Kelahiran</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_aktakelahiran/'.$baptisan->d_aktakelahiran.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_aktakelahiran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP / Paspor / ID Lain</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_ktppass/'.$baptisan->d_ktppass.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_ktppass}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga (KK)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_kk/'.$baptisan->d_kk.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_kk}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pasfoto Berwarna (3 x 4) 2 Lembar</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_foto1/'.$baptisan->d_foto1.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_foto1}}</a></label> 
                      <label> &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_foto2/'.$baptisan->d_foto2.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_foto2}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 1</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_saksi1/'.$baptisan->d_saksi1.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_saksi1}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 2</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_saksi2/'.$baptisan->d_saksi2.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_saksi2}}</a></label> 
                    </div>
                  </div><div class="col-md-12">
                    <div class="form-group">
                      <label>Berusia < 17 tahun</label>  
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pernyataan Dari Orang Tua</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_sp_ortu/'.$baptisan->d_sp_ortu.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_sp_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Ayah / Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_ktp_ortu/'.$baptisan->d_ktp_ortu.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_ktp_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perkawinan Orang Tua</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_kawin_ortu/'.$baptisan->d_kawin_ortu.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_kawin_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perceraian + Putusan Pengadilan No.</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_perceraian/'.$baptisan->d_perceraian.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_perceraian}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KTP ber-agama lain</label>  
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pernyataan (Aplikasi Non Kristen)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_sp_agama/'.$baptisan->d_sp_agama.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_sp_agama}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tanda Terima Dokumen Pendaftaran Baptisan Air</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_ttd_baptisan/'.$baptisan->d_ttd_baptisan.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_ttd_baptisan}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Berita Acara Pelaksanaan Baptisan Air</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_berita/'.$baptisan->d_berita.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_berita}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pendaftaran Baptisan Air</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_pendaftaran/'.$baptisan->d_pendaftaran.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_pendaftaran}}</a></label> 
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <label>Dokumen Lain</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/baptisan/d_lain/'.$baptisan->d_lain.'')}}" class="btn btn-xs" target="_blank">{{$baptisan->d_lain}}</a></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Berita Acara Pelaksanaan Baptisan</h3>
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
                      <label>: &nbsp; <b><span>{{$baptisan->tanggal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang/Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pelayan Baptisan Air</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$baptisan->namapelayan}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Catatan / Keterangan</label>
                      <textarea class="form-control" name="catatan" row="3"></textarea>  
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Dokumen</label>
                      <input type="file" name="dokumen" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="demo-button">
                      <button type="button" class="btn btn-primary btn-group-responsivey form-control">Kirim Ke Rayon</button>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="demo-button">
                      <button type="button" class="btn btn-primary btn-group-responsivey form-control">Kirim Ke Cabang</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  