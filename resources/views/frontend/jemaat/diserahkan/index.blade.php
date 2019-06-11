<br>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Diserahkan</h3>
  </div>
  <br>
  <form action="{{route('diserahkan.store')}}" enctype="multipart/form-data" method="post" id="formdi">
    {{csrf_field()}}
    <input type="hidden" name="method_type">
    <input type="hidden" name="idper" id="id_dipen" value="{{$personal->idpersonal}}">
      <div class="col-md-12">      
        <div class="col-md-12">
          <div class="form-group">
            <label>No.Akta / Surat Peny.Anak</label>
            <input type="text" name="noakta" id="no_dis" class="form-control" placeholder="No.Akta / Surat Peny.Anak">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Tanggal</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="tanggal" class="form-control datepickerlight" autocomplete="off" placeholder="Tanggal" id="tg_dis">
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Cabang</label>
            <select class="form-control select2" name="cabang" id="cab_dis" style="width: 100%;">
              <option value="" >=== Pilih Cabang ===</option>
              @foreach($cabran as $data)
              <option value="{{$data->idcabangranting}}">{{$data->namacabang}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Pelayan Penyerahan Anak</label>
            <select class="form-control select2" name="pelayan" id="pe_dis" style="width: 100%;">
              <option value="" >=== Pilih Pelayan ===</option>
              @foreach($perso as $data)
              <option value="{{$data->idpersonal}}">{{$data->namalengkap}}</option>
               @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Dokumen</label>
            <input type="file" name="dokumen" id="dok_dis" class="form-control" >
          </div>
        </div>
      </div>
      <div class="demo-button">
        <button type="submit" id="btn-submit-diserahkan" class="btn btn-block btn-primary  waves-effect">Save</button>
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
