<h3>Data Penyerahan Anak</h3>
  <hr></hr>
   <input type="hidden" name="idbrk" id="id_brk">
   <input type="hidden" name="idayahibu" value="{{$anak->ayah_ibu}}">
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
        <label for="textinput">No. ID</label>  
        <input id="textinput" name="idper" id="baper_id" type="text"  readonly="" class="form-control input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
     <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Lengkap (sesuai KTP)</label>
          <select name="personalanak" class="form-control select2" id="personal_nama"  style="width: 100%" onchange="asaaa()"> 
            <option value="">== Pilih Personal ==</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($anak->idpersonalanak == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Depan</label>
          <input type="text"  name="nama_depan" id="namadepan_b" value="{{$anak->namadepan_anak}}" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Tengah</label>
          <input type="text"  name="nama_tengah" id="namatengah_b" value="{{$anak->namatengah_anak}}" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text"   name="nama_belakang" id="namabelakang_b" value="{{$anak->namatengah_anak}}" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text"  name="tempat_lahir" placeholder="Tempat Lahir" value="{{$anak->tempatlahir_anak}}" id="tempatlahir_b" class="form-control" readonly="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  type="text"  name="tanggal_lahir" id="tanggal_la" class="form-control pull-right" value="{{$anak->tanggallahir_anak}}" readonly="">
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
         <label>Jenis Kelamin</label><br>
         <label class="col-sm-3">
          <input type="radio" name="jk" class="minimal" value="L" <?php echo($anak->jeniskelamin_anak=='L') ? "checked" : "" ?> >Laki-Laki
        </label>
        <label class="col-sm-3">
          <input type="radio" name="jk" class="minimal" value="P" <?php echo($anak->jeniskelamin_anak=='P') ? "checked" : "" ?> >
          Perempuan
        </label>
      </div>
    </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">{{$anak->alamattinggal_anak}}</textarea>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Rt</label>
          <input type="text" name="rtrw[]" class="form-control" placeholder="Rt" value="{{$anak->rtrw_anak[2]}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Rw</label>
          <input type="text" name="rtrw[]" class="form-control" placeholder="Rw" value="{{$anak->rtrw_anak[6]}}">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Provinsi</label>
          <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
            <option value="0" disable="true">=== Pilih Provinsi ===</option>
            @foreach ($provinces as $key => $value)
            <option value="{{$value->id}}" @if($value->id == $anak->provinsi_anak) selected  @endif>{{ $value->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kabupaten </label>
          <select class="form-control select2" name="regencies" id="regencies" style="width: 100%;">
            <option value="" disable="true">=== Pilih Kabupaten/Kota ===</option>
            @php
              $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($anak->provinsi_anak);
            @endphp
            @foreach($kabupaten as $data)
             <option value="{{$data->id}}" @if($data->id == $anak->kabkota_anak) selected  @endif> {{ $data->name }}</option>
                
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kecamatan</label>
          <select class="form-control select2" name="districts" id="districts" style="width: 100%;">
            <option value="" disable="true">=== Pilih Kecamatan ===</option>
            @php
              $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($anak->kabkota_anak);
            @endphp
            @foreach($kecamatan as $data)
              @if($data->id == $anak->kecamatan_anak)
                <option value="{{$data->id}}" selected>{{$data->name}}</option>
              @else
                <option value="{{$data->id}}">{{$data->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kelurahan</label>
          <select class="form-control select2" name="villages" id="villages" style="width: 100%;">
            <option value="" disable="true">=== Pilih Kelurahan ===</option>
            @php
              $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($anak->kecamatan_anak);
            @endphp
            @foreach($kelurahan as $data)
              @if($data->id == $anak->kelurahan_anak)
                <option value="{{$data->id}}" selected>{{$data->name}}</option>
              @else
                <option value="{{$data->id}}">{{$data->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kode Pos</label>
          <input type="text" name="kodepos" class="form-control" value="{{$anak->kodepos_anak}}" placeholder="Kode Pos">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Negara</label>
          <input type="text" name="negara" class="form-control" placeholder="Negara" value="{{$anak->negara}}">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ayah</label>
          <select class="form-control select2" name="idayahper" id="id_anakayahpersonal" style="width: 100%;" class="ayahper">
            <option value="">=== Pilih Personal ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($anak->idayahper == $data->idpersonal) ? "selected" :"" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
        <div class="col-md-10">
        <input name="namaayah_depan" type="text" id="namadepanayah_brk" value="{{$anak->nm_depan_ayah}}" class="form-control ayah input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengahayah_brk" name="namaayah_tengah" type="text" value="{{$anak->nm_tengah_ayah}}"  class="form-control ayah input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakangayah_brk" name="namaayah_belakang" type="text" value="{{$anak->nm_belakang_ayah}}"  class="form-control ayah input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ibu</label>
          <select class="form-control select2" name="idibuper" style="width: 100%;" id="id_anakibupersonal" class="ibuper">
            <option value="">=== Pilih Personal ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($anak->idibuper == $data->idpersonal) ? "selected" :"" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
        <div class="col-md-10">
        <input name="namaibu_depan" id="namadepanibu_brk" type="text" value="{{$anak->nm_depan_ibu}}"  class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input name="namaibu_tengah" type="text" id="namatengahibu_brk" value="{{$anak->nm_tengah_ibu}}" class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input name="namaibu_belakang" type="text" id="namabelakangibu_brk" value="{{$anak->nm_belakang_ibu}}"  class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>