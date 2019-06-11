@extends('layouts.master')

@section('content')
 @php 
  $user = Auth::user();
  @endphp
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

            <div class="box box-default">
              <!-- /.box-header -->
              <div class="box-body">
                
                  <div class="box-header with-border">
                  <h3 class="box-title">Detail Data Pengerja COOL (Data Pribadi) </h3>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. ID</label>
                      <input type="text" name="idpersonal" class="form-control" readonly="" value="{{$jabpel->idpersonal}}">
                    </div>
                  </div>
                  <div class="col-md-3 pull-right">
                    <div class="avatar-upload">
                     
                      <div class="avatar-preview">
                        <div id="imagePreview" style="background-image: url('{{asset('public/assets/foto/'.$jabpel->personal->urlphoto.'')}}');"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="namalengkap" placeholder="Nama Lengkap" required="" class="form-control"  value="{{$jabpel->personal['namalengkap']}}" readonly >
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggallahir" class="form-control pull-right" placeholder="Tanggal Lahir" readonly="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Kota</label>
                        <input type="text" name="kota" class="form-control" placeholder="Kota" readonly="">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kodepos</label>
                        <input type="number" name="kodepos" maxlength="5" class="form-control" value="{{$jabpel->personal['kodepos']}}" placeholder="Kodepos" readonly="">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" placeholder="Email" required="" value="{{$jabpel->personal['email']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telp / No. HP</label>
                      <input type="number" name="nohp" class="form-control" placeholder="No. Telp" value="{{$jabpel->personal['nohp']}}" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>BAPTIS ROH KUDUS</label>
                 
                        <input type="text" name="baptisrohkudus" value="{{$jabpel->personal['baptisrohkudus']}}" class="form-control"  readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status Pernikahan</label><br>
                      <input type="text" name="statusperkawinan" value="{{$jabpel->personal['statusperkawinan']}}" class="form-control"  readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KOM 100*</label><br>
                      <input type="text" name="kom" value="{{$jabpel->personal['kom']}}" class="form-control"  readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label><br>
                      <input type="text" name="pendidikan" value="" class="form-control"  readonly="">
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
                    <label> Jabatan</label>
                     <input type="text" name="" class="form-control" value="{{$jabpel->jabatan}}" readonly> 
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Posisi Pelayanan</label>
                    <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;" readonly>
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
                    <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;" readonly>
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
                    <select class="form-control select2" name="idcabang" id="cabang2" style="width: 100%;" readonly>
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
                    <label>Jenis COOL</label>
                    <input type="text" name="" value="{{$jabpel->tipecool['tipecool']}}" class="form-control" readonly="">
                    
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis</label>
                    <input type="text" name="" value="{{$jabpel->jenis}}" class="form-control" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan Kependetaan</label>
                    <input type="text" name="" value="{{$jabpel->jabatankependetaan}}" class="form-control" readonly="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Dokumen KTP</label><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Lihat Ktp</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Dokumen KKJ</label><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalkkj">Lihat KKJ</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sertifikat Baptis</label><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalbaptis">Lihat Sertifikat Baptis</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sertifikat SOM/KOM</label><br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalkom">Lihat Sertifikat SOM/KOM</button>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="demo-button">
                    @if(Auth::user()->role_id == 6)
                    <button onclick="location.href='{{ url('pengerja/approve',$jabpel->id)}}'" class="btn btn-block btn-success " @if($jabpel->personal['verifikasi'] =='0') disabled @elseif ($jabpel->approve=='1') disabled @endif >Acc</button>
                    @elseif(Auth::user()->role_id == 7)
                    <button onclick="location.href='{{ url('pengerja_approve/gembalacabang',$jabpel->id)}}'" @if($jabpel->approve_gembala_cabang =='1') disabled @endif class="btn btn-block btn-success  ">Acc</button>
                    @elseif(Auth::user()->role_id == 8)
                    <button onclick="location.href='{{ url('pengerja_approve/adminrayon',$jabpel->id)}}'" @if($jabpel->approve_rayon =='1') disabled @endif class="btn btn-block btn-success  ">Acc</button>
                    @elseif(Auth::user()->role_id == 9)
                    <button onclick="location.href='{{ url('pengerja_approve/gembalarayon',$jabpel->id)}}'" @if($jabpel->approve_gembala_rayon =='1') disabled @endif class="btn btn-block btn-success  ">Acc</button>
                    @endif

                  </div>
                </div>
                <div class="col-md-6">
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