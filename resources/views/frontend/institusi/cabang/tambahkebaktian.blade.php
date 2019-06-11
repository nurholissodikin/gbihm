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
              <h3 class="box-title">Data Kebaktian</h3>
            </div>
            <div class="box-body">
              <form  action="{{url('/tambahkebaktian')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="idcabangranting" value="{{$cabang->idcabangranting}}">
                <input type="hidden" name="idrayon" value="{{$cabang->idrayon}}">
                <input type="hidden" name="idsubrayon" value="{{$cabang->idsubrayon}}">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                 <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Tambah Data Kebaktian</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kode Kebaktian</label>
                          <input type="text" name="kode" class="form-control" placeholder="Kode Kebaktian">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Kebaktian</label>
                          <input type="text" name="nama" class="form-control" placeholder="Nama Kebaktian">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori Kebaktian</label>
                          <select name="kategori" class="form-control select2" style="width: 100%;">
                            <option value="" disable="true" selected="true">=== Pilih Kategori ===</option>
                            <option value="Ibadah Raya">Ibadah Raya</option>
                            <option value="Sekolah Minggu">Sekolah Minggu</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Jam Mulai Kebaktian</label>
                          <input type="time" name="jam" class="form-control" placeholder="Nama Kebaktian">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat Kebaktian</label>
                          <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rt</label>
                          <input type="number" name="rtrw[]" class="form-control" placeholder="Rt">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rw</label>
                          <input type="number" name="rtrw[]" class="form-control" placeholder="Rw">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Provinsi</label>
                          <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                            <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                             @foreach ($provinces as $key => $value)
                            <option value="{{$value->id}}">{{ $value->name }}</option>
                             @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kabupaten/Kota</label>
                          <select class="form-control select2" name="regencies" id="regencies" style="width: 100%;">
                            <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <select class="form-control select2" name="districts" id="districts" style="width: 100%;">
                            <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kelurahan</label>
                          <select class="form-control select2" name="villages" id="villages" style="width: 100%;">
                            <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kode Pos</label>
                          <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Tempat/Ruang</label>
                          <input type="text" name="tempat" class="form-control" placeholder="Tempat / Ruang">
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label>Kordinator</label>
                          <select class="form-control select2" name="kordinator" style="width: 100%;">
                            <option value="">-- Pilih Kordinator --</option>
                            @foreach ($personal as $key => $value)
                            <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Negara</label>
                          <input type="text" name="negara" class="form-control" placeholder="Negara">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. Telepon</label>
                          <input type="number" name="notelp" class="form-control" placeholder="No. Telepon">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Fax</label>
                          <input type="text" name="fax" class="form-control" placeholder="Fax">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email">
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
                          <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control select2" name="status" style="width: 100%;">
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
