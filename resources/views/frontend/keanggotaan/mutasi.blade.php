@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Tambah Mutasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">personal</a></li>
        <li class="active">keanggotaan</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form  action="{{route('keanggotaan.store')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}

           <!--  <input type="hidden" name="idpersonal" value="{{$personal['idpersonal']}}"> -->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Keanggotaan</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="idpersonal" class="form-control" placeholder="Gereja Asal" value="{{$personal->idpersonal}}">
                    <input type="hidden" name="gereja" class="form-control" placeholder="Gereja Asal" value="{{$personal->gerejaasal}}">
                    <input type="hidden" name="berjemaat" class="form-control pull-right" placeholder="Mulai Berjemaat" value="{{$personal->mulaiberjemaat}}">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kompetensi</label>
                        <select class="form-control select2" name="kompetensi" style="width: 100%;">
                          <option value="">-- Pilih Kompetensi --</option>
                          @foreach($kompetensi as $data)
                          <option value="{{$data->idkompetensi}}">{{$data->kompetensi}}</option>
                          @endforeach
                        </select>
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
                        <label>Status Keaggotaan</label>
                        <select class="form-control select2" name="stke" style="width: 100%;">
                          <option value="">-- Pilih Status Keaggotaan --</option>
                          <option value="Pindah/Mutasi">Pindah/Mutasi</option>
                          <option value="Out">Out</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tala" class="form-control pull-right" placeholder="Tanggal" id="datepicker7">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alasan Pindah</label>
                        <textarea class="form-control" rows="3" name="alasan" placeholder="Alasan Pindah"></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dokumen</label>
                        <input type="file" name="dokke" class="form-control">
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