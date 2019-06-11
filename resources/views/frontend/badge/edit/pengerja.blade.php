@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       MDPJ Pengerja

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> MDPJ</a></li>
        <li><a href="#">Pengerja</a></li>
        <li class="active">Detail</li>
      </ol>
    </section>
<br>
    <section class="content">
      <form action="{{url('pengerja/person/update',$jabpel->id)}}" enctype="multipart/form-data" method="post">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pengerja</h3>
            </div>
            <div class="box-body">
              
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_kkj" value="{{$kkj->id}}">
                  <input type="hidden" name="id_pelayanan" value="{{$pelayanan->id}}">
                  <input type="hidden" name="id_pendidikan" value="{{$pendidikan->idpendidikan}}">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. ID</label>
                        <input type="text" name="idpersonal" class="form-control" value="{{$jabpel->idpersonal}}" readonly="">
                      </div>
                    </div>
                    <div class="col-md-3 pull-right">
                      <div class="avatar-upload">
                        <div class="avatar-edit">
                          <input type='file' id="imageUpload" accept=" .jpg" name="urlphoto" />
                          <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                          <div id="imagePreview" style="background-image: url('{{asset('public/assets/foto/thumb/'.$jabpel->personal->urlphoto.'')}}');"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="namalengkap" placeholder="Nama Lengkap" required="" class="form-control"  value="{{$jabpel->personal['namalengkap']}}"  >
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" name="namadepan" placeholder="Nama Depan" class="form-control" value="{{$jabpel->personal['namadepan']}}">
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="form-group">
                        <label>Nama Tengah</label>
                        <input type="text" name="namatengah" placeholder="Nama Tengah" class="form-control" value="{{$jabpel->personal['namatengah']}}">
                      </div>
                    </div> 
                    <div class="col-md-9">
                      <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" name="namabelakang" placeholder="Nama Belakang" class="form-control" value="{{$jabpel->personal['namabelakang']}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Panggilan</label>
                        <input type="text" name="namapanggilan" placeholder="Nama Panggilan" class="form-control" value="{{$jabpel->personal['namapanggilan']}}">
                      </div>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                      <label>Jenis Kelamin</label><br>
                       <label class="col-sm-3">
                        <input type="radio" name="jk" class="minimal" value="L" <?php echo ($jabpel->personal['jeniskelamin'] == 'L') ? "checked": "" ?> required="">Laki-Laki
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="jk" class="minimal" value="P" <?php echo ($jabpel->personal['jeniskelamin'] == 'P') ? "checked": "" ?> required="">
                        Perempuan
                      </label>
                    </div>
                  </div>            
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">{{$jabpel->personal['alamattinggal']}}</textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                    	<div class="form-group">
                    		<label>Provinsi</label>
                    		<select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                    			<option value="0" disable="true">=== Pilih Provinsi ===</option>
                    			@foreach ($provinces as $key => $value)
                    			<option value="{{$value->id}}" @if($value->id == $jabpel->personal['provinsi']) selected  @endif>{{ $value->name }}</option>
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
                    			$kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($jabpel->personal['provinsi']);
                    			@endphp
                    			@foreach($kabupaten as $data)
                    			<option value="{{$data->id}}" @if($data->id == $jabpel->personal['kabkota']) selected  @endif> {{ $data->name }}</option>

                    			@endforeach
                    		</select>
                    	</div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$jabpel->personal['notelp']}}" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="number" name="nohp" class="form-control" placeholder="No. HP" value="{{$jabpel->personal['nohp']}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{$jabpel->personal['email']}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control" value="{{$jabpel->personal['tempatlahir']}}" > 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tala" class="form-control pull-right " placeholder="Tanggal Lahir"required="" autocomplete="off" value="{{$jabpel->personal['tanggallahir']}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 dv_kerja">
                    	<div class="form-group">
                    	  <label>Pilih Profesi</label>
                    	  <select class="form-control select2"  name="prof" style="width: 100%;">
                    		<option value="" >=== Pilih Profesi ===</option>
                    		@foreach($prof as $data)
                    		<option value="{{$data->idprofesi}}" @if($data->idprofesi == $jabpel->personal['idprofesi']) selected  @endif>{{$data->profesi}}</option>
                    		@endforeach
                    	  </select>
                    	</div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NIK (No. KTP)</label>
                        <input type="text" name="noktp" class="form-control" placeholder="No. KTP" maxlength="20" data-inputmask="'mask': '9999 9999 9999 9999'" value="{{$jabpel->personal['ktpid']}}" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label><small>* jika tidak ada NIK<br>No. ID lain (Passport, K. Pelajar/dsb)</small></label>
                        <input type="number" name="nolain" class="form-control" value="{{$jabpel->personal['nolain']}}" placeholder="No. ID lain (Passport, K. Pelajar/dsb)" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pendidikan </label>
                        <select class="form-control select2" name="pendidikan" style="width: 100%;">
                          <option value='' disable="true">=== Pilih Pendidikan Terakhir ===</option>
                          <option value="SD" <?php echo ($pendidikan->tingkatpendidikan == 'SD') ? "selected": "" ?>>SD</option>
                          <option value="SMP" <?php echo ($pendidikan->tingkatpendidikan == 'SMP') ? "selected": "" ?>>SMP</option>
                          <option value="SMA" <?php echo ($pendidikan->tingkatpendidikan == 'SMA') ? "selected": "" ?>>SMA</option>
                          <option value="Diploma" <?php echo ($pendidikan->tingkatpendidikan == 'Diploma') ? "selected": "" ?>>Diploma</option>
                          <option value="S1" <?php echo ($pendidikan->tingkatpendidikan == 'S1') ? "selected": "" ?>>S1</option>
                          <option value="S2" <?php echo ($pendidikan->tingkatpendidikan == 'S2') ? "selected": "" ?>>S2</option>
                          <option value="S3" <?php echo ($pendidikan->tingkatpendidikan == 'S3') ? "selected": "" ?>>S3</option>
                          <option value="Lainnya" <?php echo ($pendidikan->tingkatpendidikan == 'Lainnya') ? "selected": "" ?>>Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Golongan Darah</label>
                        <select class="form-control select2" name="gol" style="width: 100%;">
		                  <option value="">-- Pilih Golongan Darah --</option>
		                  <option value="A" <?php echo ($jabpel->personal->golongandarah == 'A') ? "selected": "" ?>>A</option>
		                  <option value="A+" <?php echo ($jabpel->personal->golongandarah == 'A+') ? "selected": "" ?>>A+</option>
		                  <option value="A-" <?php echo ($jabpel->personal->golongandarah == 'A-') ? "selected": "" ?>>A-</option>
		                  <option value="B" <?php echo ($jabpel->personal->golongandarah == 'B') ? "selected": "" ?>>B</option>
		                  <option value="B+" <?php echo ($jabpel->personal->golongandarah == 'B+') ? "selected": "" ?>>B+</option>
		                  <option value="B-" <?php echo ($jabpel->personal->golongandarah == 'B-') ? "selected": "" ?>>B-</option>
		                  <option value="AB" <?php echo ($jabpel->personal->golongandarah == 'AB') ? "selected": "" ?>>AB</option>
		                  <option value="AB+" <?php echo ($jabpel->personal->golongandarah == 'AB+') ? "selected": "" ?>>AB+</option>
		                  <option value="AB-" <?php echo ($jabpel->personal->golongandarah == 'AB-') ? "selected": "" ?>>AB-</option>
		                  <option value="O" <?php echo ($jabpel->personal->golongandarah == 'O') ? "selected": "" ?>>O</option>
		                  <option value="O+" <?php echo ($jabpel->personal->golongandarah == 'O+') ? "selected": "" ?>>O+</option>
		                  <option value="O-" <?php echo ($jabpel->personal->golongandarah == 'O-') ? "selected": "" ?>>O-</option>
		                </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Baptis Selam</label>
                        <select class="form-control select2" name="baptis_selam" style="width: 100%;">
                          <option value="">-- Pilih Internal / Eksternal --</option>
                          <option value="INTERNAL (GBI JL. GATOT SUBROTO)">INTERNAL (GBI JL. GATOT SUBROTO)</option>
                          <option value="EKSTERNAL (NON GBI JL. GATOT SUBROTO)">EKSTERNAL (NON GBI JL. GATOT SUBROTO)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Sertifikat</label>
                        <input type="text" name="nosertifikat" class="form-control" value="{{$jabpel->nosertifikat}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Baptis Roh Kudus</label>
                        <select class="form-control select2" name="baptisrohkudus" style="width: 100%;">
                          <option value="Sudah" <?php echo ($jabpel->personal['baptisrohkudus'] == 'Sudah') ? "selected": "" ?>>Sudah</option>
                          <option value="Belum" <?php echo ($jabpel->personal['baptisrohkudus'] == 'Belum') ? "selected": "" ?>>Belum</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">  
                    <div class="col-md-6">
                    	<div class="form-group">
                    	  <label>Status Perkawinan</label>
                    	  <select class="form-control select2" name="sk" id="belum" style="width: 100%;">
                    	    <option value="">-- Pilih Status Perkawinan --</option>       
                    	    <option value="Menikah" <?php echo ($jabpel->personal['statusperkawinan'] == 'Menikah') ? "selected": "" ?>>Menikah</option>
                    	    <option value="Belum Menikah" <?php echo ($jabpel->personal['statusperkawinan'] == 'Belum Menikah') ? "selected": "" ?>>Belum Menikah </option>
                    	    <option value="Cerai" <?php echo ($jabpel->personal['statusperkawinan'] == 'Cerai') ? "selected": "" ?>>Cerai</option>
                    	    <option value="Duda/Janda" <?php echo ($jabpel->personal['statusperkawinan'] == 'Duda/Janda') ? "selected": "" ?>>Duda/Janda</option>
                    	  </select>
                    	</div>
                    </div>
                    <div class="col-md-6">
                    	<div class="form-group">
                    		<label>Sejak Tanggal</label>
                    		<div class="input-group date">
                    			<div class="input-group-addon">
                    				<i class="fa fa-calendar"></i>
                    			</div>
                    			<input type="text" name="tsk" class="form-control belumNikah datepickerlight pull-right" placeholder="Sejak Tanggal"  value="{{$jabpel->personal['sejaktanggalstatuskawin']}}" autocomplete="off">
                    		</div>
                    	</div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Status Keluarga</label>
                        <select class="form-control select2" name="keluarga" style="width: 100%;">
                          <option value="">-- Pilih Status Keluarga --</option>
                          <option value="Orang Tua" <?php echo ($jabpel->personal['hubkeluarga'] == 'Orang Tua') ? "selected": "" ?>>ORANG TUA</option>
                          <option value="Istri" <?php echo ($jabpel->personal['hubkeluarga'] == 'Istri') ? "selected": "" ?>>ISTRI</option>
                          <option value="Suami" <?php echo ($jabpel->personal['hubkeluarga'] == 'Suami') ? "selected": "" ?>>SUAMI</option>
                          <option value="Anak" <?php echo ($jabpel->personal['hubkeluarga'] == 'Anak') ? "selected": "" ?>>ANAK</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>NO KKJ</label>
                        <input type="text" name="nokkj" class="form-control" value="{{$kkj->nokkj}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Pasangan</label>
                        <select class="form-control select2" name="pasangan" style="width: 100%";>
                          <option class="">-- Pilih Pasangan --</option>
                          @foreach($personal as $data)
                          <option class="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pengkhotbah</label>
                        <select class="form-control select2" name="pengkhotbah" style="width: 100%;">
                          <option value="">-- Pilih Status Pengkhotbah --</option>
                          <option value="YA">YA</option>
                          <option value="TIDAK">TIDAK</option>
                        </select>
                      </div>
                    </div>
                  </div> 
                     
            </div>  
          </div>
          <div class="box box-default">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-header with-border">
                <h3 class="box-title">Data Pelayanan </h3>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pilih Jabatan</label>
                  <select class="form-control select2" name="jabatan" style="width: 100%">
                    <option value="" >== Pilih Pilih Jabatan ==</option>
                    <option value="Gembala COOL" <?php echo ($jabpel->jabatan == 'Gembala COOL') ? "selected": "" ?>>Gembala COOL</option>
                    <option value="Istri Gembala COOL" <?php echo ($jabpel->jabatan == 'Istri Gembala COOL') ? "selected": "" ?>>Istri Gembala COOL</option>
                    <option value="Sekretaris" <?php echo ($jabpel->jabatan == 'Sekretaris') ? "selected": "" ?>>Sekretaris</option>
                    <option value="Bendahara" <?php echo ($jabpel->jabatan == 'Bendahara') ? "selected": "" ?>>Bendahara</option>
                    <option value="Wakil Gembala COOL" <?php echo ($jabpel->jabatan == 'Wakil Gembala COOL') ? "selected": "" ?>>Wakil Gembala COOL</option>
                    <option value="Istri Wakil Gembala COOL" <?php echo ($jabpel->jabatan == 'Istri Wakil Gembala COOL') ? "selected": "" ?>>Istri Wakil Gembala COOL</option>
                    <option value="Lainnya" <?php echo ($jabpel->jabatan == 'Lainnya') ? "selected": "" ?>>Lainnya</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Posisi Pelayanan</label>
                  <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;">
                    <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                     @foreach ($rayon as $key => $value)
                      <option value="{{$value->idrayon}}" @if($value->idrayon == $jabpel->idrayon) selected  @endif>{{ $value->namarayon }}</option>
                     @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label><br></label>
                  <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;">
                    <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                    @php
                      $subray = app()->make('App\Http\Controllers\CountryController')->fill_subrayon2($jabpel->idrayon);
                    @endphp
                    @foreach($subray as $data)
                      <option value="{{$data->idsubrayon}}" @if($data->idsubrayon == $jabpel->idsubrayon) selected @endif> {{ $data->namasubrayon }}</option>  
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label><br></label>
                  <select class="form-control select2" name="idcabang" id="cabang2" style="width: 100%;">
                    <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
                    @php
                      $casub = app()->make('App\Http\Controllers\CountryController')->fill_cabang2($jabpel->idsubrayon);
                    @endphp
                    @foreach($casub as $data)
                      <option value="{{$data->idcabangranting}}" @if($data->idcabangranting == $jabpel->idcabangranting) selected @endif> {{ $data->namacabang }}</option>  
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sejak</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="tgl_mulai" placeholder="Sejak" type="text" class="form-control datepicker" value="{{$jabpel->sejak}}" name="tgl_awal">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                 <label>Sampai Dengan</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="tgl_akhir" placeholder="Sampai" type="text" class="form-control datepicker" value="{{$jabpel->sampai}}" name="tgl_akhir">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Jenis</label>
                  <select class="form-control select2" name="jenis" style="width: 100%;">
                    <option value="">== Pilih Jenis ==</option>
                    <option value="Badge Hilang" <?php echo ($jabpel->jenis == 'Badge Hilang') ? "selected": "" ?>>Badge Hilang</option>
                    <option value="Rekomitmen" <?php echo ($jabpel->jenis == 'Rekomitmen') ? "selected": "" ?>>Rekomitmen</option>
                    <option value="Ganti Foto Cetak Ulang" <?php echo ($jabpel->jenis == 'Ganti Foto Cetak Ulang') ? "selected": "" ?>>Ganti Foto Cetak Ulang</option>
                    <option value="Mutasi Pengerja"  <?php echo ($jabpel->jenis == 'Mutasi Pengerja') ? "selected": "" ?>>Mutasi Pengerja</option>
                    <option value="Upgrade Pelayanan" <?php echo ($jabpel->jenis == 'Upgrade Pelayanan') ? "selected": "" ?>>Upgrade Pelayanan</option>
                    <option value="Upgrade Statis" <?php echo ($jabpel->jenis == 'Upgrade Statis') ? "selected": "" ?>>Upgrade Statis</option>
                    <option value="Perpindahan Antar Badge" <?php echo ($jabpel->jenis == 'Perpindahan Antar Badge') ? "selected": "" ?>>Perpindahan Antar Badge</option>
                    <option value="Mutasi Cabang" <?php echo ($jabpel->jenis == 'Mutasi Cabang') ? "selected": "" ?>>Mutasi Cabang</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Jabatan Kependetaan</label>
                  <select class="form-control select2" name="jake" style="width: 100%">
                    <option value="">== Pilih Jabatan ==</option>
                    <option value="Pdt" <?php echo ($jabpel->jabatankependetaan == 'Pdt') ? "selected": "" ?>>Pdt</option>
                    <option value="Pdm" <?php echo ($jabpel->jabatankependetaan == 'Pdm') ? "selected": "" ?>>Pdm</option>
                    <option value="Pdp" <?php echo ($jabpel->jabatankependetaan == 'Pdp') ? "selected": "" ?>>Pdp</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Dokumen KTP</label>
                  <div class="input-group date">
                  	<input type="file" name="dok_ktp" class="form-control" placeholder="Dokumen">
                  	<div class="input-group-addon">
                  		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">Lihat Ktp</button>
                  	</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Dokumen KKJ</label>
                  <div class="input-group date">
                  	<input type="file" name="dok_kkj" class="form-control" placeholder="Dokumen">
                  	<div class="input-group-addon">
                  		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalkkj">Lihat KKJ</button>
                  	</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sertifikat Baptis</label>
                  <div class="input-group date">
                  	<input type="file" name="dok_baptis" class="form-control" placeholder="Dokumen">
                  	<div class="input-group-addon">
                  		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalbaptis">Lihat Sertifikat Baptis</button>
                  	</div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sertifikat SOM/KOM</label>
                  <div class="input-group date">
                  	<input type="file" name="dok_somkom" class="form-control" placeholder="Dokumen">
                  	<div class="input-group-addon">
                  		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalkom">Lihat Sertifikat SOM/KOM</button>
                  	</div>
                  </div> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="demo-button">
                   <button class="btn btn-block btn-primary " type="submit" >Save</button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="demo-button">
                  <button type="button" disabled="" class="btn btn-block btn-success  waves-effect">Kirim</button>
                </div>
              </div>
          </div>
        </div>
    </form>
    </section>
  </div>

  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="{{url('public/assets/personal/dokumen_ktp/'.$jabpel->personal['dokumen_ktp'].'')}}" class="img-responsive">
          </div>
      </div>
    </div>
  </div>
  <div id="myModalkkj" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="{{url('public/assets/personal/dokumen_kkj/'.$jabpel->personal['dok_kkj'].'')}}" class="img-responsive">
          </div>
      </div>
    </div>
  </div>
  <div id="myModalbaptis" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="{{url('public/assets/personal/dokumen_baptis/'.$jabpel->personal['dok_baptis'].'')}}" class="img-responsive">
          </div>
      </div>
    </div>
  </div>
  <div id="myModalkom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="{{url('public/assets/rohani/pelayanan/dokumen/'.$pelayanan->dokumen.'')}}" class="img-responsive">
          </div>
      </div>
    </div>
  </div>
@endsection