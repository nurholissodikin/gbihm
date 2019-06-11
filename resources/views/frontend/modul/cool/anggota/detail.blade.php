@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Detail Anggota COOL - <b>{{$anggota->personal['namalengkap']}}</b>
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
               <h3 class="box-title">Detail Anggota COOL</h3>
              </div>
              <br>
                <input type="hidden" name="idcool" value="{{$anggota->idcool}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ID Personal</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->personal['idpersonal']}}" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->personal['namalengkap']}}" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->personal['tanggallahir']}}" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->personal['email']}}" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan Anggota COOL</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->jabatan_anggota}}" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Anggota COOL</label>
                    <input type="text" name="personal" class="form-control" value="{{$anggota->kategori}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="demo-button"><br>
                    <button type="submit" class="btn btn-block btn-primary  waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 