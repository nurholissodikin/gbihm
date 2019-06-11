@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Institusi Struktural
      </h1>
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
              <h3 class="box-title">Data Rayon</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('rayon.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation" class="active"><a href="#rayon" data-toggle="tab">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>
                 <li role="presentation"><a href="{{route('cabang.index')}}">Rayon</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="rayon"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Tambah Data Rayon</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wilayah</label>
                            <select class="form-control select2" name="wilayahr" style="width: 100%;">
                              <option value="">-- Pilih Wilayah --</option>
                              <option value="PUSAT">PUSAT</option>
                              <option value="DKI">DKI</option>
                              <option value="BODETABEK">BODETABEK</option>
                              <option value="NON JABODETABEK">NON JABODETABEK</option>
                              <option value="LUAR NEGERI">LUAR NEGERI</option>
                              <option value="CK">CK</option>
                              <option value="TRANSISI">TRANSISI</option>
                              <option value="SISTER CHURCH">SISTER CHURCH</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Rayon</label>
                            <input type="text" name="koder" class="form-control" placeholder="Kode Rayon">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Rayon</label>
                            <input type="text" name="namar" class="form-control" placeholder="Nama Rayon">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Pemimpin</label>
                            <select class="form-control select2" name="pemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $key => $value)
                              <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wakil Pemimpin</label>
                            <select class="form-control select2" name="wakilpemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $key => $value)
                              <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                             @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Ref</label>
                            <input type="text" name="noref" class="form-control" placeholder="No. Ref">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="ketr" class="form-control" placeholder="Keterangan">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="statusr" style="width: 100%;">
                              <option value="">-- Pilih Status --</option>
                              <option value="Aktif">Aktif</option>
                            </select>
                          </div>
                        </div>
                        <div class="demo-button">
                          <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                        </div>
                    </div>
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
