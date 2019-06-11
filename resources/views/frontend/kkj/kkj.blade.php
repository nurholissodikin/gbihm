<br>   
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Kartu Keluarga Jemaat</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
             <label>No KKJ</label> : <span id="kkj_i"> {{$personal->nokkj}} </span> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Anggota Keluarga</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"> <b>Anggota</b></i></button>
      </div>
    </div>
    <form enctype="multipart/form-data" method="post" id="formkk">
      {{csrf_field()}}  
      <input type="hidden" name="nokkj" id="nokkj_kk" value="{{ $personal->nokkj }}">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="form-group">
                <label>Personal</label>
                <select class="form-control select2" name="idpersonal" id="id_personal_kk" style="width: 100%;" onchange="change_id_personal()">
                  <option value="" selected="true">- Pilih Personal -</option>
                  @foreach ($per as $key => $value)
                  <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" id="nama_lengkap">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control select2" name="jk" style="width: 100%;" id="jenis_kelamin" required="">
                  <option value="" selected="true">- Pilih Jenis Kelamin -</option>
                  <option value="L" >Laki-Laki</option>
                  <option value="P" >Permepuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="tala" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahir" required="" >
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>NIK/No.KTP</label>
                <input type="text" name="noktp" class="form-control" placeholder="No. KTP" id="no_ktp">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Hubungan Keluarga</label>
                <select class="form-control select2"  name="hub" style="width: 100%;">
                  <option value="">-- Pilih Hubungan Keluarga --</option>
                  <option value="Suami/Istri">Suami/Istri</option>
                  <option value="Anak ke-1">Anak ke-1</option>
                  <option value="Anak ke-2">Anak ke-2</option>
                  <option value="Anak ke-3">Anak ke-3</option>
                  <option value="Ayah/Ibu">Ayah/Ibu</option>
                  <option value="Mertua">Mertua</option>
                  <option value="Kakak">Kakak</option>
                  <option value="Adik">Adik</option>
                  <option value="Saudara">Saudara</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Internal / Eksternal</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="radio" name="inek" value="Internal(GBI Jl.Gatot Subroto)"  >
                  </span>
                  <input type="text" class="form-control" placeholder="Internal(GBI Jl.Gatot Subroto)" disabled="" required="">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label><br></label>
              <div class="input-group">
                <span class="input-group-addon">
                  <input type="radio" name="inek" value="Eksternal(Non GBI Jl.Gatot Subroto)" >
                </span>
                <input type="text" class="form-control" placeholder="Eksternal(Non GBI Jl.Gatot Subroto)" disabled="" required="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Dokumen</label>
                <input type="file" name="dokumen" id="dokumen" class="form-control" >
              </div>
            </div>
            <div class="demo-button">
              <button type="button" class="btn btn-block btn-primary  waves-effect"  id="add" onclick="ask_kkj()">Save</button>
            </div>   
          </div>
        </div>
      </div>
    </form>
  </div>

<br>

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">List KKJ</h3>
         <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"> <b>Anggota</b></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example4" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>No.ID</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>NIK / No.KTP</th>
                <th>Hubungan Keluarga</th>
                <th>Keanggotaan</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="keluarga_data">
              @php $no = 1 @endphp
              @foreach($kkj as $item)
              <tr class="item{{$item->id}}">
                <td>{{$no}}</td>
                <td>{{$item->idpersonal}}</td>
                <td>{{$item->namalengkap}}</td>
                <td>{{$item->jeniskelamin}}</td>
                <td>{{$item->tanggallahir}}</td>
                <td>{{$item->ktpid}}</td>
                <td>{{$item->hubkeluarga}}</td>
                <td>{{$item->keanggotaan}}</td>
                <td>
                  <button class="edit-modalkkj btn btn-xs btn-warning" data-id="{{$item->idpersonal}}" data-namalengkap="{{$item->namalengkap}}" data-jeniskelamin="{{$item->jeniskelamin}}" data-tanggallahir="{{$item->tanggallahir}}" data-ktpid="{{$item->ktpid}}" data-hubkeluarga="{{$item->hubkeluarga}}" data-keanggotaan="{{$item->keanggotaan}}">
                    <span class="glyphicon glyphicon-edit"></span> 
                  </button>
                  <button class="delete-modal btn btn-xs btn-danger" data-ida="{{$item->idpersonal}}" data-name="{{$item->namalengkap}}">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
                </td>
              </tr>
              @php $no++ @endphp
              @endforeach
            </tbody>
          </table>
        </div>  
      </div>
    </div>
    
    <div id="myModalkkj" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <form action="" class="form-horizontal" method="post" id="editper">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="fid_per" disabled>            
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12">
                    <br>
                    <label>Nama Lengkap</label>
                    <input type="text" name="na_per" placeholder="Nama Lengkap" class="form-control" id="na_per">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" name="jk_per" style="width: 100%;" id="jk_per" required="">
                      <option value="" selected="true">- Pilih Jenis Kelamin -</option>
                      <option value="L" >Laki-Laki</option>
                      <option value="P" >Permepuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" name="tl_per" id="tl_per" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>NIK / No. KTP</label>
                    <input type="text" name="ktp_per" class="form-control" id="ktp_per" maxlength="16"  pattern=".{16,}" title="isi minimal 16 digit">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Hubungan Keluarga</label>
                      <select class="form-control select2"  name="hub_per" id="hub_per" style="width: 100%;">
                        <option value="" >-- Pilih Hubungan Keluarga --</option>
                        <option value="Suami/Istri">Suami/Istri</option>
                        <option value="Anak ke-1">Anak ke-1</option>
                        <option value="Anak ke-2">Anak ke-2</option>
                        <option value="Anak ke-3">Anak ke-3</option>
                        <option value="Ayah/Ibu">Ayah/Ibu</option>
                        <option value="Mertua">Mertua</option>
                        <option value="Kakak">Kakak</option>
                        <option value="Adik">Adik</option>
                        <option value="Saudara">Saudara</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Keanggotaan</label>
                    <select class="form-control select2" name="kea_per" style="width: 100%;" id="kea_per">
                      <option value="" selected="true">- Pilih Keanggotaan -</option>
                      <option value="Internal(GBI Jl.Gatot Subroto)" >Internal(GBI Jl.Gatot Subroto)</option>
                      <option value="Eksternal(Non GBI Jl.Gatot Subroto)" >Eksternal(Non GBI Jl.Gatot Subroto)</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-12">
                  <div><br></div>
                  <button type="submit" class="btn btn-success">
                    <span class='glyphicon glyphicon-check'> Update</span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
                </div>
              </div>
          </form>
          <form action="" class="delete-a" method="post" id="deper">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="ida" disabled>            
              <div class="col-md-12">
                 <div class="deleteContent">
                  <br>
                  Are you Sure you want to delete <b><span class="name"></span></b> ? <span
                  class="hidden did"></span>
                  <hr>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-danger">
                    <span class='glyphicon glyphicon-trash'> Delete</span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>

