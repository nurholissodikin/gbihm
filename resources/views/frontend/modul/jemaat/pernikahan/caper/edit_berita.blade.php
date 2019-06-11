  <h3>Berita Acara Pelaksanaan Pernikahan</h3>
  <hr></hr>
   	<fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tanggal</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tanggal" class="form-control datepickerlight" value="{{$pernikahan->tanggal}}">
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Cabang</label>
          <select class="form-control select2" name="idcabangranting" style="width: 100%;">
            <option value="" >=== Pilih Cabang ===</option>
            @foreach($cabang as $data)
            <option value="{{$data->idcabangranting}}" <?php echo($pernikahan->idcabangranting == $data->idcabangranting) ? "selected" : "" ?>>{{$data->namacabang}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Pelayan Penyerahan Anak</label>
          <select class="form-control select2" name="idpelayan"  style="width: 100%;">
            <option value="" >=== Pilih Pelayan ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($pernikahan->idpelayan == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Petugas Penyerahan Anak</label>
          <select class="form-control select2" name="petugas"  style="width: 100%;">
            <option value="" >=== Pilih Petugas ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($pernikahan->petugas == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
 
	<ul class="list-inline pull-right">
		<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
		<li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
	</ul>
