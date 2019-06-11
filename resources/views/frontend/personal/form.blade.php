  <br>
  <form enctype="multipart/form-data" id="informasi_umum">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label>No. ID</label>
              <input type="text" readonly="" name="idpersonal" value="{{$personal->idpersonal}}" class="form-control">
            </div>
          </div>
          <div class="col-md-3 pull-right">
            <div class="avatar-upload">
              <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="urlphoto" />
                <label for="imageUpload"></label>
              </div>
              <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url('{{asset('public/assets/foto/'.$personal->urlphoto.'')}}');"></div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label>No. KKJ</label>
              <input type="text" name="nokkj"  placeholder="No. KKJ" class="form-control" value="{{$personal->nokkj}}">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No.KTP</label>
              <input type="number" name="noktp" class="form-control" value="{{$personal->ktpid}}" placeholder="No. KTP" maxlength="20"  pattern=".{16,}" title="isi minimal 16 digit" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>(berlaku s/d)</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="berlaku" placeholder="Tanggal Berlaku" class="form-control datepickerpersonal pull-right" value="{{$personal->ktpberlakusd}}" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No Sim</label>
              <input type="number" name="nosim" class="form-control" placeholder="No. Sim" value="{{$personal->simid}}">
            </div>
          </div>
          <div class="col-md-4">
             <div class="form-group">
               <label>(berlaku s/d)</label>
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" name="berlakusim" placeholder="Tanggal Berlaku" class="form-control datepickerpersonal" value="{{$personal->simberlakusd}}" autocomplete="off">
                  </div>
             </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No. Pasport</label>
              <input type="number" name="nopass" class="form-control" placeholder="No. Pasport" value="{{$personal->passportid}}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>(berlaku s/d)</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                   <input type="text" name="berlakupass" placeholder="Tanggal Berlaku" class="form-control datepickerpersonal"  value="{{$personal->passportberlakusd}}" autocomplete="off">
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="{{$personal->namalengkap}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Depan (sesuai ktp)</label>
              <input type="text" name="namadep" placeholder="Nama Depan" class="form-control" value="{{$personal->namadepan}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Tengah (sesuai ktp)</label>
              <input type="text" name="namateng" placeholder="Nama Tengah" class="form-control" value="{{$personal->namatengah}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Belakang (sesuai ktp)</label>
              <input type="text" name="namabel" placeholder="Nama Belakang" class="form-control" value="{{$personal->namabelakang}}">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Panggilan</label>
              <input type="text" name="namapang" placeholder="Nama Panggilan" class="form-control" value="{{$personal->namapanggilan}}">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Awal</label>
              <input type="text" name="geawal" placeholder="Gelar Awal" class="form-control" value="{{$personal->gelarawal}}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Tengah</label>
              <input type="text" name="geteng" placeholder="Gelar Tengah" class="form-control" value="{{$personal->gelartengah}}">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Akhir</label>
              <input type="text" name="geakhir" placeholder="Gelar Akhir" class="form-control "value="{{$personal->gelarakhir}}">
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control" value="{{$personal->tempatlahir}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="tala" class="form-control datepickerpersonal" placeholder="Tanggal Lahir"  required="" value="{{$personal->tanggallahir}}" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-12">
             <label>Jenis Kelamin</label><br>
            <label class="col-sm-3">
              <input type="radio" name="jk" class="minimal" value="L" <?php echo ($personal->jeniskelamin == 'L') ? "checked": "" ?>> Laki-Laki
            </label>
            <label class="col-sm-3">
              <input type="radio" name="jk" class="minimal" value="P" <?php echo ($personal->jeniskelamin == 'P') ? "checked": "" ?>>
               Perempuan
            </label>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Golongan Darah</label>
              <select class="form-control select2" name="gol" style="width: 100%;">
                <option value="">-- Pilih Golongan Darah --</option>
                <option value="A" <?php echo ($personal->golongandarah == 'A') ? "selected": "" ?>>A</option>
                <option value="A+" <?php echo ($personal->golongandarah == 'A+') ? "selected": "" ?>>A+</option>
                <option value="A-" <?php echo ($personal->golongandarah == 'A-') ? "selected": "" ?>>A-</option>
                <option value="B" <?php echo ($personal->golongandarah == 'B') ? "selected": "" ?>>B</option>
                <option value="B+" <?php echo ($personal->golongandarah == 'B+') ? "selected": "" ?>>B+</option>
                <option value="B-" <?php echo ($personal->golongandarah == 'B-') ? "selected": "" ?>>B-</option>
                <option value="AB" <?php echo ($personal->golongandarah == 'AB') ? "selected": "" ?>>AB</option>
                <option value="AB+" <?php echo ($personal->golongandarah == 'AB+') ? "selected": "" ?>>AB+</option>
                <option value="AB-" <?php echo ($personal->golongandarah == 'AB-') ? "selected": "" ?>>AB-</option>
                <option value="O" <?php echo ($personal->golongandarah == 'O') ? "selected": "" ?>>O</option>
                <option value="O+" <?php echo ($personal->golongandarah == 'O+') ? "selected": "" ?>>O+</option>
                <option value="O-" <?php echo ($personal->golongandarah == 'O-') ? "selected": "" ?>>O-</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Agama</label>
              <select class="form-control select2" name="agama" style="width: 100%;">
                <option value="">-- Pilih Agama --</option>
                <option value="Kristen" <?php echo ($personal->agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                <option value="Katolik" <?php echo ($personal->agama == 'Katolik') ? "selected": "" ?>>Katolik</option>
                <option value="Islam" <?php echo ($personal->agama == 'Islam') ? "selected": "" ?>>Islam</option>
                <option value="Budha" <?php echo ($personal->agama == 'Budha') ? "selected": "" ?>>Budha</option>
                <option value="Hindu" <?php echo ($personal->agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Status Perkawinan</label>
              <select class="form-control select2" name="sk" id="belum" style="width: 100%;">
                <option value="">-- Pilih Status Perkawinan --</option>       
                <option value="Menikah" <?php echo ($personal->statusperkawinan == 'Menikah') ? "selected": "" ?>>Menikah</option>
                <option value="Belum Menikah" <?php echo ($personal->statusperkawinan == 'Belum Menikah') ? "selected": "" ?>>Belum Menikah</option>
                <option value="Cerai" <?php echo ($personal->statusperkawinan == 'Cerai') ? "selected": "" ?>>Cerai</option>
                <option value="Duda/Janda" <?php echo ($personal->statusperkawinan == 'Duda/Janda') ? "selected": "" ?>>Duda/Janda</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                 </div>
                <input type="text" name="tsk" class="form-control belum datepickerpersonal pull-right" placeholder="Sejak Tanggal"  value="{{$personal->sejaktanggalstatuskawin}}" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <label>Kewarganegaraan</label><br>
            <label class="col-sm-3">
              <input type="radio" name="kewarganegaraan" class="minimal" value="WNA" <?php echo ($personal->kewarganegaraan == "WNA") ? "checked": "" ?>> WNA
            </label>
            <label class="col-sm-3">
              <input type="radio" name="kewarganegaraan" class="minimal" value="WNI" <?php echo ($personal->kewarganegaraan == "WNI") ? "checked": "" ?>> WNI
            </label>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group"><br>
              <label>Status Personal</label>
              <select class="form-control select2" name="sp" style="width: 100%;">
                <option value="">-- Pilih Status Personal --</option>
                <option value="Aktif" <?php echo ($personal->statuspersonal == 'Aktif') ? "selected": "" ?>>Aktif</option>
                <option value="Non Aktif" <?php echo ($personal->statuspersonal == 'Non Aktif') ? "selected": "" ?>>Non Aktif</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group"><br>
              <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="stp" class="form-control datepickerpersonal pull-right" placeholder="Sejak Tanggal" value="{{$personal->sejaktanggalstatuspersonal}}" autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label>Catatan Personal</label>
              <textarea class="form-control" rows="3" name="caper" placeholder="Catatan Personal">
               <?php echo ($personal->catatanpersonal ); ?>
              </textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Upload KTP</label>
              <div class="input-group date">
                <input id="textinput" name="dokumen_ktp" type="file"  class="form-control">
                <span class="help-block"> </span>  
                <div class="input-group-addon">
                  <a  href="{{asset('public/assets/personal/dokumen_ktp/'.$personal->dokumen_ktp.'')}}" class="btn bg-navy btn-xs" target="_blank">{{$personal->dokumen_ktp}}</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Upload Dokumen</label>
                <input id="textinput" name="upload" type="file"  class="form-control">
            </div>
          </div>
        </div>
        <br>
        <div class="demo-button">
          <button  class="btn btn-block btn-primary  waves-effect" type="button" onclick="save_informasi_umum()">Save</button>
        </div>
  </form>  

              