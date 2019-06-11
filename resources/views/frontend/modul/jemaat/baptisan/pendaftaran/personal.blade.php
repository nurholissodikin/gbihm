<h3>Data Baptisan Air</h3>
  <hr></hr>
   <input type="hidden" name="idbrk" id="id_brk">
   <input type="hidden" name="id_ayahibubrk" id="id_ayahibubrk">
   <input type="hidden"  name="status" value="In Confirmation" class="form-control" >
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
          <select name="personal" class="form-control select2" id="personal_nama"  style="width: 100%" onchange="asaaa()"> 
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
          <input type="text"  name="nama_depan" id="namadepan_b" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Tengah</label>
          <input type="text"  name="nama_tengah" id="namatengah_b" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Belakang</label>
          <input type="text"   name="nama_belakang" id="namabelakang_b" class="form-control" readonly="">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text"  name="tempat_lahir" placeholder="Tempat Lahir" id="tempatlahir_b" class="form-control" readonly="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  type="text"  name="tanggal_lahir" id="tanggal_la" class="form-control pull-right"    readonly="">
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ayah</label>
          <select class="form-control select2" name="idayahper" id="id_baptisanayahpersonal" style="width: 100%;" class="ayahper">
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
          <select class="form-control select2" name="idibuper" style="width: 100%;" id="id_baptisanibupersonal" class="ibuper">
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
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Baptisan Air</label>
          <select class="form-control select2" name="baptisanair" id="baptisanair_brk" style="width: 100%;">
            <option value="">=== Pilih Baptisan Air ===</option>
            <option value="Internal(GBI Jl.Gatot Subroto)">Internal(GBI Jl.Gatot Subroto)</option>
            <option value="Eksternal(GBI Jl.Gatot Subroto)">Eksternal(GBI Jl.Gatot Subroto)</option>
          </select>
        </div>
      </div>
    </fieldset>
  
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>