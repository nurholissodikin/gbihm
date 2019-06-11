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
              <h3 class="box-title">Data Sub Rayon</h3>
            </div>
            <div class="box-body">
              <form action="{{route('subrayon.update',$subrayon->idsubrayon)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <div class="box-header with-border">
                 <h3 class="box-title">Edit Data Sub Rayon</h3>
                </div>
                <br>
                <div class="col-md-12">
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Wilayah</label>
                     <select class="form-control select2" name="wilayah" style="width: 100%;">
                      <option value="">-- Pilih Wilayah --</option>
                      <option value="PUSAT" <?php echo ($subrayon->wilayah == 'PUSAT') ? "selected": "" ?>>PUSAT</option>
                      <option value="DKI" <?php echo ($subrayon->wilayah == 'DKI') ? "selected": "" ?>>DKI</option>
                      <option value="BODETABEK" <?php echo ($subrayon->wilayah == 'BODETABEK') ? "selected": "" ?>>BODETABEK</option>
                      <option value="NON JABODETABEK" <?php echo ($subrayon->wilayah == 'NON JABODETABEK') ? "selected": "" ?>>NON JABODETABEK</option>
                      <option value="LUAR NEGERI" <?php echo ($subrayon->wilayah == 'LUAR NEGERI') ? "selected": "" ?>>LUAR NEGERI</option>
                      <option value="CK" <?php echo ($subrayon->wilayah == 'CK') ? "selected": "" ?>>CK</option>
                      <option value="TRANSISI" <?php echo ($subrayon->wilayah == 'TRANSISI') ? "selected": "" ?>>TRANSISI</option>
                      <option value="SISTER CHURCH" <?php echo ($subrayon->wilayah == 'SISTER CHURCH') ? "selected": "" ?>>SISTER CHURCH</option>
                     </select>
                   </div>
                  </div> 
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="idrayon" style="width: 100%;">
                      <option value="">-- Pilih Rayon --</option>
                      @foreach ($rayon as $data)
                      <option value="{{$data->idrayon}}" <?php echo ($subrayon->idrayon == $data->idrayon) ? "selected": "" ?>>{{ $data->namarayon }}</option>
                      @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Kode Sub Rayon</label>
                    <input type="text" name="kodes" class="form-control" placeholder="Kode Sub Rayon" value="{{$subrayon->kodesubrayon}}">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Nama Sub Rayon</label>
                     <input type="text" name="namas" class="form-control" placeholder="Nama Sub Rayon" value="{{$subrayon->namasubrayon}}">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Pemimpin</label>
                    <select class="form-control select2" name="pemimpin" style="width: 100%;">
                      <option value="">-- Pilih Pemimpin --</option>
                      @foreach ($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo ($subrayon->pemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
                      @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Wakil Pemimpin</label>
                    <select class="form-control select2" name="wakilpemimpin" style="width: 100%;">
                      <option value="">-- Pilih Wakil Pemimpin --</option>
                      @foreach ($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo ($subrayon->wakilpemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
                     @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Jenis Sub Rayon</label>
                     <select class="form-control select2" name="jeniss" style="width: 100%;">
                      <option value="">-- Jenis Sub Rayon --</option>
                      <option value="Cabang" <?php echo ($subrayon->jenissubrayon == 'Cabang') ? "selected": "" ?>>Cabang</option>
                      <option value="Cabang Otonom" <?php echo ($subrayon->jenissubrayon == 'Cabang Otonom') ? "selected": "" ?>>Cabang Otonom</option>
                      <option value="Cabang Otonom DKI" <?php echo ($subrayon->jenissubrayon == 'Cabang Otonom DKI') ? "selected": "" ?>>Cabang Otonom DKI</option>
                      <option value="Gereja Induk" <?php echo ($subrayon->jenissubrayon == 'Gereja Induk') ? "selected": "" ?>>Gereja Induk</option>
                      <option value="Gereja Induk Rayon" <?php echo ($subrayon->jenissubrayon == 'Gereja Induk Rayon') ? "selected": "" ?>>Gereja Induk Rayon</option>
                      <option value="Gereja Induk Sub Rayon" <?php echo ($subrayon->jenissubrayon == 'Gereja Induk Sub Rayon') ? "selected": "" ?>>Gereja Induk Sub Rayon</option>
                      <option value="Jemaat Induk" <?php echo ($subrayon->jenissubrayon == 'Jemaat Induk') ? "selected": "" ?>>Jemaat Induk</option>
                      <option value="Pra Ranting" <?php echo ($subrayon->jenissubrayon == 'Pra Ranting') ? "selected": "" ?>>Pra Ranting</option>
                      <option value="Ranting" <?php echo ($subrayon->jenissubrayon == 'Ranting') ? "selected": "" ?>>Ranting</option>
                      <option value="Rayon" <?php echo ($subrayon->jenissubrayon == 'Rayon') ? "selected": "" ?>>Rayon</option>
                      <option value="Sekretariat Cabang Otonom" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Cabang Otonom') ? "selected": "" ?>>Sekretariat Cabang Otonom</option>
                      <option value="Sekretariat Misi" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Misi') ? "selected": "" ?>>Sekretariat Misi</option>
                      <option value="Sekretariat Pemuda Remaja" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Pemuda Remaja') ? "selected": "" ?>>Sekretariat Pemuda Remaja</option>
                      <option value="Sekretariat Pengajaran" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Pengajaran') ? "selected": "" ?>>Sekretariat Pengajaran</option>
                      <option value="Sekretariat Pusat" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Pusat') ? "selected": "" ?>>Sekretariat Pusat</option>
                      <option value="Sekretariat Rayon" <?php echo ($subrayon->jenissubrayon == 'Sekretariat Rayon') ? "selected": "" ?>>Sekretariat Rayon</option>
                     </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">
                        <?php echo ($subrayon->alamat ); ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rt</label>
                      <input type="number" name="rtrw[]" class="form-control" placeholder="Rt" value="{{$subrayon->rtrw[0]}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rw</label>
                      <input type="number" name="rtrw[]" class="form-control" placeholder="Rw" value="{{$subrayon->rtrw[1]}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                        <option value="0" disable="true">=== Pilih Provinsi ===</option>
                         @foreach ($provinces as $key => $value)
                          <option value="{{$value->id}}" @if($value->id == $subrayon->provinsi) selected  @endif>{{ $value->name }}</option>
                         @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten </label>
                      <select class="form-control select2" name="regencies" id="regencies" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kabupaten/Kota ===</option>
                        @php
                          $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($subrayon->provinsi);
                        @endphp
                        @foreach($kabupaten as $data)
                         <option value="{{$data->id}}" @if($data->id == $subrayon->kota) selected  @endif> {{ $data->name }}</option>
                            
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control select2" name="districts" id="districts" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kecamatan ===</option>
                        @php
                          $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($subrayon->kota);
                        @endphp
                        @foreach($kecamatan as $data)
                          @if($data->id == $subrayon->kecamatan)
                            <option value="{{$data->id}}" selected>{{$data->name}}</option>
                          @else
                            <option value="{{$data->id}}">{{$data->name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select class="form-control select2" name="villages" id="villages" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kelurahan ===</option>
                        @php
                          $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($subrayon->kecamatan);
                        @endphp
                        @foreach($kelurahan as $data)
                          @if($data->id == $subrayon->kelurahan)
                            <option value="{{$data->id}}" selected>{{$data->name}}</option>
                          @else
                            <option value="{{$data->id}}">{{$data->name}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos"value="{{$subrayon->kodepos}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Negara</label>
                      <input type="text" name="negara" class="form-control" placeholder="Negara"value="{{$subrayon->negara}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Google Map Address</label>
                      <input type="text" name="google" class="form-control" placeholder="Google Map Address" value="{{$subrayon->googlemap}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Latitude</label>
                      <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$subrayon->latitude}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$subrayon->longitude}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$subrayon->notelepon}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Fax</label>
                      <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{$subrayon->fax}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{$subrayon->email}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Ref</label>
                      <input type="text" name="noref" class="form-control" placeholder="No. Ref" value="{{$subrayon->noref}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$subrayon->keterangan}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" <?php echo ($subrayon->active == 'Aktif') ? "selected": "" ?>>Aktif</option>

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
      </div>
    </section>

  </div>


@endsection
