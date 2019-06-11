@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       COOL
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data COOL</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('cool.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{Auth::user()->id}}" name="created">
                <div class="col-md-12"> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tipe COOL</label>
                      <select class="form-control select2" name="tipecool" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Tipe COOL ===</option>
                        @foreach ($tipecool as $key => $value)
                        <option value="{{$value->id}}">{{ $value->tipecool }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Gembala</label>
                      <select class="form-control select2" name="gembala" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Personal ===</option>
                        @foreach ($personal as $key => $value)
                        <option value="{{$value->idpersonal}}">{{$value->idpersonal}} || {{ $value->namalengkap }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pengerja</label><br>
                      <input type="checkbox" name="pengerja" class="minimal" value="Pengerja"> Pengerja
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jabatan Gembala COOL</label>
                      <select class="form-control select2" name="jabatan" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Jabatan Gembala COOL ===</option>
                        <option value="Ka. Dept. COOL">Ka. Dept. COOL</option>
                        <option value="Tim Penggerak COOL">Tim Penggerak COOL</option>
                        <option value="Ka. Bid. COOL">Ka. Bid. COOL</option>
                        <option value="Koord. Wilayah COOL">Koord. Wilayah COOL</option>
                        <option value="Pemilik COOL">Pemilik COOL</option>
                        <option value="Gembala COOL (d/h COOLer)">Gembala COOL (d/h COOLer)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinsi" id="provinces" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                        @foreach ($provinsi as $key => $value)
                        <option value="{{$value->id}}">{{ $value->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten/Kota</label>
                      <select class="form-control select2" name="kabkota" id="regencies" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="number" name="kodepos" maxlength="5" class="form-control" placeholder="Kode Pos">
                    </div>
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
