@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Institusi Non Struktural
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Divisi</h3>
            </div>
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Setor Saldo Divisi - <b>{{$divisi->namadivisi}}</b></h3>
              </div>
              <br>
              <form  action="{{url('/saldostore')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <div class="col-md-12"> 
                <input type="hidden" name="iddivisi" value="{{$divisi->iddivisi}}">
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Tanggal Transfer</label>
                     <div class="input-group date">
                      <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tatra" class="form-control" placeholder="Tanggal Transfer" id="datepicker4">
                    </div>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Rekening Asal</label>
                    <select class="form-control select2" name="rekas" style="width: 100%;">
                      <option value="">-- Pilih Bank --</option>
                      @foreach ($bank as $key => $value)
                      <option value="{{$value->idbank}}" >{{ $value->namabank }}</option>
                      @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Rekening Tujuan</label>
                    <select class="form-control select2" name="rektu" style="width: 100%;">
                      <option value="">-- Pilih Bank --</option>
                      @foreach ($bank as $key => $value)
                      <option value="{{$value->idbank}}" >{{ $value->namabank }}</option>
                      @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Kode Transfer</label>
                    <input type="text" name="kodetr" class="form-control" placeholder="Kode Transfer">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Jumlah Transfer</label>
                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Transfer">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Berita</label>
                    <textarea class="form-control" rows="3" name="berita" placeholder="Berita"></textarea>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Upload Dokumen</label>
                    <input type="file" name="dokdivisi" class="form-control">
                   </div>
                  </div>
                  <div class="demo-button">
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
