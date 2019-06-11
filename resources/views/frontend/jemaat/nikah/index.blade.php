<br>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Nikah</h3>
  </div>
  <br>
  <form action="{{route('nikah.store')}}" enctype="multipart/form-data" method="post" id="formnikah">
    {{csrf_field()}}
    <input type="hidden" name="method_type">
    <input type="hidden" name="idper" id="id_dipen" value="{{$personal->idpersonal}}">
    <input type="hidden" name="idayahibupas" id="iapas_nik">
      <div class="col-md-12">      
        <div class="col-md-12">
          <div class="form-group">
            <label>No.Akta / Surat Nikah</label>
            <input type="text" name="noakta" id="no_nik" class="form-control" placeholder="No.Akta / Surat Nikah">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>No. KKJ</label>
            <input type="text" name="nokkj" class="form-control" placeholder="No KKJ" value="{{$personal->nokkj}}" readonly="">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Tempat Peneguhan Nikah</label>
            <input type="text" name="tempat" id="tempat_nik" class="form-control" placeholder="Tempat Peneguhan Nikah">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggal" class="form-control pull-right" placeholder="Tanggal" id="tg_nik">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nama Lengkap Pasangan (sesuai KTP)</label>
            <select class="form-control select2" name="idpas" style="width: 100%;" id="id_nikahpersonal" onchange="change_id_nikahpersonal()">
              <option value="" >=== Pilih Personal ===</option>
              @foreach($perso as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
          <div class="col-md-10">
            <input id="namapas_depan" name="namapas_depan" type="text"  class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label> 
          <div class="col-md-10">
            <input id="namapas_tengah" name="namapas_tengah" type="text"  class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label> 
          <div class="col-md-10">
            <input id="namapas_belakang" name="namapas_belakang" type="text"  class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TTL.  Pasangan</label> 
          <div class="col-md-5">
            <div class="form-group">
              <input id="tempatpas_lahir" type="text" name="tempatpas_lahir" placeholder="Tempat Lahir"  class="form-control" maxlength="20">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input id="tanggalpas_la" type="date" name="tanggalpas_lahir" class="form-control pull-right" placeholder="Tanggal Lahir"  required="">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nama Ayah (sesuai KTP)</label>
            <select class="form-control select2" name="idayahpas" style="width: 100%;" id="id_ayahnikahpersonal">
              <option value="" >=== Pilih Personal ===</option>
              @foreach($perso as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
          <div class="col-md-10">
            <input name="namaayahpas_depan" type="text" id="namapas_depanayah"  class="form-control ayahn input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label> 
          <div class="col-md-10">
            <input name="namaayahpas_tengah" type="text" id="namapas_tengahayah" class="form-control ayahn input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label> 
          <div class="col-md-10">
            <input name="namaayahpas_belakang" type="text" id="namapas_belakangayah" class="form-control ayahn input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nama Ibu (sesuai KTP)</label>
            <select class="form-control select2" name="idibupas" style="width: 100%;" id="id_ibunikahpersonal">
              <option value="" >=== Pilih Personal ===</option>
              @foreach($perso as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Depan</label> 
          <div class="col-md-10">
            <input name="namaibupas_depan" type="text" id="namapas_depanibu"  class="form-control ibun input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label> 
          <div class="col-md-10">
            <input name="namaibupas_tengah" type="text" id="namapas_tengahibu"  class="form-control ibun input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label> 
          <div class="col-md-10">
            <input name="namaibupas_belakang" type="text" id="namapas_belakangibu"  class="form-control ibun input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Dokumen</label>
            <input type="file" name="dokumen" class="form-control" >
          </div>
        </div>
      </div>
      <div class="demo-button">
        <button type="submit" id="btn-submit-nikah" class="btn btn-block btn-primary  waves-effect">Save</button>
      </div>
  </form>
</div>   
<br>
<br>

  

  <div id="myModala" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form action="" enctype="multipart/form-data" method="post" id="editdi">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="id_di" name="id" >
            <input type="hidden" class="form-control" id="per_di" name="idper" >
            <div class="form-group">
              <div class="col-sm-12">
                 <label>No.Akta / Surat Peny.Anak</label>
                 <input type="text" name="noakta" class="form-control" id="no_di" placeholder="No.Akta / Surat Peny.Anak">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Tanggal</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="tanggal" id="ta_di" class="form-control" placeholder="Tanggal">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Cabang</label>
                  <select class="form-control select2" name="cabang" id="idc_di" style="width: 100%;">
                    <option value="" >=== Pilih Cabang ===</option>
                    @foreach($cabran as $data)
                    <option value="{{$data->idcabangranting}}">{{$data->namacabang}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Pelayan Penyerahan Anak</label>
                  <select class="form-control select2" name="pelayan" id="idp_di" style="width: 100%;">
                    <option value="" >=== Pilih Pelayan ===</option>
                    @foreach($perso as $data)
                    <option value="{{$data->idpersonal}}">{{$data->namalengkap}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Dokumen</label>
                <input type="file" name="dokumen" class="form-control" id="dok_di">
              </div>
            </div>
            <div class="modal-footer">
              <br><br>
              <button type="submit" class="btn actionBtn" >
                <span class='glyphicon glyphicon-check'> Update</span>
              </button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
