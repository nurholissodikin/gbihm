
  <br>
  <div class="col-md-12">      
    <div class="col-md-12">
      <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" rows="3" name="alamat" readonly="">
         <?php echo ($personal->alamattinggal); ?>
        </textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rt</label>
        <input type="text" name="rt" class="form-control" readonly="" value="{{$personal->rtrw}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Rw</label>
        <input type="text" name="rw" class="form-control" readonly="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Provinsi</label>
        <input type="text" name="a" class="form-control" readonly="" value="{{$personal->provinsia['name']}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Kabupaten / Kota</label>
        <input type="text" name="b" class="form-control" readonly="" value="{{$personal->kabkotaa['name']}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Kecamatan</label>
        <input type="text" name="c" class="form-control" readonly="" value="{{$personal->kecamatana['name']}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Kelurahan</label>
        <input type="text" name="d" class="form-control" readonly="" value="{{$personal->kelurahana['name']}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Kode Pos</label>
        <input type="text" name="kodepos" class="form-control" readonly="" value="{{$personal->kodepos}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Google Map Address</label>
        <input type="text" name="google" class="form-control" readonly="" value="{{$personal->googlemapadd}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" class="form-control" readonly="" value="{{$personal->latitude}}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" class="form-control" readonly="" value="{{$personal->longitude}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>No. Telepon</label>
        <input type="number" name="notelp" class="form-control" readonly="" value="{{$personal->notelp}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>No. HP</label>
        <input type="number" name="nohp" class="form-control" readonly="" value="{{$personal->nohp}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
       <label>WhatsApp</label>
        <input type="text" class="form-control" name="wa" readonly="" id="input" value="{{$personal->whatsapp}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" readonly="" value="{{$personal->email}}"> 
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Facebook</label>
        <input type="text" name="fb" class="form-control" readonly="" value="{{$personal->facebook}}">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Twitter</label>
        <input type="text" name="twit" class="form-control" readonly="" value="{{$personal->twitter}}">
      </div>
    </div>
  </div>
    