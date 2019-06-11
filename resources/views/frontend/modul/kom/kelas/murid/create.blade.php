@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Murid KOM
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
          <div class="box box-default">
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Murid KOM</h3>
              </div>
              <br>
              <form  action="{{url('kelasmurid/store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="created" value="{{Auth::user()->id}}">
                <input type="hidden" name="idkelaskom" value="{{$kelas->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <div class="input-group date">
                      <select class="form-control select2" name="idpersonal" style="width: 100%;" >
                        <option value="">-- Pilih Personal --</option>
                        @foreach($personal as $data)
                        <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                        @endforeach
                      </select>
                      <div class="input-group-addon">
                        <a href="{{url('/create')}}" target="_blank" class="btn btn-primary pull-right btn-xs" ><i class="fa fa-plus"> Personal</i></a>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                     <label>Status</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="status" class="minimal" value="Aktif">Aktif
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status" class="minimal" value="Non Aktif">
                      Non Aktif
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                     <label>Status</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Selam">Selam
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Percik">
                      Percik
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Belum Baptis">
                      Belum Baptis
                      <br>
                    </label>
                  </div>
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 