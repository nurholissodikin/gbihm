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
              <h3 class="box-title">Data SubRayon</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                  <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                  <li role="presentation" class="active"><a href="#subrayon" data-toggle="tab" >Sub Rayon</a></li>            
                  <li role="presentation"><a href="{{route('cabang.index')}}">Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="subrayon">
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Tambah Data SubRayon</h3>
                    </div>
                    <br>
                    <form  action="{{route('subrayon.store')}}" enctype="multipart/form-data" method="post">
                    {{csrf_field()}}
                      <div class="col-md-12">
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Wilayah</label>
                           <select class="form-control select2" name="wilayah" style="width: 100%;">
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
                          <label>Rayon</label>
                          <select class="form-control select2" name="idrayon" style="width: 100%;">
                            <option value="">-- Pilih Rayon --</option>
                            @foreach ($rayon as $data)
                            <option value="{{$data->idrayon}}" >{{ $data->namarayon }}</option>
                            @endforeach
                          </select>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Kode Sub Rayon</label>
                          <input type="text" name="kodes" class="form-control" placeholder="Kode Sub Rayon">
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Nama Sub Rayon</label>
                           <input type="text" name="namas" class="form-control" placeholder="Nama Sub Rayon">
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
                           <label>Jenis Sub Rayon</label>
                           <select class="form-control select2" name="jeniss" style="width: 100%;">
                            <option value="">-- Pilih Jenis Sub Rayon --</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Cabang Otonom">Cabang Otonom</option>
                            <option value="Cabang Otonom DKI">Cabang Otonom DKI</option>
                            <option value="Gereja Induk">Gereja Induk</option>
                            <option value="Gereja Induk Rayon">Gereja Induk Rayon</option>
                            <option value="Gereja Induk Sub Rayon">Gereja Induk Sub Rayon</option>
                            <option value="Jemaat Induk">Jemaat Induk</option>
                            <option value="Pra Ranting">Pra Ranting</option>
                            <option value="Ranting">Ranting</option>
                            <option value="Rayon">Rayon</option>
                            <option value="Sekretariat Cabang Otonom">Sekretariat Cabang Otonom</option>
                            <option value="Sekretariat Misi">Sekretariat Misi</option>
                            <option value="Sekretariat Pemuda Remaja">Sekretariat Pemuda Remaja</option>
                            <option value="Sekretariat Pengajaran">Sekretariat Pengajaran</option>
                            <option value="Sekretariat Pusat">Sekretariat Pusat</option>
                            <option value="Sekretariat Rayon">Sekretariat Rayon</option>
                           </select>
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat</label>
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
                            <label>Negara</label>
                            <input type="text" name="negara" class="form-control" placeholder="Negara">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Google Map Address</label>
                            <input type="text" name="google" class="form-control" placeholder="Google Map Address">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="Longitude">
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
                    </form> 
                  </div>
                </div>
            </div>
            <br>
            <div class="box-body">
              <div class="box box-default">
                <div class="box-header">
                 <h3 class="box-title">List SubRayon</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-hover" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Rayon</th>
                          <th>SubRayon</th>
                          <th>Pemimpin</th>
                          <th>Wakil Pemimpin</th>
                          <th>No. Ref</th>
                          <th>No. Telepon</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 0;?>
                        @foreach($subrayon as $data)
                        <?php $no++ ;?>
                        <tr>
                          <td>{{$no}}</td>
                          <td>{{$data->idrayon}}</td>
                          <td>{{$data->namasubrayon}}</td>
                          <td>{{$data->personal['namalengkap']}}</td>
                          <td>{{$data->personala['namalengkap']}}</td>
                          <td>{{$data->noref}}</td>
                          <td>{{$data->notelepon}}</td>
                          <td>{{$data->active}}</td>
                          <form action="{{route('subrayon.destroy',$data->idsubrayon)}}" method="post">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden">     
                            <td>
                              <a href="{{ url('subrayon/kegiatan/'.$data->idsubrayon)}}" type="submit" class="btn btn-xs btn-block-small bg-navy">Kegiatan</a>
                              <a href="{{ url('/subrayon/personal/'.$data->idsubrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-success"><span class="glyphicon glyphicon-user"></span></a>
                              <a href="{{ route('subrayon.show',$data->idsubrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-primary"><i class="fa fa-credit-card"></i></a>
                              <a href="{{ url('/subrayon/detail/'.$data->idsubrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ route('subrayon.edit',$data->idsubrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
                              <button type="submit" class="btn btn-xs btn-block-small btn-danger" onclick=" return confirm('Apakah anda yakin akan menghapus data ?');" ><i class="fa fa-remove"></i></button>
                              {{csrf_field()}}
                              </td>            
                            </form>      
                          </tr>
                          @endforeach 
                        </tbody>
                    </table>
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
