@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        BP2N
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Detail Data Guru</h3>
                 <div class="pull-right">
                  <button type="submit" value="Kembali" class="btn btn-primary" onClick="history.go(-1);">Kembali</button>
                 </div>
              </div>
              <br>
             
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>ID Personal</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->idpersonal}}</label>
                  </div>
                  <div class="col-md-4 pull-right">
                    <a href="#" class="form-control btn btn-primary pull-right" >Diklat</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Nama Lengkap</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->personal['namalengkap']}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                    <a href="#" class="form-control btn btn-primary pull-right" >Audisi</a>
                  </div>
              </div>
               <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="col-md-6">
                    @php
                    $a=$guru->personal['jeniskelamin'];
                    if($a == 'L')
                    {
                     $b="Laki-Laki";
                    }else if($a == 'P')
                    {
                     $b="Perempuan";
                    }else{}
                    @endphp
                    <label>: {{$b}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="#" class="form-control btn btn-primary pull-right" >Magang</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Rayon</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->personal['namalengkap']}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                    <a href="#" class="form-control btn btn-primary pull-right" >Seminar</a>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Cabang</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->personal['namalengkap']}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="#" class="form-control btn btn-primary pull-right" >Rm Camp</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Angkatan</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->angkatan}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="#" class="form-control btn btn-primary pull-right" >Absensi</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Jenis Jabatan</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->jenis_jabatan}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="#" class="form-control btn btn-primary pull-right" >Kelas Pasca NK</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Angkatan</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->keterangan}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="#" class="form-control btn btn-primary pull-right" >Sertifikat</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  