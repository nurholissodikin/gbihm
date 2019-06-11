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
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_aktakelahiran/'.$pernikahan->d_aktakelahiran.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_aktakelahiran}}</a>
            </div>
          </div> 
			  </div>
			</div>
    </fieldset>
    <fieldset> <br>   
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Ktp / Passport / ID Lain</label>  
			  <div class="col-md-8">
          <div class="input-group date">
            <input id="textinput" name="d_ktp" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp/'.$pernikahan->d_ktp.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_ktp}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset> <br>   
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Surat Pengantar dari Kelurahan (PM-1)</label>  
			  <div class="col-md-8	"> 
          <div class="input-group date">
            <input id="textinput" name="d_sp_kelurahan" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_kelurahan/'.$pernikahan->d_sp_kelurahan.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sp_kelurahan}}</a>
            </div>
          </div> 
			  </div>
			</div>
    </fieldset>
    <fieldset>  <br>  
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Surat Keterangan Untuk Nikah (N-1)</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sk_nikah" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sk_nikah/'.$pernikahan->d_sk_nikah.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sk_nikah}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>   <br> 
    	<div class="form-group">
    		<label class="col-md-4 control-label" for="textinput">Surat Keterangan Tentang Orang Tua (N-4)</label>  
    		<div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sk_ortu" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sk_ortu/'.$pernikahan->d_sk_ortu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sk_ortu}}</a>
            </div>
          </div>  
    		</div>
    	</div>
    </fieldset> 
    <fieldset>   <br> 
    	<div class="form-group">
    		<label class="col-md-4 control-label" for="textinput">Surat Pernyataan Belum Menikah</label>  
    		<div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sp_belummenikah" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_belummenikah/'.$pernikahan->d_sp_belummenikah.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sp_belummenikah}}</a>
            </div>
          </div>  
    		</div>
    	</div>
    </fieldset>   
    <fieldset>   <br> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Kartu Keluarga (KK)</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_kk" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_kk/'.$pernikahan->d_kk.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_kk}}</a>
            </div>
          </div>   
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">KTP / Akta Kematian Ayah</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_ktp_ayah" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp_ayah/'.$pernikahan->d_ktp_ayah.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_ktp_ayah}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">KTP / Akta Kematian Ibu</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_ktp_ibu" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_ktp_ibu/'.$pernikahan->d_ktp_ibu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_ktp_ibu}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Surat Persetujuan Ayah + Ibu</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sp_ortu" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sp_ortu/'.$pernikahan->d_sp_ortu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sp_ortu}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Akta Perceraian Ayah - Ibu</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_perceraian_ortu" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_perceraian_ortu/'.$pernikahan->d_perceraian_ortu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_perceraian_ortu}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Surat Baptisan Selam</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_baptisan" type="file"  class="form-control input-md">
            <span class="help-block"> </span>
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_baptisan/'.$pernikahan->d_baptisan.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_baptisan}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Kartu Keluarga Jemaat (KKJ)</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_kkj" type="file"  class="form-control input-md">
            <span class="help-block"> </span>  
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_kkj/'.$pernikahan->d_kkj.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_kkj}}</a>
            </div>
          </div>
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Sertifikat KOM 100</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sertifikat_kom" type="file"  class="form-control input-md">
            <span class="help-block"> </span>  
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sertifikat_kom/'.$pernikahan->d_sertifikat_kom.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sertifikat_kom}}</a>
            </div>
          </div>
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Sertifikat BPN</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_sertifikat_bpn" type="file"  class="form-control input-md">
            <span class="help-block"> </span>  
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_sertifikat_bpn/'.$pernikahan->d_sertifikat_bpn.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_sertifikat_bpn}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
     <fieldset>   <br> 
      <div class="form-group">
        <br>
        <label class="col-md-4 control-label" for="textinput">Pasfoto Bersama Berwarna Uk. 4x6 (3 lembar)</label>  
        <div class="col-md-2">
          <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" name="d_foto1" />
              <label for="imageUpload2"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreviewa" style="background-image: url('{{asset('public/assets/jemaat/pernikahan/d_foto1/'.$pernikahan->foto1.'')}}');">
              </div>
           </div>
          </div>
         </div>
         <div class="col-md-2">
           <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload3" accept=".png, .jpg, .jpeg" name="d_foto2" />
              <label for="imageUpload3"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreviewb" style="background-image: url('{{asset('public/assets/jemaat/pernikahan/d_foto2/'.$pernikahan->foto2.'')}}');">
              </div>
           </div>
          </div>   
        </div>
        <div class="col-md-2">
           <div class="avatar-upload">
            <div class="avatar-edit">
              <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="d_foto3" value="{{$pernikahan->d_foto3}}" />
              <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
              <div id="imagePreview" style="background-image: url('{{asset('public/assets/jemaat/pernikahan/d_foto3/'.$pernikahan->foto3.'')}}');">
              </div>
           </div>
          </div>   
        </div>
      </div>
    </fieldset>
    <fieldset>    
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">KTP Saksi 1</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_saksi1" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_saksi1/'.$pernikahan->d_saksi1.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_saksi1}}</a>
            </div>
          </div>
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">KTP Saksi 2</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_saksi2" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_saksi2/'.$pernikahan->d_saksi2.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_saksi2}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Akta Perceraian / Kematian Pasangan Terdahulu</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_pasangan_dulu" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_pasangan_dulu/'.$pernikahan->d_pasangan_dulu.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_pasangan_dulu}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>   <br> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Laporan Konseling Pranikah</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_konseling" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_konseling/'.$pernikahan->d_konseling.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_konseling}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Berita Acara Pelaksanaan Pemberkatan Nikah</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_berita" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_berita/'.$pernikahan->d_berita.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_berita}}</a>
            </div>
          </div>  
			  </div>
			</div>
    </fieldset>
    <fieldset>    <br>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Dokumen Lain</label>  
			  <div class="col-md-8	">
          <div class="input-group date">
            <input id="textinput" name="d_lain" type="file"  class="form-control input-md">
            <span class="help-block"> </span>    
            <div class="input-group-addon">
              <a  href="{{asset('public/assets/jemaat/pernikahan/d_lain/'.$pernikahan->d_lain.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$pernikahan->d_lain}}</a>
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
          		<option value="{{$data->idpersonal}}" <?php echo ($pernikahan->menyatakan == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
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
          		<option value="{{$data->idpersonal}}" <?php echo ($pernikahan->penerima == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
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
          		<option value="{{$data->idpersonal}}" <?php echo ($pernikahan->verifikasi == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
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
          		<option value="{{$data->idpersonal}}" <?php echo ($pernikahan->validasi == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
          		@endforeach
          	</select>
          </div>
        </div>
    </fieldset><br>
    <ul class="list-inline pull-right">
      <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
      <li><button type="button" class="btn btn-primary next-step">Next</button></li>
    </ul>

    