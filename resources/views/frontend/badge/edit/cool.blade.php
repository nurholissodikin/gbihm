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
      <div class="row">
        <div class="col-md-12">
          <form  action="{{url('pengerja/cool/update',$jabpel->id)}}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                  <input type="hidden" name="id_pelayanan" value="{{$pelayanan->id}}">
            <div class="box box-default">
              <!-- /.box-header -->
              <div class="box-body">
                
                  <div class="box-header with-border">
                  <h3 class="box-title">Data Pengerja COOL (Data Pribadi) </h3>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. ID</label>
                      <input type="text" name="idpersonal" class="form-control"  value="{{$jabpel->idpersonal}}">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="namalengkap" placeholder="Nama Lengkap" required="" class="form-control"  value="{{$jabpel->personal['namalengkap']}}"  >
                    </div>
                  </div>
                  <div class="col-md-3 pull-right">
                      <div class="avatar-upload">
                        <div class="avatar-edit">
                          <input type='file' id="imageUpload" accept=" .jpg" name="urlphoto" />
                          <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                          <div id="imagePreview" style="background-image: url('{{asset('public/assets/foto/'.$jabpel->personal->urlphoto.'')}}');"></div>
                        </div>
                      </div>
                    </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggallahir" class="form-control pull-right datepickerlight" placeholder="Tanggal Lahir" value="{{$jabpel->personal['tanggallahir']}}" required="" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Kota</label>
                        <input type="text" name="kota" class="form-control" placeholder="Kota" value="{{$jabpel->personal['kabkota']}}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kodepos</label>
                        <input type="number" name="kodepos" maxlength="5" class="form-control" placeholder="Kodepos" value="{{$jabpel->personal['kodepos']}}">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" placeholder="Email" required=""value="{{$jabpel->personal['email']}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telp / No. HP</label>
                      <input type="number" name="nohp" class="form-control" placeholder="No. Telp" value="{{$jabpel->personal['nohp']}}"> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>BAPTIS ROH KUDUS</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="baptisrohkudus" class="minimal" value="Sudah" required="" <?php echo ($jabpel->personal['baptisrohkudus'] == 'Sudah') ? "checked": "" ?>>Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="baptisrohkudus" class="minimal" value="Belum" required="" <?php echo ($jabpel->personal['baptisrohkudus'] == 'Belum') ? "checked": "" ?>>
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>Status Pernikahan</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="statuspernikahan" class="minimal" value="Sudah" <?php echo ($jabpel->personal['statusperkawinan'] == 'Sudah') ? "checked": "" ?>>Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="statuspernikahan" class="minimal" value="Belum" <?php echo ($jabpel->personal['statusperkawinan'] == 'Belum') ? "checked": "" ?>>
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>KOM 100*</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="kom" class="minimal" value="Sudah" <?php echo ($jabpel->personal['kom'] == 'Sudah') ? "checked": "" ?>>Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="kom" class="minimal" value="Belum" <?php echo ($jabpel->personal['kom'] == 'Belum') ? "checked": "" ?>>
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>Pendidikan Terakhir</label><br>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S1"  >S1
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S2"  >
                        S2
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S3"  >
                        S3
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="Lainnya"  >
                        Lainnya
                      </label>
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
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </div>
            </div>
          </form>    
        </div>
      </div>
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
    				<img src="{{url('public/assets/pelayanan/dokumen/'.$pelayanan->dokumen.'')}}" class="img-responsive">
    			</div>
    		</div>
    	</div>
    </div>
   @endsection
