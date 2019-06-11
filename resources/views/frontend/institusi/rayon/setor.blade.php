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
              <h3 class="box-title">Setor Saldo</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('saldo.store')}}" enctype="multipart/form-data" method="post">
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
                     <h3 class="box-title">Setor Saldo</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Rayon</label>
                          <select class="form-control select2" name="idrayon" style="width: 100%;">
                            <option value="">-- Pilih Rayon --</option>
                            @foreach ($rayon as $key => $value)
                            <option value="{{$value->idrayon}}" >{{ $value->namarayon }}</option>
                            @endforeach
                          </select>
                         </div>
                        </div>
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
                          <input type="file" name="dokrayon" class="form-control">
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
