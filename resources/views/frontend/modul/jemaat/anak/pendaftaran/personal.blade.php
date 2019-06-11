<h3>Data Penyerahan Anak</h3>
  <hr></hr>
   <input type="hidden" name="idbrk" id="id_brk">
   <input type="hidden" name="id_ayahibubrk" id="id_ayahibubrk">
   
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
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Depan</label>
          <input type="text"  name="nama_depan" id="namadepan_b" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Tengah</label>
          <input type="text"  name="nama_tengah" id="namatengah_b" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text"   name="nama_belakang" id="namabelakang_b" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text"  name="tempat_lahir" placeholder="Tempat Lahir" id="tempatlahir_b" class="form-control" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  type="text"  name="tanggal_lahir" id="tanggal_la" class="form-control pull-right" >
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
         <label>Jenis Kelamin</label><br>
         <label class="col-sm-3">
          <input type="radio" id="laki_p" name="jk"  value="L" > Laki-Laki
        </label>
        <label class="col-sm-3">
          <input type="radio" id="pere_p" name="jk" value="P" > 
          Perempuan
        </label>
      </div>
    </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Alamat</label>
          <textarea class="form-control" rows="3" name="alamat" id="alamat_la" placeholder="Alamat"></textarea>
        </div>
      </div>
    </fieldset>
    <fieldset>
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
    </fieldset>
    <fieldset>
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
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kabupaten</label>
          <select class="form-control select2 regencies" name="regencies" id="regencies" style="width: 100%">
            <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kecamatan</label>
          <select class="form-control select2" name="districts" id="districts" style="width: 100%">
            <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kelurahan</label>
          <select class="form-control select2" name="villages" id="villages" style="width: 100%">
            <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Kode Pos</label>
          <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Negara</label>
          <input type="text" name="negara" class="form-control" placeholder="Negara">
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
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
        <div class="col-md-10">
        <input name="namaayah_depan" type="text" id="namadepanayah_brk"  class="form-control ayah input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengahayah_brk" name="namaayah_tengah" type="text"  class="form-control ayah input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakangayah_brk" name="namaayah_belakang" type="text"  class="form-control ayah input-md">
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
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
        <div class="col-md-10">
        <input name="namaibu_depan" id="namadepanibu_brk" type="text"  class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input name="namaibu_tengah" type="text" id="namatengahibu_brk"  class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input name="namaibu_belakang" type="text" id="namabelakangibu_brk"  class="form-control ibu input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>