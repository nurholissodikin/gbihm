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
               <h3 class="box-title">Edit Data Dokumen Peneguhan Nikah</h3>
              </div>
              <br>
             <!--  @php
              echo Acl::checkUrl();
              @endphp -->
              <form  action="{{route('dokumenpeneguhan.update',$dokumen->id)}}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Dokumen</label>
                    <input type="text" name="nama" class="form-control" value="{{$dokumen->nama}}" placeholder="Nama Dokumen">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Dokumen</label>
                    <div class="input-group date">
                      <input type="file" name="dokumen" class="form-control" placeholder="Dokumen">
                      <div class="input-group-addon">
                        <a href="{{asset('public/assets/modul/jemaat/peneguhan/dokumen/'.$dokumen->dokumen.'')}}" class="btn btn-xs bg-navy" target="_blank">{{$dokumen->dokumen}}</a>
                      </div>
                    </div>
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
