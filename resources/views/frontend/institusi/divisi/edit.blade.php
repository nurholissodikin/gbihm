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
              <form action="{{route('divisi.update',$divisi->iddivisi)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="box-header with-border">
                 <h3 class="box-title">Edit Data Divisi - <b>{{$divisi->namadivisi}}</b></h3>
                </div>
                <br>
                <div class="col-md-12">
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Kode Divisi</label>
                    <input type="text" name="kodediv" class="form-control" placeholder="Kode Divisi" value="{{$divisi->kodedivisi}}" required="">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Nama Divisi</label>
                     <input type="text" name="namadiv" class="form-control" value="{{$divisi->namadivisi}}" placeholder="Nama Divisi">
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                    <label>Pemimpin</label>
                    <select class="form-control select2" name="pemimpin" style="width: 100%;">
                      <option value="">-- Pilih Pemimpin --</option>
                      @foreach ($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo ($divisi->pemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
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
                      <option value="{{$data->idpersonal}}" <?php echo ($divisi->wakilpemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
                     @endforeach
                    </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                   <div class="form-group">
                     <label>Jenis Divisi</label>
                     <select class="form-control select2" name="jenisdivisi" style="width: 100%;">
                      <option value="">-- Jenis Divisi --</option>
                      <option value="Cabang" <?php echo ($divisi->jenisdivisi == 'Cabang') ? "selected": "" ?>>Cabang</option>
                      <option value="Cabang Otonom" <?php echo ($divisi->jenisdivisi == 'Cabang Otonom') ? "selected": "" ?>>Cabang Otonom</option>
                      <option value="Cabang Otonom DKI" <?php echo ($divisi->jenisdivisi == 'Cabang Otonom DKI') ? "selected": "" ?>>Cabang Otonom DKI</option>
                      <option value="Gereja Induk" <?php echo ($divisi->jenisdivisi == 'Gereja Induk') ? "selected": "" ?>>Gereja Induk</option>
                      <option value="Gereja Induk Rayon" <?php echo ($divisi->jenisdivisi == 'Gereja Induk Rayon') ? "selected": "" ?>>Gereja Induk Rayon</option>
                      <option value="Gereja Induk Sub Rayon" <?php echo ($divisi->jenisdivisi == 'Gereja Induk Sub Rayon') ? "selected": "" ?>>Gereja Induk Sub Rayon</option>
                      <option value="Jemaat Induk" <?php echo ($divisi->jenisdivisi == 'Jemaat Induk') ? "selected": "" ?>>Jemaat Induk</option>
                      <option value="Pra Ranting" <?php echo ($divisi->jenisdivisi == 'Pra Ranting') ? "selected": "" ?>>Pra Ranting</option>
                      <option value="Ranting" <?php echo ($divisi->jenisdivisi == 'Ranting') ? "selected": "" ?>>Ranting</option>
                      <option value="Rayon" <?php echo ($divisi->jenisdivisi == 'Rayon') ? "selected": "" ?>>Rayon</option>
                      <option value="Sekretariat Cabang Otonom" <?php echo ($divisi->jenisdivisi == 'Sekretariat Cabang Otonom') ? "selected": "" ?>>Sekretariat Cabang Otonom</option>
                      <option value="Sekretariat Misi" <?php echo ($divisi->jenisdivisi == 'Sekretariat Misi') ? "selected": "" ?>>Sekretariat Misi</option>
                      <option value="Sekretariat Pemuda Remaja" <?php echo ($divisi->jenisdivisi == 'Sekretariat Pemuda Remaja') ? "selected": "" ?>>Sekretariat Pemuda Remaja</option>
                      <option value="Sekretariat Pengajaran" <?php echo ($divisi->jenisdivisi == 'Sekretariat Pengajaran') ? "selected": "" ?>>Sekretariat Pengajaran</option>
                      <option value="Sekretariat Pusat" <?php echo ($divisi->jenisdivisi == 'Sekretariat Pusat') ? "selected": "" ?>>Sekretariat Pusat</option>
                      <option value="Sekretariat Rayon" <?php echo ($divisi->jenisdivisi == 'Sekretariat Rayon') ? "selected": "" ?>>Sekretariat Rayon</option>
                     </select>
                   </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">
                        <?php echo ($divisi->alamat ); ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rt</label>
                      <input type="number" name="rtrw[]" class="form-control" placeholder="Rt" value="{{$divisi->rtrw[0]}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rw</label>
                      <input type="number" name="rtrw[]" class="form-control" placeholder="Rw" value="{{$divisi->rtrw[1]}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Provinsi ===</option>
                         @foreach ($provinces as $key => $value)
                          <option value="{{$value->id}}" @if($value->id == $divisi->provinsi) selected  @endif>{{ $value->name }}</option>
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
                          $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($divisi->provinsi);
                        @endphp
                        @foreach($kabupaten as $data)
                         <option value="{{$data->id}}" @if($data->id == $divisi->kota) selected  @endif> {{ $data->name }}</option>
                            
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
                          $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($divisi->kota);
                        @endphp
                        @foreach($kecamatan as $data)
                          @if($data->id == $divisi->kecamatan)
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
                          $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($divisi->kecamatan);
                        @endphp
                        @foreach($kelurahan as $data)
                          @if($data->id == $divisi->kelurahan)
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
                      <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos"value="{{$divisi->kodepos}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Negara</label>
                      <input type="text" name="negara" class="form-control" placeholder="Negara"value="{{$divisi->negara}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Google Map Address</label>
                      <input type="text" name="google" class="form-control" placeholder="Google Map Address" value="{{$divisi->googlemap}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Latitude</label>
                      <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$divisi->latitude}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Longitude</label>
                      <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$divisi->longitude}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$divisi->notelepon}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Fax</label>
                      <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{$divisi->fax}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{$divisi->email}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Ref</label>
                      <input type="text" name="noref" class="form-control" placeholder="No. Ref" value="{{$divisi->noref}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$divisi->keterangan}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" <?php echo ($divisi->status == 'Aktif') ? "selected": "" ?>>Aktif</option>

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
