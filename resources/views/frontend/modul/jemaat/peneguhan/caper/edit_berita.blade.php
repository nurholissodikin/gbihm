  <h3>Berita Acara Pelaksanaan Peneguhan Nikah</h3>
  <hr></hr>
   	<fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tanggal</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_brk" type="text" value="{{$peneguhan->tanggal}}" name="tanggal" class="form-control">
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
            <option value="{{$data->idcabangranting}}" <?php echo($peneguhan->idcabangranting == $data->idcabangranting) ? "selected" : "" ?>>{{$data->namacabang}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
    <fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Pelayan Peneguhan Nikah</label>
          <select class="form-control select2" name="idpelayan" id="idpel_brk" style="width: 100%;">
            <option value="" >=== Pilih Pelayan ===</option>
            @foreach($personal as $data)
            <option value="{{$data->idpersonal}}" <?php echo($peneguhan->idpelayan == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
  </form>    
	<ul class="list-inline pull-right">
		<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
		<li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
	</ul>
