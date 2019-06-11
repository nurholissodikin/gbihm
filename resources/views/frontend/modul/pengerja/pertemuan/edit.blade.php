  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pertemuan
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
               <h3 class="box-title">Edit Data Pertemuan</h3>
              </div>
              <br>
              <form  action="{{route('pertemuan.update',$pertemuan->id)}}" enctype="multipart/form-data" method="post">
               <input type="hidden" name="_method" value="PUT">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Pertemuan</label>
                    <input type="text" name="kode" class="form-control" value="{{$pertemuan->kode}}"  placeholder="Kode Pertemuan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" name="tanggal" placeholder="Tanggal" value="{{$pertemuan->tanggal}}" class="form-control datepicker">
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Pertemuan</label>
                    <input type="text" name="nama" class="form-control" value="{{$pertemuan->nama}}" placeholder="Nama Pertemuan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" name="tempat" class="form-control" value="{{$pertemuan->tempat}}"  placeholder="Tempat">
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