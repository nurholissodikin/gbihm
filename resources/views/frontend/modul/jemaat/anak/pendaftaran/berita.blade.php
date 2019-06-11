  <h3>Berita Acara Pelaksanaan Baptisan Air</h3>
  <hr></hr>
   	<fieldset>
      <div class="col-md-12">
        <div class="form-group">
          <label>Tanggal</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input id="tgl_brk" type="text" name="tanggal" class="form-control">
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
            <option value="{{$data->idcabangranting}}">{{$data->namacabang}}</option>
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
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
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
            <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
             @endforeach
          </select>
        </div>
      </div>
    </fieldset>
 
	<ul class="list-inline pull-right">
		<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
		<li><button type="button" class="btn btn-primary btn-info-full next-step">Next</button></li>
	</ul>
