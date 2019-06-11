
  @php 
  $user = Auth::user();
  @endphp


  <section class="content">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form  action="{{url('mdpjpengerja/store')}}" enctype="multipart/form-data" method="post" id="formpil">
      {{csrf_field()}}  
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Pengerja</h3>
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label>No. ID</label>
                <input type="text" name="idpersonal" class="form-control" readonly="" @if ($user->role->name == 'Pelayan') value="{{$user->idpersonal}}" @endif>
              </div>
            </div>
            <div class="col-md-3 pull-right">
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type='file' id="imageUpload" accept=".jpg" name="urlphoto" />
                  <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url('public/assets/img/userimage.png');">
                  </div>
               </div>
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="namalengkap" placeholder="Nama Lengkap" required="" class="form-control" @if ($user->role->name == 'Pelayan') value="{{$user->name}}" @else value ="" @endif >
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" name="namadepan" placeholder="Nama Depan" class="form-control">
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label>Nama Tengah</label>
                <input type="text" name="namatengah" placeholder="Nama Tengah" class="form-control">
              </div>
            </div> 
            <div class="col-md-9">
              <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" name="namabelakang" placeholder="Nama Belakang" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Panggilan</label>
                <input type="text" name="namapanggilan" placeholder="Nama Panggilan" class="form-control">
              </div>
            </div>
            <div class="col-md-9">
              <div class="form-group">
                <label>Jenis Kelamin</label><br>
                 <label class="col-sm-3">
                  <input type="radio" name="jk" class="minimal" value="L" required="">Laki-Laki
                </label>
                <label class="col-sm-3">
                  <input type="radio" name="jk" class="minimal" value="P" required="">
                  Perempuan
                </label>
              </div>
            </div>             
          </div>
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Provinsi</label>
                <select class="form-control select2" name="provinces" id="provinces" style="width: 100%">
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
                <select class="form-control select2" name="regencies" id="regencies" style="width: 100%">
                  <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>No. Telepon</label>
                <input type="number" name="notelp" class="form-control" placeholder="No. Telepon">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>No. HP</label>
                <input type="number" name="nohp" class="form-control" placeholder="No. HP" @if ($user->role->name == 'Pelayan') value="{{$user->personal['nohp']}}" @else value ="" @endif class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" @if ($user->role->name == 'Pelayan') value="{{$user->personal['email']}}" @else value ="" @endif>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tala" class="form-control pull-right datepickerlight" placeholder="Tanggal Lahir"required="" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Pekerjaan</label>
                <select class="form-control select2"  name="prof" style="width: 100%;">
                  <option value="" >=== Pekerjaan ===</option>
                  @foreach($prof as $data)
                  <option value="{{$data->idprofesi}}">{{$data->profesi}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>NIK (No. KTP)</label>
                <input type="text" name="noktp" class="form-control" placeholder="No. KTP" maxlength="20" data-inputmask="'mask': '9999 9999 9999 9999'" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label><small>* jika tidak ada NIK<br>No. ID lain (Passport, K. Pelajar/dsb)</small></label>
                <input type="text" name="nolain" class="form-control" placeholder="No. ID lain (Passport, K. Pelajar/dsb)" autocomplete="off">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Pendidikan</label>
                <select class="form-control select2" name="tp" style="width: 100%;">
                  <option value='' disable="true">=== Pilih Pendidikan Terakhir ===</option>
                  <option value="SD" >SD</option>
                  <option value="SMP" >SMP</option>
                  <option value="SMA" >SMA</option>
                  <option value="Diploma" >Diploma</option>
                  <option value="S1" >S1</option>
                  <option value="S2" >S2</option>
                  <option value="S3" >S3</option>
                  <option value="Lainnya" >Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label>Golongan Darah</label>
                <select class="form-control select2" name="gol" style="width: 100%;">
                  <option value="">-- Pilih Golongan Darah --</option>
                  <option value="A">A</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B">B</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB">AB</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O">O</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
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
                <input type="text" name="nosertifikat" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label>Baptis Roh Kudus</label>
                <select class="form-control select2" name="baptisrohkudus" style="width: 100%;">
                  <option value="Sudah">Sudah</option>
                  <option value="Belum">Belum</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">  
            <div class="col-md-6">
              <div class="form-group">
                <label>Status Perkawinan</label>
                <select class="form-control  select2" id="belumNikah" name="sk" style="width: 100%;">
                  <option value="">-- Pilih Status Perkawinan --</option>
                  <option value="Menikah">Menikah</option>
                  <option value="Belum Menikah">Belum Menikah</option>
                  <option value="Cerai">Cerai</option>
                  <option value="Duda/Janda">Duda/Janda</option>
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
                  <input type="text" name="tsk" class="form-control belumNikah datepickerlight" placeholder="Sejak Tanggal"  autocomplete="off">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label>Status Keluarga</label>
                <select class="form-control select2" name="keluarga" style="width: 100%;">
                  <option value="">-- Pilih Status Keluarga --</option>
                  <option value="Orang Tua">ORANG TUA</option>
                  <option value="Istri">ISTRI</option>
                  <option value="Suami">SUAMI</option>
                  <option value="Anak">ANAK</option>
                </select>
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
                <select class="form-control select2" name="keluarga" style="width: 100%;">
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
                <option value="">== Pilih Pilih Jabatan ==</option>
                <option value="Gembala COOL">Gembala COOL</option>
                <option value="Istri Gembala COOL">Istri Gembala COOL</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Wakil Gembala COOL">Wakil Gembala COOL</option>
                <option value="Istri Wakil Gembala COOL">Istri Wakil Gembala COOL</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Posisi Pelayanan</label>
              <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;">
                <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                @foreach ($rayon as $key => $value)
                <option value="{{$value->idrayon}}">{{ $value->namarayon }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label><br></label>
              <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;">
                <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label><br></label>
              <select class="form-control select2" name="idcabang" id="cabang2" style="width: 100%;">
                <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
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
                <input id="tgl_mulai" placeholder="Sejak" type="text" class="form-control datepicker" name="tgl_awal">
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
              <input id="tgl_akhir" placeholder="Sampai" type="text" class="form-control datepicker" name="tgl_akhir">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Jenis</label>
              <select class="form-control select2" name="jenis" style="width: 100%;">
                <option value="">== Pilih Jenis ==</option>
                <option value="Badge Hilang">Badge Hilang</option>
                <option value="Rekomitmen">Rekomitmen</option>
                <option value="Ganti Foto Cetak Ulang">Ganti Foto Cetak Ulang</option>
                <option value="Mutasi Pengerja" >Mutasi Pengerja</option>
                <option value="Upgrade Pelayanan">Upgrade Pelayanan</option>
                <option value="Upgrade Statis">Upgrade Statis</option>
                <option value="Perpindahan Antar Badge">Perpindahan Antar Badge</option>
                <option value="Mutasi Cabang">Mutasi Cabang</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Jabatan Kependetaan</label>
              <select class="form-control select2" name="jake" style="width: 100%">
                <option value="">== Pilih Jabatan ==</option>
                <option value="Pdt">Pdt</option>
                <option value="Pdm">Pdm</option>
                <option value="Pdp">Pdp</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Dokumen KTP</label>
              <input type="file" name="dok_ktp" class="form-control" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Dokumen KKJ</label>
              <input type="file" name="dok_kkj" class="form-control" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sertifikat Baptis</label>
              <input type="file" name="dok_baptis" class="form-control" required="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sertifikat SOM/KOM</label>
              <input type="file" name="dok_somkom" class="form-control" required="">
            </div>
          </div>
          <div class="demo-button">
            <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
          </div>
        </div>
      </div>
    </form> 
  </section>


