@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
       Kehadiran Kegiatan - <b>{{$kegiatan->nama_kegiatan}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
              <h3 class="box-title ">Data {{$kegiatan->nama_kegiatan}}</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Hari/Tanggal</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                       @php
                        $a = date('l,d F Y', strtotime($kegiatan->tanggal));
                        @endphp
                        <label>: &nbsp; <b><span class="pero">{{$a}}</span></b></label>  
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat/Ruangan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$kegiatan->tempat}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kordinator</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$kegiatan->personal['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <form action="{{url('kehadirankegiatan/update',$kehadiran->id)}}" method="post">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="kegiatan" value="{{ $kegiatan->id }}">
          <div class="col-xs-6">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data {{$kegiatan->nama_kegiatan}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Dewasa</label>
                      <input type="number" name="dewasa" value="{{$kehadiran->dewasa}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Diaken</label>
                      <input type="number" name="diaken" value="{{$kehadiran->diaken}}"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Diakonis</label>
                      <input type="number" name="diakonis" value="{{$kehadiran->diakonis}}"class="form-control">
                    </div>
                  </div>           
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pengerja</label>
                      <input type="number" name="pengerja" value="{{$kehadiran->pengerja}}"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>WL</label>
                      <input type="number" name="wl" value="{{$kehadiran->wl}}"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Singer</label>
                      <input type="number" name="singer" value="{{$kehadiran->singer}}"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pemusik</label>
                      <input type="number" name="pemusik" value="{{$kehadiran->pemusik}}"class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pendoa</label>
                      <input type="number" name="pendoa" value="{{$kehadiran->pendoa}}"class="form-control">
                    </div>
                  </div><div class="col-md-6">
                    <div class="form-group">
                      <label>Aktivis</label>
                      <input type="number" name="aktivis" value="{{$kehadiran->aktivis}}"class="form-control">
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Catatan</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="catatan" rows="6">{{$kehadiran->catatan}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Tema Khotbah</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="tema" rows="6">{{$kehadiran->tema}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="demo-button">
              <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
            </div>
          </div>
        </form>  
      </div>
    </section>
  </div>
  
@endsection