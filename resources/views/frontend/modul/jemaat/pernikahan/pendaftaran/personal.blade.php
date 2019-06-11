<h3>Data Pernikahan</h3>
  <hr></hr>
    <input type="hidden" name="idbrk" id="id_brk">
    <input type="hidden" name="id_ayahibubrk" id="id_ayahibubrk">
   

    <div class="col-md-12">
      <div class="col-md-12">
        <div class="form-group">
          <label>Personal</label>
          <div class="input-group date">
            <select class="form-control select2" name="caper1" id="myselection" style="width: 100%;">
              <option value="" >=== Pilih Personal ===</option>
              @foreach($personal as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
              @endforeach
            </select>
            <div class="input-group-addon">
              <button type="button" class="btn btn-info caper1 btn-xs" data-toggle="collapse" data-target="#col"><i class="fa fa-plus">Tambah Personal</button></i>
            </div>
          </div>
        </div>
      </div>
      <div id="col" class="collapse">
        <div class="col-md-12">
          <div class="form-group">
            <label>No. ID</label>
            <input type="text" disabled="" name="" class="form-control">
          </div>
        </div>
        <div class="col-md-3 pull-right">
          <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload5" accept=".png, .jpg, .jpeg" name="urlphoto" />
              <label for="imageUpload5"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreviewd" style="background-image: url('{{asset('public/assets/img/userimagea.png')}}');">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>No.KTP</label>
            <input type="text" name="noktp" class="form-control" placeholder="No. KTP" maxlength="20">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>(berlaku s/d)</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="berlaku" placeholder="Tanggal Berlaku" class="form-control pull-right" id="datepicker">
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" >
          </div>
        </div>             
        <div class="col-md-5">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tala" class="form-control pull-right datepickerlight"  placeholder="Tanggal Lahir" >
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <label class="col-sm-3">
              <input type="radio" name="jk" class="minimal" value="L" >Laki-Laki
            </label>
            <label class="col-sm-3">
              <input type="radio" name="jk" class="minimal" value="P" >
              Perempuan
            </label>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="col-md-12">
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
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Rt</label>
              <input type="text" name="rtrw[]" class="form-control" placeholder="Rt" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Rw</label>
              <input type="text" name="rtrw[]" class="form-control" placeholder="Rw" >
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
              <label>Kabupaten</label>
              <select class="form-control select2" name="regencies" id="regencies" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control select2" name="districts" id="districts" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kelurahan</label>
              <select class="form-control select2" name="villages" id="villages" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Agama</label>
              <select class="form-control select2" name="agama" style="width: 100%;">
                <option value="">-- Pilih Agama --</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Islam">Islam</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12">  
          <div class="col-md-6">
            <div class="form-group">
              <label>Status Perkawinan</label>
              <select class="form-control select2" name="sk" style="width: 100%;">
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
                <input type="text" name="tsk" class="form-control home" placeholder="Sejak Tanggal" id="datepicker2" >
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label>Kewarganegaraan</label><br>
              <label class="col-sm-3">
               <input type="radio" name="kewarganegaraan" class="minimal" value="WNA">WNA
              </label>
              <label class="col-sm-3">
               <input type="radio" name="kewarganegaraan" class="minimal" value="WNI">
               WNI
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-12">    
          <div class="col-md-6">
            <div class="form-group">
              <label>Status Personal</label>
              <select class="form-control select2" name="sp" style="width: 100%;">
                <option value="">-- Pilih Status Personal --</option>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" name="stp" class="form-control pull-right datepickerlight" placeholder="Sejak Tanggal" >
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <div class="col-md-12">
      <div class="col-md-12">
        <div class="form-group">
          <label>Pasangan</label>
          <div class="input-group date">
            <select class="form-control select2" name="caper2" id="myselectiona" style="width: 100%;">
              <option value="" >=== Pilih Pasangan ===</option>
              @foreach($personal as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
              @endforeach
            </select>
            <div class="input-group-addon">
              <button type="button" class="btn btn-info caper2 btn-xs" data-toggle="collapse" data-target="#cola"><i class="fa fa-plus">Tambah Personal</button></i>
            </div>
          </div>
        </div>
      </div>
      <div id="cola" class="collapse">
        <div class="col-md-12">
          <div class="form-group">
            <label>No. ID</label>
            <input type="text" disabled="" name="" class="form-control">
          </div>
        </div>
        <div class="col-md-3 pull-right">
          <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload6" accept=".png, .jpg, .jpeg" name="urlphoto_p" />
              <label for="imageUpload6"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreview6" style="background-image: url('{{asset('public/assets/img/userimagea.png')}}');">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>No.KTP</label>
            <input type="text" name="noktp_p" class="form-control" placeholder="No. KTP" maxlength="20">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>(berlaku s/d)</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="berlaku_p" placeholder="Tanggal Berlaku" class="form-control pull-right" id="datepicker">
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_p" placeholder="Nama Lengkap" class="form-control" >
          </div>
        </div>             
        <div class="col-md-5">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tela_p" placeholder="Tempat Lahir" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tala_p" class="form-control pull-right datepickerlight"  placeholder="Tanggal Lahir" >
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="form-group">
            <label>Jenis Kelamin</label><br>
            <label class="col-sm-3">
              <input type="radio" name="jk_p" class="minimal" value="L" >Laki-Laki
            </label>
            <label class="col-sm-3">
              <input type="radio" name="jk_p" class="minimal" value="P" >
              Perempuan
            </label>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Golongan Darah</label>
              <select class="form-control select2" name="gol_p" style="width: 100%;">
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
          <div class="col-md-12">
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Rt</label>
              <input type="text" name="rtrw_p[]" class="form-control" placeholder="Rt" >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Rw</label>
              <input type="text" name="rtrw_p[]" class="form-control" placeholder="Rw" >
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control select2" name="provinces_p" id="provinces" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                @foreach ($provinces as $key => $value)
                <option value="{{$value->id}}">{{ $value->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kabupaten</label>
              <select class="form-control select2" name="regencies_p" id="regencies" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kecamatan</label>
              <select class="form-control select2" name="districts_p" id="districts" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kelurahan</label>
              <select class="form-control select2" name="villages_p" id="villages" style="width: 100%">
                <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Agama</label>
              <select class="form-control select2" name="agama_p" style="width: 100%;">
                <option value="">-- Pilih Agama --</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Islam">Islam</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12">  
          <div class="col-md-6">
            <div class="form-group">
              <label>Status Perkawinan</label>
              <select class="form-control select2" name="sk_p" style="width: 100%;">
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
                <input type="text" name="tsk_p" class="form-control home" placeholder="Sejak Tanggal" id="datepicker2" >
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label>Kewarganegaraan</label><br>
              <label class="col-sm-3">
               <input type="radio" name="kewarganegaraan_p" class="minimal" value="WNA">WNA
              </label>
              <label class="col-sm-3">
               <input type="radio" name="kewarganegaraan_p" class="minimal" value="WNI">
               WNI
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-12">    
          <div class="col-md-6">
            <div class="form-group">
              <label>Status Personal</label>
              <select class="form-control select2" name="sp_p" style="width: 100%;">
                <option value="">-- Pilih Status Personal --</option>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" name="stp_p" class="form-control pull-right datepickerlight" placeholder="Sejak Tanggal" >
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>