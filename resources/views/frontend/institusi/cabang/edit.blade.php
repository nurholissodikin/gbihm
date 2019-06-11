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
              <form  action="{{route('cabang.update',$cabang->idcabangranting)}}" enctype="multipart/form-data" method="post" id="formcab">
               <input type="hidden" name="_method" value="PUT">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                 <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Edit Data Cabang</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wilayah</label>
                            <select class="form-control select2" name="wilayah" style="width: 100%;">
                              <option value="">-- Pilih Wilayah --</option>
                              <option value="PUSAT" <?php echo ($cabang->wilayah == 'PUSAT') ? "selected": "" ?>>PUSAT</option>
                              <option value="DKI" <?php echo ($cabang->wilayah == 'DKI') ? "selected": "" ?>>DKI</option>
                              <option value="BODETABEK" <?php echo ($cabang->wilayah == 'BODETABEK') ? "selected": "" ?>>BODETABEK</option>
                              <option value="NON JABODETABEK" <?php echo ($cabang->wilayah == 'NON JABODETABEK') ? "selected": "" ?>>NON JABODETABEK</option>
                              <option value="LUAR NEGERI" <?php echo ($cabang->wilayah == 'LUAR NEGERI') ? "selected": "" ?>>LUAR NEGERI</option>
                              <option value="CK" <?php echo ($cabang->wilayah == 'CK') ? "selected": "" ?>>CK</option>
                              <option value="TRANSISI" <?php echo ($cabang->wilayah == 'TRANSISI') ? "selected": "" ?>>TRANSISI</option>
                              <option value="SISTER CHURCH" <?php echo ($cabang->wilayah == 'SISTER CHURCH') ? "selected": "" ?>>SISTER CHURCH</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Rayon</label>
                             <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                              @foreach($rayon as $data)
                                @if($data->idrayon == $cabang->idrayon)
                                <option value="{{$data->idrayon}}" selected>{{$data->namarayon}}</option>
                                @else
                                <option value="{{$data->idrayon}}">{{$data->namarayon}}</option>
                                @endif  
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Sub Rayon</label>
                             <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                              @php
                                $subray = app()->make('App\Http\Controllers\CountryController')->fill_subrayon($cabang->idrayon);
                              @endphp
                              @foreach($subray as $data)
                                <option value="{{$data->idsubrayon}}" @if($data->idsubrayon == $cabang->idsubrayon) selected @endif> {{ $data->namasubrayon }}</option>  
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Cabang</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode Cabang" required="" value="{{$cabang->kodecabang}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Cabang</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Cabang" required="" value="{{$cabang->namacabang}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Pemimpin</label>
                            <select class="form-control select2" name="pemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $key => $value)
                              <option value="{{$value->idpersonal}}" <?php echo ($cabang->pemimpin == $value->idpersonal) ? "selected" :"" ?>>{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
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
                              <option value="{{$value->idpersonal}}" <?php echo ($cabang->wakilpemimpin == $value->idpersonal) ? "selected" :"" ?>>{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Jenis Cabang</label>
                           <select class="form-control select2" name="jeniscabang" style="width: 100%;">
                            <option value="">-- Jenis Cabang --</option>
                            <option value="Cabang" <?php echo ($cabang->jeniscabang == 'Cabang') ? "selected": "" ?>>Cabang</option>
                            <option value="Cabang Otonom" <?php echo ($cabang->jeniscabang == 'Cabang Otonom') ? "selected": "" ?>>Cabang Otonom</option>
                            <option value="Cabang Otonom DKI" <?php echo ($cabang->jeniscabang == 'Cabang Otonom DKI') ? "selected": "" ?>>Cabang Otonom DKI</option>
                            <option value="Gereja Induk" <?php echo ($cabang->jeniscabang == 'Gereja Induk') ? "selected": "" ?>>Gereja Induk</option>
                            <option value="Gereja Induk Rayon" <?php echo ($cabang->jeniscabang == 'Gereja Induk Rayon') ? "selected": "" ?>>Gereja Induk Rayon</option>
                            <option value="Gereja Induk Sub Rayon" <?php echo ($cabang->jeniscabang == 'Gereja Induk Sub Rayon') ? "selected": "" ?>>Gereja Induk Sub Rayon</option>
                            <option value="Jemaat Induk" <?php echo ($cabang->jeniscabang == 'Jemaat Induk') ? "selected": "" ?>>Jemaat Induk</option>
                            <option value="Pra Ranting" <?php echo ($cabang->jeniscabang == 'Pra Ranting') ? "selected": "" ?>>Pra Ranting</option>
                            <option value="Ranting" <?php echo ($cabang->jeniscabang == 'Ranting') ? "selected": "" ?>>Ranting</option>
                            <option value="Rayon" <?php echo ($cabang->jeniscabang == 'Rayon') ? "selected": "" ?>>Rayon</option>
                            <option value="Sekretariat Cabang Otonom" <?php echo ($cabang->jeniscabang == 'Sekretariat Cabang Otonom') ? "selected": "" ?>>Sekretariat Cabang Otonom</option>
                            <option value="Sekretariat Misi" <?php echo ($cabang->jeniscabang == 'Sekretariat Misi') ? "selected": "" ?>>Sekretariat Misi</option>
                            <option value="Sekretariat Pemuda Remaja" <?php echo ($cabang->jeniscabang == 'Sekretariat Pemuda Remaja') ? "selected": "" ?>>Sekretariat Pemuda Remaja</option>
                            <option value="Sekretariat Pengajaran" <?php echo ($cabang->jeniscabang == 'Sekretariat Pengajaran') ? "selected": "" ?>>Sekretariat Pengajaran</option>
                            <option value="Sekretariat Pusat" <?php echo ($cabang->jeniscabang == 'Sekretariat Pusat') ? "selected": "" ?>>Sekretariat Pusat</option>
                            <option value="Sekretariat Rayon" <?php echo ($cabang->jeniscabang == 'Sekretariat Rayon') ? "selected": "" ?>>Sekretariat Rayon</option>
                           </select>
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat Sekretariat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">
                              <?php echo($cabang->alamat) ?>
                            </textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rt</label>
                            <input type="number" name="rtrw[]" class="form-control" placeholder="Rt" value="{{$cabang->rt[0]}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rw</label>
                            <input type="number" name="rtrw[]" class="form-control" placeholder="Rw" value="{{$cabang->rt[1]}}">
                          </div>
                        </div>
                       <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                        <option value="0" disable="true">=== Pilih Provinsi ===</option>
                         @foreach ($provinces as $key => $value)
                          <option value="{{$value->id}}" @if($value->id == $cabang->provinsi) selected  @endif>{{ $value->name }}</option>
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
                          $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($cabang->provinsi);
                        @endphp
                        @foreach($kabupaten as $data)
                         <option value="{{$data->id}}" @if($data->id == $cabang->kota) selected  @endif> {{ $data->name }}</option>
                            
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
                          $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($cabang->kota);
                        @endphp
                        @foreach($kecamatan as $data)
                          @if($data->id == $cabang->kecamatan)
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
                          $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($cabang->kecamatan);
                        @endphp
                        @foreach($kelurahan as $data)
                          @if($data->id == $cabang->kelurahan)
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
                            <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="{{$cabang->kodepos}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Negara</label>
                            <input type="text" name="negara" class="form-control" placeholder="Negara" value="{{$cabang->negara}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Google Map Address</label>
                            <input type="text" name="google" class="form-control" placeholder="Google Map Address" value="{{$cabang->googlemap}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$cabang->latitude}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$cabang->longitude}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$cabang->notelepon}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="fax" class="form-control" placeholder="Fax" value="{{$cabang->fax}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{$cabang->email}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Ref</label>
                            <input type="text" name="noref" class="form-control" placeholder="No. Ref" value="{{$cabang->noref}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$cabang->keterangan}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                              <option value="">-- Pilih Status --</option>
                              <option value="Aktif" <?php echo ($cabang->active == 'Aktif') ? "selected" : "" ?>>Aktif</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Perjamuan Kudus</label>
                            <select class="form-control select2" name="perjamuan" style="width: 100%;">
                              <option value="">-- Pilih Perjamuan Kudus --</option>
                              <option value="Minggu Ke-1" <?php echo ($cabang->perjamuan == 'Minggu Ke-1') ? "selected" : "" ?>>Minggu Ke-1</option>
                              <option value="Minggu Ke-2" <?php echo ($cabang->perjamuan == 'Minggu Ke-2') ? "selected" : "" ?>>Minggu Ke-2</option>
                              <option value="Minggu Ke-3" <?php echo ($cabang->perjamuan == 'Minggu Ke-3') ? "selected" : "" ?>>Minggu Ke-3</option>
                              <option value="Minggu Ke-4" <?php echo ($cabang->perjamuan == 'Minggu Ke-4') ? "selected" : "" ?>>Minggu Ke-4</option>
                            </select>
                          </div>
                        </div>
                        <div class="demo-button">
                          <button type="submit" class="btn btn-block btn-primary  waves-effect" id="cab">Save</button>
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
