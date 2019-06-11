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
                <input type="hidden" name="idcabangranting" value="{{$kebaktian->idcabangranting}}">
                <input type="hidden" name="idrayon" value="{{$kebaktian->idrayon}}">
                <input type="hidden" name="idsubrayon" value="{{$kebaktian->idsubrayon}}">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                 <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Detail Data Kebaktian</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kode Kebaktian</label>
                          <input type="text" name="kode" class="form-control"  value="{{$kebaktian->kodekebaktian}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Kebaktian</label>
                          <input type="text" name="nama" class="form-control" value="{{$kebaktian->namakebaktian}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori Kebaktian</label>
                          <input type="text" name="kategori" class="form-control" value="{{$kebaktian->kategori}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Jam Mulai Kebaktian</label>
                          <input type="text" name="jam" class="form-control" value="{{$kebaktian->jam}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat Kebaktian</label>
                          <textarea class="form-control" rows="3" name="alamat" readonly><?php echo ($kebaktian->alamat ); ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rt</label>
                          <input type="number" name="rt" class="form-control" value="{{$kebaktian->rtrw[0]}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Rw</label>
                          <input type="number" name="rw" class="form-control" value="{{$kebaktian->rtrw[1]}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Provinsi</label>
                          <input type="text" name="provinces" class="form-control" value="{{$kebaktian->cabang->provinsia['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kabupaten/Kota </label>
                          <input type="text" name="regencies" class="form-control" value="{{$kebaktian->cabang->kabkotaa['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <input type="text" name="districts" class="form-control" value="{{$kebaktian->cabang->kecamatana['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kelurahan</label>
                          <input type="text" name="villages" class="form-control" value="{{$kebaktian->cabang->kelurahana['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kode Pos</label>
                          <input type="text" name="kodepos" class="form-control" value="{{$kebaktian->kodepos}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Tempat/Ruang</label>
                          <input type="text" name="tempat" class="form-control" value="{{$kebaktian->tempat}}" readonly>
                        </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label>Kordinator</label>
                          <input type="text" name="kordinator" class="form-control" value="{{$kebaktian->personal['namalengkap']}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Negara</label>
                          <input type="text" name="negara" class="form-control" value="{{$kebaktian->negara}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. Telepon</label>
                          <input type="number" name="notelp" class="form-control" value="{{$kebaktian->notelepon}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Fax</label>
                          <input type="text" name="fax" class="form-control" value="{{$kebaktian->fax}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="{{$kebaktian->email}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. Ref</label>
                          <input type="text" name="noref" class="form-control" value="{{$kebaktian->noref}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" name="keterangan" class="form-control" value="{{$kebaktian->keterangan}}" readonly>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" name="status" class="form-control" value="{{$kebaktian->status}}" readonly="">
                        </div>
                      </div>
                      <div class="demo-button">
                        <button type="submit" class="btn btn-block btn-primary  waves-effect" onClick="history.go(-1);">Kembali</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
