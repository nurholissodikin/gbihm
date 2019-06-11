<br>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Penyerahan Anak</h3>
  </div>
  <br>
  <form action="{{route('anak.store')}}" enctype="multipart/form-data" method="post" id="formanak">
    {{csrf_field()}}
    <input type="hidden" name="method_type">
    <input type="hidden" name="idper" value="{{$personal->idpersonal}}">
      <div class="col-md-12">      
        <div class="col-md-12">
          <div class="form-group">
            <label>No.Akta / Surat Penyerahan Anak</label>
            <input type="text" name="noakta" class="form-control" id="no_nak" placeholder="No.Akta / Surat Penyerahan Anak">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nama Anak</label>
            <select class="form-control select2" name="idanakpersonal" style="width: 100%;" id="id_anakpersonal" onchange="change_id_anakpersonal()">
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
            <input id="namaanak_depan" name="namaanak_depan" type="text"  class="form-control ayah input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Tengah</label> 
          <div class="col-md-10">
            <input id="namaanak_tengah" name="namaanak_tengah" type="text"  class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Belakang</label> 
          <div class="col-md-10">
            <input id="namaanak_belakang" name="namaanak_belakang" type="text"  class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-2" for="textinput">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</label> 
          <div class="col-md-10">
            <select class="form-control select2" name="jk_anak" style="width: 100%;" id="jk_anak" required="">
              <option value="" selected="true">- Pilih Jenis Kelamin -</option>
              <option value="L" >Laki-Laki</option>
              <option value="P" >Permepuan</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <br>
            <label>Tempat Lahir</label>
            <input id="tempatanak_lahir" type="text" name="tempatanak_lahir" placeholder="Tempat Lahir"  class="form-control" maxlength="20">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <br>
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input id="tanggalanak_la" type="text" name="tanggalanak_la" class="form-control pull-right" placeholder="Tanggal Lahir"  required="">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Dokumen</label>
            <input type="file" name="dokumen" class="form-control" >
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <h4 class="box-title">  <br>Pelaksanaan Penyerahan Anak<hr></h4>
            <label>Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggalpe" class="form-control pull-right" id="tg_nak" placeholder="Tanggal">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Cabang</label>
            <select class="form-control select2" name="idanakcab" id="cab_nak" style="width: 100%;">
              <option value="" >=== Pilih Cabang / Ranting ===</option>
              @foreach($cabran as $data)
              <option value="{{$data->idcabangranting}}">{{$data->namacabang}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Pelayan Penyerahan Anak</label>
            <select class="form-control select2" name="idpelayananak" id="pe_nak" style="width: 100%;">
              <option value="" >=== Personal ===</option>
              @foreach($perso as $data)
              <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
               @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="demo-button">
        <button type="submit" id="btn-submit-anak" class="btn btn-block btn-primary waves-effect">Save</button>
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
