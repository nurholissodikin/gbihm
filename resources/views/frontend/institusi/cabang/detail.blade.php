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
              <h3 class="box-title">Data Cabang</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                 <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Detail Data Cabang</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Wilayah</label>
                           <input type="text" name="wilayah" class="form-control" value="{{$cabang->wilayah}}" readonly="">
                         </div>
                        </div> 
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Rayon</label>
                          <input type="tetx" name="idrayon" class="form-control" value="{{$cabang->rayon['namarayon']}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Sub Rayon</label>
                          <input type="tetx" name="idsubrayon" class="form-control" value="{{$cabang->subrayon['namasubrayon']}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Cabang</label>
                            <input type="text" name="kode" class="form-control" required="" value="{{$cabang->kodecabang}}" readonly="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Cabang</label>
                            <input type="text" name="nama" class="form-control" required="" value="{{$cabang->namacabang}}" readonly="">
                          </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Pemimpin</label>
                          <input type="text" name="pemimpin" class="form-control" value="{{$cabang->personal['namalengkap']}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Wakil Pemimpin</label>
                          <input type="text" name="wakilpemimpin" class="form-control" value="{{$cabang->personala['namalengkap']}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Jenis Sub Rayon</label>
                           <input type="tetx" name="jeniss" class="form-control" value="{{$cabang->jeniscabang}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat Sekretariat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" readonly="">
                              <?php echo($cabang->alamat) ?>
                            </textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rt</label>
                            <input type="text" name="rt" class="form-control"  value="{{$cabang->rt[0]}}" readonly="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rw</label>
                            <input type="text" name="rw" class="form-control" value="{{$cabang->rt[1]}}" readonly="">
                          </div>
                        </div>
                       <div class="col-md-12">
                        <div class="form-group">
                          <label>Provinsi</label>
                          <input type="text" name="provinces" class="form-control" value="{{$cabang->provinsia['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kabupaten/Kota </label>
                          <input type="text" name="regencies" class="form-control" value="{{$cabang->kabkotaa['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kecamatan</label>
                          <input type="text" name="districts" class="form-control" value="{{$cabang->kecamatana['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kelurahan</label>
                          <input type="text" name="villages" class="form-control" value="{{$cabang->kelurahana['name']}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kode Pos</label>
                          <input type="text" name="kodepos" class="form-control" value="{{$cabang->kodepos}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Negara</label>
                          <input type="text" name="negara" class="form-control" value="{{$cabang->negara}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Google Map Address</label>
                          <input type="text" name="google" class="form-control"  value="{{$cabang->googlemap}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Latitude</label>
                          <input type="text" name="latitude" class="form-control" value="{{$cabang->latitude}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Longitude</label>
                          <input type="text" name="longitude" class="form-control"  value="{{$cabang->longitude}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. Telepon</label>
                          <input type="number" name="notelp" class="form-control" Telepon" value="{{$cabang->notelepon}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Fax</label>
                          <input type="text" name="fax" class="form-control" value="{{$cabang->fax}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" value="{{$cabang->email}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. Ref</label>
                          <input type="text" name="noref" class="form-control" value="{{$cabang->noref}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" name="keterangan" class="form-control" value="{{$cabang->keterangan}}" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Status</label>
                          <input type="text" name="status" value="{{$cabang->active}}" class="form-control" readonly="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Perjamuan Kudus</label>
                           <input type="text" name="perjamuan" class="form-control" value="{{$cabang->perjamuan}}" readonly="">
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
        </div>
      </div>
    </section>
  </div>
@endsection
