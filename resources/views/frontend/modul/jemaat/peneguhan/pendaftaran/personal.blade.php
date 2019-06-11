<h3>Data Peneguhan Nikah</h3>
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
          <label>Nama Suami</label>
          <select class="form-control select2" name="idsuami" id="personal_suami" style="width: 100%;" onchange="suami_change()">
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
        <input name="namadepan_suami" type="text" id="namadepan_suami"  class="form-control suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengah_suami" name="namatengah_suami" type="text"  class="form-control suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakang_suami" name="namabelakang_suami" type="text"  class="form-control suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text"  name="tempatlahir_suami" placeholder="Tempat Lahir" id="tempatlahir_suami" class="form-control suami" >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  type="text"  name="tanggallahir_suami" id="tanggal_suami" class="form-control datepickerlight suami" autocomplete="off" >
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ayah</label>
          <select class="form-control select2" name="idayah_suami" id="id_ayah_suami" style="width: 100%;" >
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
        <input name="namaayah_depan_suami" type="text" id="namadepanayah_brk"  class="form-control ayah_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengah_ayah_suami" name="namaayah_tengah" type="text"  class="form-control ayah_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakang_ayah_suami" name="namaayah_belakang" type="text"  class="form-control ayah_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ibu</label>
          <select class="form-control select2" name="idibu_suami" style="width: 100%;" id="id_ibu_suami">
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
        <input name="namaibu_depan_suami" id="namadepanibu_brk" type="text"  class="form-control ibu_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input name="namaibu_tengah_suami" type="text" id="namatengahibu_brk"  class="form-control ibu_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input name="namaibu_belakang_suami" type="text" id="namabelakangibu_brk"  class="form-control ibu_suami input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Istri</label>
          <select class="form-control select2" name="idistri" id="personal_istri" style="width: 100%;" onchange="istri_change()">
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
        <input name="namadepan_istri" type="text" id="namadepan_istri"  class="form-control istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengah_istri" name="namatengah_istri" type="text"  class="form-control istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakang_istri" name="namabelakang_istri" type="text"  class="form-control istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tempat Lahir</label>
          <input type="text"  name="tempatlahir_istri" placeholder="Tempat Lahir" id="tempatlahir_istri"  class="form-control istri" autocomplete="off">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tanggal Lahir</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  type="text"  name="tanggallahir_istri"  id="tanggal_istri" class="form-control datepickerlight istri" autocomplete="off" >
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ayah</label>
          <select class="form-control select2" name="idayah_istri" id="id_ayah_istri" style="width: 100%;" >
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
        <input name="namaayah_depan_istri" type="text" id="namadepanayah_brk"  class="form-control ayah_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input id="namatengahayah_brk" name="namaayah_tengah_istri" type="text"  class="form-control ayah_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input id="namabelakangayah_brk" name="namaayah_belakang_istri" type="text"  class="form-control ayah_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Ibu</label>
          <select class="form-control select2" name="idibu_istri" style="width: 100%;" id="id_ibu_istri">
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
        <input name="namaibu_depan" id="namaibu_depan_istri" type="text"  class="form-control ibu_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label>
        <div class="col-md-10">
        <input name="namaibu_tengah_istri" type="text" id="namatengahibu_brk"  class="form-control ibu_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="form-group">
        <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label>  
        <div class="col-md-10">
        <input name="namaibu_belakang_istri" type="text" id="namabelakangibu_brk"  class="form-control ibu_istri input-md">
        <span class="help-block"> </span>  
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>No. Akta / Surat Nikah</label>
          <input type="text"  name="noakta" placeholder="No. Akta / Surat Nikah" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>No. KKJ</label>
          <input type="text"  name="nokkj" placeholder="No. KKJ" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tempat Peneguhan Nikah</label>
          <input type="text"  name="tempat" placeholder="Tempat Peneguhan Nikah" class="form-control" >
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tanggal</label>
          <input type="text"  name="tanggal" placeholder="Tanggal" class="form-control datepickerlight" autocomplete="off">
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Petugas Penerima</label>
          <select class="form-control select2" name="penerima" style="width: 100%">
            <option value="">=== Pilih Petugas Penerima ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>