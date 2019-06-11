 @php 
  $user = Auth::user();
  @endphp
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <form  action="{{url('coolpengerja/store')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <div class="box box-default">
              <!-- /.box-header -->
              <div class="box-body">
                
                  <div class="box-header with-border">
                  <h3 class="box-title">Tambah Data Pengerja COOL (Data Pribadi) </h3>
                  </div>
                  <div class="col-md-12">
	              	<div class="form-group">
	                  <label>No. ID</label>
	                  <input type="text" name="idpersonal" class="form-control" readonly="" @if ($user->role->name == 'Pelayan') value="{{$user->idpersonal}}" @endif>
	                </div>
	              </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Nama Lengkap(Sesuai KTP)</label>
                      <input type="text" name="namalengkap" class="form-control" placeholder="Nama (Sesuai KTP)" required="" @if ($user->role->name == 'Pelayan') value="{{$user->name}}" @else value ="" @endif>
                    </div>
                  </div>
                  <div class="col-md-3 pull-right">
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                        <input type='file' id="imageUpload6" accept=".jpg" name="urlphoto" />
                        <label for="imageUpload6"></label>
                      </div>
                      <div class="avatar-preview">
                        <div id="imagePreview6" style="background-image: url('{{asset('public/assets/img/userimagea.png')}}');">
                        </div>
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
                        <input type="text" name="tanggallahir" class="form-control pull-right datepickerlight" placeholder="Tanggal Lahir" required="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Kota</label>
                        <input type="text" name="kota" class="form-control" placeholder="Kota">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Kodepos</label>
                        <input type="number" name="kodepos" maxlength="5" class="form-control" placeholder="Kodepos">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" placeholder="Email" required="" @if ($user->role->name == 'Pelayan') value="{{$user->personal['email']}}" @else value ="" @endif>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Telp / No. HP</label>
                      <input type="number" name="nohp" class="form-control" placeholder="No. Telp" @if ($user->role->name == 'Pelayan') value="{{$user->personal['nohp']}}" @else value ="" @endif>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>BAPTIS ROH KUDUS</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="baptisrohkudus" class="minimal" value="Sudah" required="">Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="baptisrohkudus" class="minimal" value="Belum" required="">
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>Status Pernikahan</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="statuspernikahan" class="minimal" value="Sudah" required="">Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="statuspernikahan" class="minimal" value="Belum" required="">
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>KOM 100*</label><br>
                      <label class="col-sm-3">
                        <input type="radio" name="kom" class="minimal" value="Sudah" required="">Sudah
                      </label>
                      <label class="col-sm-3">
                        <input type="radio" name="kom" class="minimal" value="Belum" required="">
                        Belum
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                       <label>Pendidikan Terakhir</label><br>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S1" required="">S1
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S2" required="">
                        S2
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="S3" required="">
                        S3
                      </label>
                      <label class="col-sm-2">
                        <input type="radio" name="pendidikan" class="minimal" value="Lainnya" required="">
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
                      <option value="">== Pilih Pilih Jabatan ==</option>
                      <option value="Gemabala COOL">Gemabala COOL</option>
                      <option value="Istri Gembala COOL">Istri Gembala COOL</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="Wakil Gemabala COOL">Wakil Gemabala COOL</option>
                      <option value="Istri Wakil Gemabala COOL">Istri Wakil Gemabala COOL</option>
                      <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Posisi Pelayanan</label>
                    <select class="form-control select2" name="idrayon" id="rayon3" style="width: 100%;">
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
                    <select class="form-control select2" name="idsubrayon" id="subrayon3" style="width: 100%;">
                      <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><br></label>
                    <select class="form-control select2" name="idcabang" id="cabang3" style="width: 100%;">
                      <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis COOL</label>
                    <select class="form-control select2" name="jeniscool" style="width: 100%;" required>
                      <option value="" disable="true" selected="true">=== Pilih Jenis COOL ===</option>
                      @foreach ($tipecool as $key => $value)
                      <option value="{{$value->id}}">{{ $value->tipecool }}</option>
                      @endforeach
                    </select>
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
                      <option value="">== Pilih Pilih Jabatan ==</option>
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
        </div>
      </div>
    </section>
