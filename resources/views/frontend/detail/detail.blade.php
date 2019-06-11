@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#informasi" data-toggle="tab">Informasi Umum</a></li>
                                <li role="presentation"><a href="#kontak" data-toggle="tab">Kontak</a></li>            
                                <li role="presentation"><a href="#pendidikan" data-toggle="tab" disable >Pendidikan Pekerjaan</a></li>
                                <li role="presentation"><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
                                <li role="presentation"><a href="#anggota" data-toggle="tab">Keanggotaan</a></li>
                                <li role="presentation"><a href="#jemaat" data-toggle="tab">Pelayanan Jemaat</a></li>
                                <li role="presentation"><a href="#rohani" data-toggle="tab">Pelayanan Rohani</a></li>
                                <li role="presentation"><a href="#kegiatan" data-toggle="tab">Kegiatan</a></li>
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection