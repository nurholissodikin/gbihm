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
        
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Data Peserta Pernikahan Data Suami - Akta Pernikahan</h3>
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
                      <label>No. ID Suami</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->idpersonal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap Suami</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namalengkap_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namadepan_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namatengah_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namabelakang_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->tempatlahir_personal}}, {{$pernikahan->tanggallahir_personal_fmt}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->nokkj}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Data Peserta Pernikahan Data Istri - Akta Pernikahan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. ID Istri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->idpasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap Istri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namalengkap_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namadepan_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namatengah_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namabelakang_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->tempatlahir_pasangan}}, {{$pernikahan->tanggallahir_pasangan_fmt}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->nokkj}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Dokumen Pendaftaran Pernikahan</h3>
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
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_aktakelahiran/'.$pernikahan->d_aktakelahiran.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_aktakelahiran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP / Paspor / ID Lain</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp/'.$pernikahan->d_ktp.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_ktp}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pengantar dari Kelurahan (PM-1)</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_kelurahan/'.$pernikahan->d_sp_kelurahan.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sp_kelurahan}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Keterangan Untuk Nikah (N-1)</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sk_nikah/'.$pernikahan->d_sk_nikah.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sk_nikah}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Keterangan Tentang Orang Tua (N-4)</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sk_ortu/'.$pernikahan->d_sk_ortu.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sk_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pernyataan Belum Menikah</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_belummenikah/'.$pernikahan->d_sp_belummenikah.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sp_belummenikah}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga (KK)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_kk/'.$pernikahan->d_kk.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_kk}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP / Akta Kematian Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp_ayah/'.$pernikahan->d_ktp_ayah.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_ktp_ayah}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP / Akta Kematian Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp_ibu/'.$pernikahan->d_ktp_ibu.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_ktp_ibu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Persetujuan Ayah + Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_ortu/'.$pernikahan->d_sp_ortu.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sp_ortu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perceraian Ayah - Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_perceraian_ortu/'.$pernikahan->d_perceraian_ortu.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_perceraian_ortu}}</a></label> 
                    </div>
                  </div>  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Baptisan Selam</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_baptisan/'.$pernikahan->d_baptisan.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_baptisan}}</a></label> 
                    </div>
                  </div>    
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga Jemaat (KKJ)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_kkj/'.$pernikahan->d_kkj.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_kkj}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Sertifikat KOM 100</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sertifikat_kom/'.$pernikahan->d_sertifikat_kom.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sertifikat_kom}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Sertifikat BPN</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_sertifikat_bpn/'.$pernikahan->d_sertifikat_bpn.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_sertifikat_bpn}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pasfoto Bersama Berwarna Uk. 4x6 (3 lembar)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_foto1/'.$pernikahan->foto1.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->foto1}}</a></label> 
                      <label> &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_foto2/'.$pernikahan->foto2.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->foto2}}</a></label> 
                       <label> &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_foto3/'.$pernikahan->foto3.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->foto3}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 1</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_saksi1/'.$pernikahan->d_saksi1.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_saksi1}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP Saksi 2</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_saksi2/'.$pernikahan->d_saksi2.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_saksi2}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perceraian / Kematian Pasangan Terdahulu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_pasangan_dulu/'.$pernikahan->d_pasangan_dulu.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_pasangan_dulu}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Laporan Konseling Pranikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_konseling/'.$pernikahan->d_konseling.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_konseling}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Berita Acara Pelaksanaan Pernikahan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_berita/'.$pernikahan->d_berita.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_berita}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Dokumen Lain</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/pernikahan/d_lain/'.$pernikahan->d_lain.'')}}" class="btn btn-xs" target="_blank">{{$pernikahan->d_lain}}</a></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Berita Acara Pelaksanaan Pernikahan</h3>
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
                      <label>: &nbsp; <b><span>{{$pernikahan->tanggal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang/Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pelayan Pernikahan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$pernikahan->namalengkap_pelayan}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="demo-button">
              <button type="button" class="btn btn-primary btn-group-responsivey form-control">Kirim Ke Peserta</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  