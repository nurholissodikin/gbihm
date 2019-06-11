  <h3>Dokumen</h3>
  <hr></hr>

  <fieldset>    
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Akta Kelahiran</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="d_aktakelahiran_brk" name="d_akta" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_aktakelahiran/'.$anak->d_aktakelahiran.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_aktakelahiran}}</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </fieldset>
  <fieldset>  <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">KTP Ayah</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_ktp_ayah" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_ktp_ayah/'.$anak->d_ktp_ayah.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_ktp_ayah}}</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">KTP Ibu</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_ktp_ibu" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_ktp_ibu/'.$anak->d_ktp_ibu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_ktp_ibu}}</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </fieldset>
  <fieldset> <br>   
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Kartu Keluarga Jemaat (KKJ)</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_kkj" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_kkj/'.$anak->d_kkj.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_kkj}}</a>
  				</div>
  			</div> 
  			<span class="help-block"> </span>  
  		</div>
  	</div>
  </fieldset>
  <fieldset>    
  	<div class="form-group">
  		<br>
  		<label class="col-md-4 control-label" for="textinput">Pasfoto Berwarna (3 x 4) 2 Lembar</label>  
  		<div class="col-md-3">
  			<div class="avatar-upload">
  				<div class="avatar-edit">
  					<input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" name="d_foto1" />
  					<label for="imageUpload2"></label>
  				</div>
  				<div class="avatar-preview">
  					<div id="imagePreviewb" style="background-image: url('{{asset('public/assets/jemaat/anak/d_foto1/'.$anak->d_foto1.'')}}');">
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-3">
  			<div class="avatar-upload">
  				<div class="avatar-edit">
  					<input type='file' id="imageUpload4" accept=".png, .jpg, .jpeg" name="d_foto2" />
  					<label for="imageUpload4"></label>
  				</div>
  				<div class="avatar-preview">
  					<div id="imagePreviewd" style="background-image: url('{{asset('public/assets/jemaat/anak/d_foto2/'.$anak->d_foto2.'')}}');">
  					</div>
  				</div>
  			</div>   
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Akta Perkawinan Ayah dan Ibu</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_kawin_ortu" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_kawin_ortu/'.$anak->d_kawin_ortu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_kawin_ortu}}</a>
  				</div>
  			</div> 
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Akta Perceraian (Jika Orang Tua Bercerai)</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_perceraian" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_perceraian/'.$anak->d_perceraian.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_perceraian}}</a>
  				</div>
  			</div> 
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Surat Pernyataan Orang Tua (Jika hanya salah satu orang tua)</label>  
  		<div class="col-md-8	">
  			<div class="input-group date">
  				<input id="textinput" name="d_sp_ortu" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_sp_ortu/'.$anak->d_sp_ortu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_sp_ortu}}</a>
  				</div>
  			</div>  
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">KTP Saksi 1</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_saksi1" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_saksi1/'.$anak->d_saksi1.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_saksi1}}</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">KTP Saksi 2</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_saksi2" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>  
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_saksi2/'.$anak->d_saksi2.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_saksi2}}</a>
  				</div>
  			</div>  
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Tanda Terima Dokumen Pendaftaran Penyerahan Anak</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_ttd_anak" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_ttd_anak/'.$anak->d_ttd_anak.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_ttd_anak}}</a>
  				</div>
  			</div> 
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Berita Acara Pelaksanaan Penyerahan Anak</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_berita" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_berita/'.$anak->d_berita.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_berita}}</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Pendaftaran Penyerahan Anak</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_pendaftaran" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_pendaftaran/'.$anak->d_pendaftaran.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_pendaftaran}}</a>
  				</div>
  			</div>  
  		</div>
  	</div>
  </fieldset>
  <fieldset>    <br>
  	<div class="form-group">
  		<label class="col-md-4 control-label" for="textinput">Dokumen Lain</label>  
  		<div class="col-md-8">
  			<div class="input-group date">
  				<input id="textinput" name="d_lain" type="file"  class="form-control input-md">
  				<span class="help-block"> </span>
  				<div class="input-group-addon">
  					<a  href="{{asset('public/assets/jemaat/anak/d_lain/'.$anak->d_lain.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$anak->d_lain}}</a>
  				</div>
  			</div>  
  		</div>
  	</div>
  </fieldset>
  <fieldset><br>
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Yang menyatakan</label>
          <div class="col-md-8">
          	<select name="menyatakan" class="form-control select2"  style="width: 100%"> 
          		<option value="">== Pilih Personal ==</option>
          		@foreach($personal as $data)
          		<option value="{{$data->idpersonal}}" <?php echo($anak->idpersonal == $data->idpersonal)? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
          		@endforeach
          	</select>
          </div>
        </div>
    </fieldset>
    <fieldset><br>
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Petugas Penerima</label>
          <div class="col-md-8">
          	<select name="penerima" class="form-control select2"  style="width: 100%"> 
          		<option value="">== Pilih Personal ==</option>
          		@foreach($personal as $data)
          		<option value="{{$data->idpersonal}}" <?php echo($anak->penerima == $data->idpersonal)? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
          		@endforeach
          	</select>
          </div>
        </div>
    </fieldset>
    <fieldset><br>
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Verifikasi</label>
          <div class="col-md-8">
          	<select name="verifikasi" class="form-control select2"  style="width: 100%"> 
          		<option value="">== Pilih Personal ==</option>
          		@foreach($personal as $data)
          		<option value="{{$data->idpersonal}}" <?php echo($anak->verifikasi == $data->idpersonal)? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
          		@endforeach
          	</select>
          </div>
        </div>
    </fieldset>
    <fieldset><br>
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Validasi</label>
          <div class="col-md-8">
          	<select name="validasi" class="form-control select2"  style="width: 100%"> 
          		<option value="">== Pilih Personal ==</option>
          		@foreach($personal as $data)
          		<option value="{{$data->idpersonal}}" <?php echo($anak->validasi == $data->idpersonal)? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
          		@endforeach
          	</select>
          </div>
        </div>
    </fieldset><br>
  <ul class="list-inline pull-right">
  	<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
  	<li><button type="button" class="btn btn-primary next-step">Next</button></li>
  </ul>

