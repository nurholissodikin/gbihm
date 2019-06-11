@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Tambah Pleayanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">personal</a></li>
        <li class="active">pelayanan rohani Insert</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form  action="{{route('pelayanan.store')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="idpersonal" value="{{$personal['idpersonal']}}">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Pelayanan</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>No. Sertifikat SOM/KOM Terakhir</label>
                        <input type="text" name="nosertifikat" class="form-control" required="" placeholder="No. Sertifikat SOM/KOM Terakhir">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tanggal" class="form-control pull-right" placeholder="Tanggal" id="datepicker6">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Melayani Sejak</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="sejak" class="form-control " placeholder="Melayani Sejak" id="datepicker5">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dokumen</label>
                        <input type="file" name="dokumen" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Jenis Badge</label>
                        <select class="form-control select2" name="jenis" style="width: 100%;">
                          <option value="">== Pilih Jenis Badge ==</option>
                          <option value="Hitam">Hitam</option>
                          <option value="Kuning">Kuning</option>
                          <option value="Tamu">Tamu</option>
                          <option value="Anak Anggota CT 20">Anak Anggota CT 20</option>
                        </select>
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