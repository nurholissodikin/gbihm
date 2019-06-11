@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
       Kehadiran Ibadah Raya - <b>{{$ibadahraya->nama_ibadah}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <form action="{{url('kehadiranibadah/update',$kehadiran->id)}}" method="post">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="ibadahraya" value="{{ $ibadahraya->id }}">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data {{$ibadahraya->nama_ibadah}}</h3>
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
                          $a = date('l,d F Y', strtotime($ibadahraya->tanggal));
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
                        <label>: &nbsp; <b><span class="pero">{{$ibadahraya->tempat}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Kordinator</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$ibadahraya->personal['namalengkap']}}</span></b></label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data Ibadah Raya : {{$ibadahraya->nama_ibadah}}</h3>
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
                <h3 class="box-title ">Data Sekolah Minggu : {{$ibadahraya->nama_ibadah}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>SM Type</label>
                    <input type="number" name="smtype" value="{{$kehadiran->sm_type}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Guru SM</label>
                    <input type="number" name="gurusm" value="{{$kehadiran->guru_sm}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ast. Guru SM</label>
                    <input type="number" name="astgurusm" value="{{$kehadiran->ast_gurusm}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Batita</label>
                    <input type="number" name="batita" value="{{$kehadiran->batita}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Balita</label>
                    <input type="number" name="balita" value="{{$kehadiran->balita}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><br><br><br></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Pratama</label>
                    <input type="number" name="pratama" value="{{$kehadiran->pratama}}"class="form-control">
                  </div>
                </div>              
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Guru Pembina</label>
                    <input type="number" name="gurupembina" value="{{$kehadiran->guru_pembina}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Madya Tunas/JC</label>
                    <input type="number" name="madya" value="{{$kehadiran->madya}}"class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Lainnya</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Penyerahan Anak</label>
                    <input type="number" name="penyerahan" value="{{$kehadiran->pe_anak}}"class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jemaat Baru</label>
                    <input type="number" name="jemaat" value="{{$kehadiran->jemaat}}"class="form-control">
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
                    <textarea  class="form-control" name="catatan" rows="3">{{$kehadiran->catatan}}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
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
                    <textarea  class="form-control" name="tema" rows="3">{{$kehadiran->tema}}</textarea>
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