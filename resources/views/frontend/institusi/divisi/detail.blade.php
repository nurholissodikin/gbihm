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
                 <h3 class="box-title">Detail Data Divisi - <b>{{$divisi->namadivisi}}</b></h3>
                </div>
                <br>
                <div class="col-md-12">
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Kode Divisi</label>
                    <input type="text" name="kodediv" class="form-control" value="{{$divisi->kodedivisi}}" required="" readonly="">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Nama Divisi</label>
                     <input type="text" name="namadiv" class="form-control" value="{{$divisi->namadivisi}}" readonly="">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Pemimpin</label>
                    <input type="text" name="pemimpin" class="form-control" value="{{$divisi->personal['namalengkap']}}" readonly="">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Wakil Pemimpin</label>
                    <input type="text" name="wakilpemimpin" class="form-control" value="{{$divisi->personala['namalengkap']}}" readonly="">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Jenis Divisi</label>
                     <input type="text" name="jenisdivisi" class="form-control" value="{{$divisi->jenisdivisi}}" readonly="">
                   </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamat"  readonly="">
                        <?php echo ($divisi->alamat); ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rt</label>
                      <input type="text" name="rt" class="form-control" value="{{$divisi->rtrw[0]}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rw</label>
                      <input type="text" name="rw" class="form-control" value="{{$divisi->rtrw[1]}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <input type="text" name="provinces" class="form-control" value="{{$divisi->provinsia['name']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten/Kota </label>
                      <input type="text" name="regencies" class="form-control" value="{{$divisi->kabkotaa['name']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <input type="text" name="districts" class="form-control" value="{{$divisi->kecamatana['name']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <input type="text" name="villages" class="form-control" value="{{$divisi->kelurahana['name']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" class="form-control" value="{{$divisi->kodepos}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Negara</label>
                      <input type="text" name="negara" class="form-control" value="{{$divisi->negara}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Google Map Address</label>
                      <input type="text" name="google" class="form-control"  value="{{$divisi->googlemap}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Latitude</label>
                      <input type="text" name="latitude" class="form-control" value="{{$divisi->latitude}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" name="longitude" class="form-control" value="{{$divisi->longitude}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="number" name="notelp" class="form-control" value="{{$divisi->notelepon}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Fax</label>
                      <input type="text" name="fax" class="form-control" value="{{$divisi->fax}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{$divisi->email}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Ref</label>
                      <input type="text" name="noref" class="form-control" value="{{$divisi->noref}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" value="{{$divisi->keterangan}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status" value="{{$divisi->status}}" class="form-control" readonly="">
                    </div>
                  </div>

                  <div class="demo-button">
                   <button type="submit" class="btn btn-block btn-primary  waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button>
                  </div>
                </div> 
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>


@endsection
