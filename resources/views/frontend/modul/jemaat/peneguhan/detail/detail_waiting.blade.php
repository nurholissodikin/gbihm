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
              <h3 class="box-title ">Data Peserta Peneguhan Nikah Data Suami - Waiting For Certificate</h3>
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
                      <label>: &nbsp; <b><span>{{$peneguhan->idpersonal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap Suami</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namalengkap_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namadepan_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namabelakang_personal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->tempatlahir_personal}}, {{$peneguhan->tanggallahir_personal_fmt}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->nokkj}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->id_ayahper_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->nm_depan_ayah_per}} {{$peneguhan->namalengkap_ayah_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ayah_per}} {{$peneguhan->nm_tengah_ayah_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namabelakang_ayah_per}} {{$peneguhan->nm_belakang_ayah_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->idibuper_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namadepan_ibu_per}} {{$peneguhan->nm_depan_ibu_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ibu_per}} {{$peneguhan->nm_belakang_ibu_per}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ibu_per}} {{$peneguhan->nm_belakang_ibu_per}}</span></b></label> 
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
              <h3 class="box-title ">Data Peserta Peneguhan Nikah Data Istri - Waiting For Certificate</h3>
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
                      <label>: &nbsp; <b><span>{{$peneguhan->idpasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap Istri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namalengkap_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namadepan_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namabelakang_pasangan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat / Tanggal Lahir</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->tempatlahir_pasangan}}, {{$peneguhan->tanggallahir_pasangan_fmt}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang / Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>No. KKJ</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->nokkj}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->id_ayahper_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->nm_depan_ayah_pas}} {{$peneguhan->namalengkap_ayah_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ayah_pas}} {{$peneguhan->nm_tengah_ayah_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ayah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namabelakang_ayah_pas}} {{$peneguhan->nm_belakang_ayah_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Id. Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->idibupas_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Depan Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namadepan_ibu_pas}} {{$peneguhan->nm_depan_ibu_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Tengah Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ibu_pas}} {{$peneguhan->nm_belakang_ibu_pas}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Belakang Ibu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namatengah_ibu_pas}} {{$peneguhan->nm_belakang_ibu_per}}</span></b></label> 
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
              <h3 class="box-title ">Dokumen Pendaftaran Peneguhan Nikah</h3>
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
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_aktakelahiran/'.$peneguhan->d_aktakelahiran.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_aktakelahiran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KTP / Paspor / ID Lain</label>
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_ktp/'.$peneguhan->d_ktp.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_ktp}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga (KK)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_kk/'.$peneguhan->d_kk.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_kk}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Nikah / Buku Nikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_akta_nikah/'.$peneguhan->d_akta_nikah.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_akta_nikah}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Pernyataan / Testimoni Sebagai Suami Istri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_sp_suami_istri/'.$peneguhan->d_sp_suami_istri.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_sp_suami_istri}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Surat Baptisan Selam</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_baptisan/'.$peneguhan->d_baptisan.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_baptisan}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kartu Keluarga Jemaat (KKJ)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_kkj/'.$peneguhan->d_kkj.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_kkj}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Sertifikat KOM 100</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_sertfifkat_kom/'.$peneguhan->d_sertfifkat_kom.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_sertfifkat_kom}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Sertifikat BPN</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_sertfifkat_bpn/'.$peneguhan->d_sertfifkat_bpn.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_sertfifkat_bpn}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pasfoto Bersama Berwarna Uk. 4x6 (3 lembar)</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_foto1/'.$peneguhan->d_foto1.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_foto1}}</a></label> 
                      <label> &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_foto2/'.$peneguhan->d_foto2.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_foto2}}</a></label> 
                       <label> &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_foto3/'.$peneguhan->d_foto3.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_foto3}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Akta Perceraian / Kematian Pasangan Terdahulu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_perceraian/'.$peneguhan->d_perceraian.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_perceraian}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tanda Terima Dokumen Peneguhan Nikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_ttd_peneguhan/'.$peneguhan->d_ttd_peneguhan.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_ttd_peneguhan}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Berita Acara Pelaksanaan Peneguhan Nikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_berita/'.$peneguhan->d_berita.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_berita}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pendaftaran Peneguhan Nikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_pendaftaran/'.$peneguhan->d_pendaftaran.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_pendaftaran}}</a></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Dokumen Lain</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <a  href="{{asset('public/assets/jemaat/peneguhan/d_lain/'.$peneguhan->d_lain.'')}}" class="btn btn-xs" target="_blank">{{$peneguhan->d_lain}}</a></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <h3 class="box-title ">Berita Acara Pelaksanaan Peneguhan Nikah</h3>
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
                      <label>: &nbsp; <b><span>{{$peneguhan->tanggal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Cabang/Ranting</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namacabang}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pelayan Peneguhan Nikah</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$peneguhan->namalengkap_pelayan}}</span></b></label> 
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