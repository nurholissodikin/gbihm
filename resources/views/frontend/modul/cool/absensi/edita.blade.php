@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Edit Absensi COOL
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Edit Data Absensi COOL</h3>
              </div>
              <br>
              <form  action="{{ url('absensi/update',$absensi->id) }}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idcool" value="{{$absensi->idcool}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" name="tanggal" class="form-control datepickerlight" value="{{$absensi->tanggal}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{$absensi->lokasi}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kubu Doa</label>
                    <input type="number" name="kubu_doa" class="form-control" value="{{$absensi->kubu_doa}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jemaat Yang Hadir</label>
                    <input type="number" name="jemaat" class="form-control" value="{{$absensi->jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Non Jemaat Yang Hadir</label>
                    <input type="number" name="non_jemaat" class="form-control" value="{{$absensi->non_jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="number" name="persembahan" class="form-control" value="{{$absensi->persembahan}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="demo-button"><br>
                    <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                  </div>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 