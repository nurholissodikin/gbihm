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
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Detail Pengerja</h3>
          </div>
          <div class="box-body">
            <div class="col-md-12">
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
                  <label>Nama Depan</label>
                  <input type="text" name="namadepan" placeholder="Nama Depan" class="form-control" value="{{$jabpel->personal['namadepan']}}" readonly="">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label>Nama Tengah</label>
                  <input type="text" name="namatengah" placeholder="Nama Tengah" class="form-control" value="{{$jabpel->personal['namatengah']}}" readonly="">
                </div>
              </div> 
              <div class="col-md-9">
                <div class="form-group">
                  <label>Nama Belakang</label>
                  <input type="text" name="namabelakang" placeholder="Nama Belakang" class="form-control" value="{{$jabpel->personal['namabelakang']}}" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Panggilan</label>
                  <input type="text" name="namapanggilan" placeholder="Nama Panggilan" class="form-control" value="{{$jabpel->personal['namapanggilan']}}" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  @php
                    if($jabpel->personal['jeniskelamin'] == 'L'){
                    $jk = "Laki-Laki";
                    }elseif($jabpel->personal['jeniskelamin'] == 'P'){
                    $jk = "Perempuan";
                    }else{
                    $jk="";
                    }
                  @endphp 
                    <input type="text" name="jk" class="form-control" value="{{$jk}}" readonly="">              
                </div>
              </div>             
            </div>
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat" readonly="">{{$jabpel->personal['namalengkap']}}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Provinsi</label>
                  <input type="text" name="provinces" class="form-control" value="{{$jabpel->personal->provinsia['name']}}" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kabupaten/Kota</label>
                  <input type="text" name="kabkota" class="form-control" value="{{$jabpel->personal->kabkotaa['name']}}" readonly="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. Telepon</label>
                  <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$jabpel->personal['notelp']}}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>No. HP</label>
                  <input type="number" name="nohp" class="form-control" placeholder="No. HP" value="{{$jabpel->personal['nohp']}}" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{$jabpel->personal['email']}}" readonly="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control" value="{{$jabpel->personal['tempatlahir']}}" readonly> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tala" class="form-control pull-right " placeholder="Tanggal Lahir"required="" autocomplete="off" value="{{$jabpel->personal['tanggallahir']}}" readonly="">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" name="prof" class="form-control" value="{{$jabpel->personal->profesi['profesi']}}" readonly>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>NIK (No. KTP)</label>
                  <input type="text" name="noktp" class="form-control" placeholder="No. KTP" maxlength="20" data-inputmask="'mask': '9999 9999 9999 9999'" value="{{$jabpel->personal['ktpid']}}" autocomplete="off" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label><small>* jika tidak ada NIK<br>No. ID lain (Passport, K. Pelajar/dsb)</small></label>
                  <input type="number" name="nolain" class="form-control" value="{{$jabpel->personal['nolain']}}" placeholder="No. ID lain (Passport, K. Pelajar/dsb)" autocomplete="off" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pendidikan</label>
                  <input type="text" name="pendidikan" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Golongan Darah</label>
                  <input type="text" name="gol" value="{{$jabpel->personal['golongandarah']}}" class="form-control" readonly="">
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
                  <input type="text" name="nosertifikat" class="form-control" value="{{$pelayanan->nosertifikat}}" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Baptis Roh Kudus</label>
                  <input type="text" name="" class="form-control" value="{{$jabpel->personal['baptisrohkudus']}}" readonly="">
                </div>
              </div>
            </div>
            <div class="col-md-12">  
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <input type="text" name="" class="form-control" value="{{$jabpel->personal['statusperkawinan']}}" readonly="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sejak Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tsk" class="form-control" placeholder="Sejak Tanggal" value="{{$jabpel->personal['sejaktanggalstatuskawin']}}" autocomplete="off" readonly="">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status Keluarga</label>
                   <input type="text" name="tsk" class="form-control" value="{{$jabpel->personal['hubkeluarga']}}" autocomplete="off">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>NO KKJ</label>
                  <input type="text" name="nokkj" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Pasangan</label>
                  <input type="text" name="" class="form-control" readonly="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Pengkhotbah</label>
                  <input type="text" name="" class="form-control" readonly="">
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
                <label> Jabatan</label>
                <input type="text" name="" class="form-control" value="{{$jabpel->jabatan}}">
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
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sejak</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input id="tgl_mulai" placeholder="Sejak" type="text" class="form-control " readonly value="{{$jabpel->sejak}}" name="tgl_awal">
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
                    <input id="tgl_akhir" placeholder="Sampai" type="text" class="form-control " readonly value="{{$jabpel->sampai}}" name="tgl_akhir">
                  </div>
                </div>
              </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="" value="{{$jabpel->jeniscool['name']}}" class="form-control" readonly="">
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
