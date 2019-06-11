@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Detail Kelas KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Data KOM</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Rayon</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{$kelas->id}}">
                      <label>: &nbsp; <b><span>{{$kelas->rayon['namarayon']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KOM Seri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$kelas->kom_seri}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Angkatan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$kelas->angkatan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tanggal Mulai Kelas</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$kelas->tgl_mulai}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Periode</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$kelas->periode_m}} - {{$kelas->periode}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <ul id="mytabsb"class="nav nav-tabs tab-nav-right dynamic-tabs" role="tablist">
                 <li role="presentation" class="active"><a href="#kehadiran" data-toggle="tab">Kehadiran</a></li>
                 <li role="presentation"><a href="#ujian" data-toggle="tab">Ujian</a></li>            
                 <li role="presentation"><a href="#lkp" data-toggle="tab" disable >LKP</a></li>
                 <li role="presentation"><a href="#magang" data-toggle="tab" disable >Magang</a></li>
                 <li role="presentation"><a href="#tugas" data-toggle="tab" disable >Tugas Akhir</a></li>
                 <li role="presentation"><a href="#makalah" data-toggle="tab" disable >Makalah Akhir</a></li>
                 <li role="presentation"><a href="#sertifikat" data-toggle="tab" disable >Sertifikat</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="kehadiran">   
                   @include('frontend.modul.kom.kelas.kehadiran.index')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="ujian">  
                   @include('frontend.modul.kom.kelas.ujian.index')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="lkp">
                  @include('frontend.modul.kom.kelas.lkp.index')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="magang">
                    @include('frontend.modul.kom.kelas.magang.index')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tugas">
                    @include('frontend.modul.kom.kelas.tugas.index')
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 