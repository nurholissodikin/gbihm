@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Detail Absensi COOL
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Detail Data Absensi COOL</h3>
              </div>
              <br>
                <input type="hidden" name="idcool" value="{{$absensi->idcool}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input readonly type="text" name="tanggal" class="form-control " value="{{$absensi->tanggal}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gembala</label>
                    <input readonly type="text" name="kubu_doa" class="form-control" value="{{$absensi->cool->personal['namalengkap']}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input readonly type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{$absensi->lokasi}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kubu Doa</label>
                    <input readonly type="number" name="kubu_doa" class="form-control" value="{{$absensi->kubu_doa}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jemaat Yang Hadir</label>
                    <input readonly type="number" name="jemaat" class="form-control" value="{{$absensi->jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Non Jemaat Yang Hadir</label>
                    <input readonly type="number" name="non_jemaat" class="form-control" value="{{$absensi->non_jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input readonly type="number" name="persembahan" class="form-control" value="{{$absensi->persembahan}}">
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