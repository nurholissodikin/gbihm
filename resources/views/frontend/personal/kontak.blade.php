 <form  action="{{route('personal.update',$personal->idpersonal)}}" enctype="multipart/form-data" method="post" id="formko">
         <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br>
  <div class="col-md-12">      
    <div class="col-md-12">
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">
         <?php echo ($personal->alamattinggal); ?>
        </textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rt</label>
        <input type="number" name="rtrw[]" class="form-control" placeholder="Rt" value="{{$personal->rtrw[0]}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rw</label>
        <input type="number" name="rtrw[]" class="form-control" value="{{$personal->rtrw[1]}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Provinsi</label>
        <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
          <option value="0" disable="true">=== Pilih Provinsi ===</option>
           @foreach ($provinces as $key => $value)
            <option value="{{$value->id}}" @if($value->id == $personal->provinsi) selected  @endif>{{ $value->name }}</option>
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
            $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($personal->provinsi);
          @endphp
          @foreach($kabupaten as $data)
           <option value="{{$data->id}}" @if($data->id == $personal->kabkota) selected  @endif> {{ $data->name }}</option>
              
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
            $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($personal->kabkota);
          @endphp
          @foreach($kecamatan as $data)
            @if($data->id == $personal->kecamatan)
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
            $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($personal->kecamatan);
          @endphp
          @foreach($kelurahan as $data)
            @if($data->id == $personal->kelurahan)
              <option value="{{$data->id}}" selected>{{$data->name}}</option>
            @else
              <option value="{{$data->id}}">{{$data->name}}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Kode Pos</label>
        <input type="number" name="kodepos" class="form-control" placeholder="Kode Pos" value="{{$personal->kodepos}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Google Map Address</label>
        <input type="text" name="google" class="form-control" placeholder="Google Map Address" value="{{$personal->googlemapadd}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{$personal->latitude}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{$personal->longitude}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>No. Telepon</label>
        <input type="number" name="notelp" class="form-control" placeholder="No. Telepon" value="{{$personal->notelp}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>No. HP</label>
        <input type="number" name="nohp" class="form-control" placeholder="No. HP" value="{{$personal->nohp}}">
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
       <label>WhatsApp</label>
       <br>
       <input type="checkbox" name="sama"  onclick="FillBilling (this.form)"> Sama dengan nomor handphone
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <br>
        <input type="text" class="form-control" name="wa" placeholder="WhatsApp" id="input" value="{{$personal->whatsapp}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{$personal->email}}"> 
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Facebook</label>
        <input type="text" name="fb" class="form-control" placeholder="Facebook" value="{{$personal->facebook}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Twitter</label>
        <input type="text" name="twit" class="form-control" placeholder="Twitter" value="{{$personal->twitter}}">
      </div>
    </div>
  </div>
  <div class="demo-button">
    <button type="submit" class="btn btn-block btn-primary  waves-effect" >Save</button>
  </div>
</form>
    