@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Tambah Mutasi Komisi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">personal</a></li>
        <li class="active">pelayan</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form  action="{{route('komisi.storea')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}

           <!--  <input type="hidden" name="idpersonal" value="{{$personal['idpersonal']}}"> -->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Pelayanan</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Personal</label>
                        <input type="text" name="idpersonal" class="form-control" value="{{$personal->idpersonal}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{$personal->namalengkap}}" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Rayon</label>
                         <select class="form-control select2" name="rayon" id="rayon" style="width: 100%;">
                          <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                            @foreach ($rayon as $key => $value)
                          <option value="{{$value->idrayon}}">{{ $value->namarayon }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Sub Rayon</label>
                         <select class="form-control select2" name="subrayon" id="subrayon" style="width: 100%;">
                          <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Cabang</label>
                         <select class="form-control select2" name="cabang" id="cabang" style="width: 100%;">
                         <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Catatan/Keterangan</label>
                        <textarea class="form-control" rows="3" name="keterangan" placeholder="Catatan/Keterangan"></textarea>
                      </div>
                    </div>
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                    </div>               
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection