<br>
  <form enctype="multipart/form-data">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label>No. ID</label>
              <input type="text" readonly="" name="idpersonal" value="{{$personal->idpersonal}}" class="form-control">
            </div>
          </div>
          <div class="col-md-3 pull-right">
            <div class="avatar-upload">
              <div class="avatar-preview">
                <div id="imagePreview" readonly style="background-image: url('{{asset('public/assets/foto/'.$personal->urlphoto.'')}}');"></div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label>No. KKJ</label>
              <input type="text" name="nokkj"  class="form-control" value="{{$personal->nokkj}}" readonly="">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No.KTP</label>
              <input type="text" name="noktp" class="form-control" value="{{$personal->ktpid}}"  maxlength="20"  pattern=".{16,}" title="isi minimal 16 digit" readonly="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>(berlaku s/d)</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="berlaku" class="form-control pull-right" readonly="" value="{{$personal->ktpberlakusd}}">
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No Sim</label>
              <input type="text" name="nosim" class="form-control" readonly="" value="{{$personal->simid}}">
            </div>
          </div>
          <div class="col-md-4">
             <div class="form-group">
               <label>(berlaku s/d)</label>
                  <div class="input-group date">
                     <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                     </div>
                     <input type="text" name="berlakusim" readonly="" class="form-control pull-right" value="{{$personal->simberlakusd}}">
                  </div>
             </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label>No. Pasport</label>
              <input type="text" name="nopass" class="form-control" readonly value="{{$personal->passportid}}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>(berlaku s/d)</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                  </div>
                   <input type="text" name="berlakupass" readonly="" class="form-control pull-right"  value="{{$personal->passportberlakusd}}">
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" readonly="" class="form-control" value="{{$personal->namalengkap}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Depan (sesuai ktp)</label>
              <input type="text" name="namadep" readonly="" class="form-control" value="{{$personal->namadepan}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Tengah (sesuai ktp)</label>
              <input type="text" name="namateng" readonly="" class="form-control" value="{{$personal->namatengah}}">
            </div>
          </div> 
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Belakang (sesuai ktp)</label>
              <input type="text" name="namabel" readonly="" class="form-control" value="{{$personal->namabelakang}}">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Nama Panggilan</label>
              <input type="text" name="namapang" readonly="" class="form-control" value="{{$personal->namapanggilan}}">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Awal</label>
              <input type="text" name="geawal" readonly="" class="form-control" value="{{$personal->gelarawal}}">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Tengah</label>
              <input type="text" name="geteng" readonly="" class="form-control" value="{{$personal->gelartengah}}">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Gelar Akhir</label>
              <input type="text" name="geakhir" readonly="" class="form-control "value="{{$personal->gelarakhir}}">
            </div>
          </div> 
          <div class="col-md-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tela" readonly="" class="form-control" value="{{$personal->tempatlahir}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="tala" class="form-control pull-right" readonly=""  value="{{$personal->tanggallahir}}">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
             <label>Jenis Kelamin</label><br>       
              <input type="text" name="jk" readonly="" class="form-control" value="{{$personal->jeniskelamin}}">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Golongan Darah</label>
              <input type="text" name="gol" readonly="" class="form-control" value="{{$personal->golongandarah}}">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <label>Agama</label>
              <input type="text" name="agama" readonly="" class="form-control" value="{{$personal->agama}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Status Perkawinan</label>
              <input type="text" name="gol" readonly="" class="form-control" value="{{$personal->statusperkawinan}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
                 </div>
                <input type="text" name="tsk" class="form-control belum pull-right"  readonly="" value="{{$personal->sejaktanggalstatuskawin}}">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Kewarganegaraan</label>
              <input type="text" name="kewarganegaraan" readonly="" class="form-control" value="{{$personal->kewarganegaraan}}">
            </div>
          </div>
        </div>
        <div class="col-md-12">    
          <div class="col-md-6">
            <div class="form-group">
              <label>Status Personal</label>
              <input type="text" name="kewarganegaraan" readonly="" class="form-control" value="{{$personal->statuspersonal}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sejak Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="stp" class="form-control pull-right" readonly="" value="{{$personal->sejaktanggalstatuspersonal}}">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label>Catatan Personal</label>
              <textarea class="form-control" rows="3" name="caper" readonly="">
               <?php echo ($personal->catatanpersonal ); ?>
              </textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Upload Dokumen</label>
              <input type="text" name="upload" readonly="" class="form-control" value="{{$personal->dokumen}}">

            </div>
          </div>
        </div>
        <br>
  </form>  

              