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
        <div class="col-md-12">
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Dokumen Pernikahan</h3>
              </div>
              <br>
              <form  action="{{route('dokumenpernikahan.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Dokumen</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Dokumen">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Dokumen</label>
                    <input type="file" name="dokumen" class="form-control" placeholder="Dokumen">
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