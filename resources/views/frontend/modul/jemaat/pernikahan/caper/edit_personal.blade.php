<h3>Data Pernikahan</h3>
  <hr></hr>
   <input type="hidden" name="idbrk" id="id_brk">
   <input type="hidden" name="idayahibupas" value="{{$pernikahan->idayahibupas}}">
   <input type="hidden"  name="status" value="In Confirmation" class="form-control" >
    <!-- <div class="col-md-12">
      <div class="form-group">
        <label>No. ID</label>
        <input type="text" disabled="" name="" class="form-control">
      </div>
    </div>
    <div class="col-md-3 pull-right">
      <div class="avatar-upload">
        <div class="avatar-edit">
          <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="urlphoto" />
          <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
          <div id="imagePreview" style="background-image: url('{{asset('public/assets/foto/'.$pernikahan->foto_pasangan.'')}}');"></div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label>No.KTP</label>
        <input type="text" name="noktp" value="{{$pernikahan->ktpid_pasangan}}" class="form-control" placeholder="No. KTP" maxlength="20">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>(berlaku s/d)</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="berlaku" value="{{$pernikahan->ktp_berlaku_pasangan}}" placeholder="Tanggal Berlaku" class="form-control pull-right" id="datepicker">
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="{{$pernikahan->namalengkap_pasangan}}" placeholder="Nama Lengkap" class="form-control" required="">
      </div>
    </div>             
    <div class="col-md-5">
      <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tela" value="{{$pernikahan->tempatlahir_pasangan}}" placeholder="Tempat Lahir" class="form-control">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" name="tala" class="form-control pull-right" value="{{$pernikahan->tanggallahir_pasangan}}" placeholder="Tanggal Lahir" id="datepicker1" required="">
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="form-group">
       <label>Jenis Kelamin</label><br>
         <label class="col-sm-3">
          <input type="radio" name="jk" <?php echo ($pernikahan->jeniskelamin_pasangan == 'L') ? "checked": "" ?> class="minimal" value="L" required="">Laki-Laki
        </label>
        <label class="col-sm-3">
          <input type="radio" name="jk" <?php echo ($pernikahan->jeniskelamin_pasangan == 'P') ? "checked": "" ?> class="minimal" value="P" required="">
          Perempuan
        </label>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <br>
        <label>Golongan Darah</label>
        <select class="form-control select2" name="gol" style="width: 100%;">
          <option value="">-- Pilih Golongan Darah --</option>
          <option value="A" <?php echo ($pernikahan->golongandarah_pasangan == 'A') ? "selected": "" ?>>A</option>
          <option value="A+" <?php echo ($pernikahan->golongandarah_pasangan == 'A+') ? "selected": "" ?>>A+</option>
          <option value="A-" <?php echo ($pernikahan->golongandarah_pasangan == 'A-') ? "selected": "" ?>>A-</option>
          <option value="B" <?php echo ($pernikahan->golongandarah_pasangan == 'B') ? "selected": "" ?>>B</option>
          <option value="B+" <?php echo ($pernikahan->golongandarah_pasangan == 'B+') ? "selected": "" ?>>B+</option>
          <option value="B-" <?php echo ($pernikahan->golongandarah_pasangan == 'B-') ? "selected": "" ?>>B-</option>
          <option value="AB" <?php echo ($pernikahan->golongandarah_pasangan == 'AB') ? "selected": "" ?>>AB</option>
          <option value="AB+" <?php echo ($pernikahan->golongandarah_pasangan == 'AB+') ? "selected": "" ?>>AB+</option>
          <option value="AB-" <?php echo ($pernikahan->golongandarah_pasangan == 'AB-') ? "selected": "" ?>>AB-</option>
          <option value="O" <?php echo ($pernikahan->golongandarah_pasangan == 'O') ? "selected": "" ?>>O</option>
          <option value="O+" <?php echo ($pernikahan->golongandarah_pasangan == 'O+') ? "selected": "" ?>>O+</option>
          <option value="O-" <?php echo ($pernikahan->golongandarah_pasangan == 'O-') ? "selected": "" ?>>O-</option>
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">{{$pernikahan->alamattinggal_pasangan}}</textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rt</label>
        <input type="text" name="rtrw[]" value="{{$pernikahan->rtrw_personal[1]}}" class="form-control" placeholder="Rt" required="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rw</label>
        <input type="text" name="rtrw[]" value="{{$pernikahan->rtrw_personal[1]}}" class="form-control" placeholder="Rw" required="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Provinsi</label>
        <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
          <option value="0" disable="true">=== Pilih Provinsi ===</option>
           @foreach ($provinces as $key => $value)
            <option value="{{$value->id}}" @if($value->id == $pernikahan->provinsi_pasangan) selected  @endif>{{ $value->name }}</option>
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
            $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($pernikahan->provinsi_pasangan);
          @endphp
          @foreach($kabupaten as $data)
           <option value="{{$data->id}}" @if($data->id == $pernikahan->kabkota_pasangan) selected  @endif> {{ $data->name }}</option>
              
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
            $kecamatan= app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($pernikahan->kabkota_pasangan);
          @endphp
          @foreach($kecamatan as $data)
            @if($data->id == $pernikahan->kecamatan_pasangan)
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
            $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($pernikahan->kecamatan_pasangan);
          @endphp
          @foreach($kelurahan as $data)
            @if($data->id == $pernikahan->kelurahan_pasangan)
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
        <label>Agama</label>
        <select class="form-control select2" name="agama" style="width: 100%;">
          <option value="">-- Pilih Agama --</option>
          <option value="Kristen" <?php echo ($pernikahan->agama_pasangan == 'Kristen') ? "selected": "" ?>>Kristen</option>
          <option value="Katolik" <?php echo ($pernikahan->agama_pasangan == 'Katolik') ? "selected": "" ?>>Katolik</option>
          <option value="Islam" <?php echo ($pernikahan->agama_pasangan == 'Islam') ? "selected": "" ?>>Islam</option>
          <option value="Budha" <?php echo ($pernikahan->agama_pasangan == 'Budha') ? "selected": "" ?>>Budha</option>
          <option value="Hindu" <?php echo ($pernikahan->agama_pasangan == 'Hindu') ? "selected": "" ?>>Hindu</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Status Perkawinan</label>
        <select class="form-control select2" name="sk" style="width: 100%;">
          <option value="">-- Pilih Status Perkawinan --</option>
           <option value="Menikah" <?php echo ($pernikahan->statusperkawinan_pasangan == 'Menikah') ? "selected": "" ?>>Menikah</option>
                <option value="Belum Menikah" <?php echo ($pernikahan->statusperkawinan_pasangan == 'Belum Menikah') ? "selected": "" ?>>Belum Menikah</option>
                <option value="Cerai" <?php echo ($pernikahan->statusperkawinan_pasangan == 'Cerai') ? "selected": "" ?>>Cerai</option>
                <option value="Duda/Janda" <?php echo ($pernikahan->statusperkawinan_pasangan == 'Duda/Janda') ? "selected": "" ?>>Duda/Janda</option>
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
          <input type="text" name="tsk" class="form-control home datepickerlight" value="{{$pernikahan->sejaktanggalstatuskawin_pasangan}}" placeholder="Sejak Tanggal">
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="form-group">
       <label>Kewarganegaraan</label><br>
        <label class="col-sm-3">
          <input type="radio" name="kewarganegaraan" class="minimal" value="WNA" <?php echo ($pernikahan->kewarganegaraan_pasangan == "WNA") ? "checked": "" ?>>WNA
        </label>
        <label class="col-sm-3">
          <input type="radio" name="kewarganegaraan" class="minimal" value="WNI" <?php echo ($pernikahan->kewarganegaraan_pasangan == "WNI") ? "checked": "" ?>>
          WNI
        </label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <br>
        <label>Status Personal</label>
        <select class="form-control select2" name="sp" style="width: 100%;">
          <option value="">-- Pilih Status Personal --</option>
          <option value="Aktif" <?php echo ($pernikahan->statuspersonal_pasangan == 'Aktif') ? "selected": "" ?>>Aktif</option>
          <option value="Non Aktif" <?php echo ($pernikahan->statuspersonal_pasangan == 'Non Aktif') ? "selected": "" ?>>Non Aktif</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <br>
        <label>Sejak Tanggal</label>
        <div class="input-group date">
          <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
          <input type="text" name="stp" class="form-control pull-right datepickerlight" value="{{$pernikahan->sejaktanggalstatuspersonal_pasangan}}" placeholder="Sejak Tanggal">
        </div>
      </div>
    </div> -->

    <div class="col-md-12">
      <div class="form-group">
        <label>Personal</label>
        <select class="form-control select2" name="caper1" id="myselection" style="width: 100%;">
          <option value="" >=== Pilih Personal ===</option>
          @foreach($personal as $data)
          <option value="{{$data->idpersonal}}" <?php echo($pernikahan->idpersonal == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Pasangan</label>
        <select class="form-control select2" name="caper2" id="myselection" style="width: 100%;">
          <option value="" >=== Pilih Pasangan ===</option>
          @foreach($personal as $data)
          <option value="{{$data->idpersonal}}" <?php echo($pernikahan->idpasangan == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>