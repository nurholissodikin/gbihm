  <h3>Berita Acara Pelaksanaan Penyerahan Anak</h3>
  <hr></hr>
   	<fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tanggal</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  value="{{$anak->tanggal}}" type="text" name="tanggal" class="form-control datepickerlight">
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Cabang</label>
          <select class="form-control select2" name="idcabangranting" id="cab_brk" style="width: 100%;">
            <option value="" >=== Pilih Cabang ===</option>
            @foreach($cabang as $data)
            <option value="{{$data->idcabangranting}}" <?php echo($anak->idcabangranting == $data->idcabangranting) ? "selected" : "" ?>>{{$data->namacabang}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Pelayan Penyerahan Anak</label>
          <select class="form-control select2" name="idpelayan" id="idpel_brk" style="width: 100%;">
            <option value="" >=== Pilih Pelayan ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($anak->idpelayan == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
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
            <option value="{{$data->idpersonal}}" <?php echo($anak->petugas == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </fieldset>
  <ul class="list-inline pull-right">
		<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
		<li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
	</ul>
