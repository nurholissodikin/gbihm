<br>
<form action="{{url('personal/pen')}}" enctype="multipart/form-data" method="post" id="formpen">
    {{csrf_field()}}
  <input type="hidden" name="idper" id="id_pen" value="{{$personal->idpersonal}}">
		<div class="col-md-12">      
      <div class="col-md-12">
        <div class="form-group">
          <label>Tingkat Pendidikan</label>
          <select class="form-control select2" name="tp" style="width: 100%;">
            <option value='' disable="true">=== Pilih Pendidikan Terakhir ===</option>
            <option value="SD" >SD</option>
            <option value="SMP" >SMP</option>
            <option value="SMA" >SMA</option>
            <option value="Diploma" >Diploma</option>
            <option value="S1" >S1</option>
            <option value="S2" >S2</option>
            <option value="S3" >S3</option>
            <option value="Lainnya" >Lainnya</option>
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Nama Sekolah/Instiusi</label>
          <input type="text" name="sekolah" class="form-control" placeholder="Nama Sekolah/Instiusi">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Lokasi/kota</label>
          <input type="text" name="lokasi" class="form-control" placeholder="Lokasi/kota">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Jurusan</label>
          <input type="text" name="jurusan" class="form-control" placeholder="Jurusan">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Contact Person Guru</label>
          <input type="text" name="cp" class="form-control" placeholder="Contact Person Guru">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tahun</label>
          <input type="number" name="tahun" class="form-control" placeholder="Tahun Lulus">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Status Pekerjaan</label>
          <div class="input-group">
            <span class="input-group-addon">
            <input type="radio" name="spek" id="kerja" value="Bekerja" <?php echo ($personal->statuspekerjaan == "Bekerja") ? "checked": "" ?>>
            </span>
            <input type="text" class="form-control" placeholder="Bekerja" readonly="">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <label><br></label>
        <div class="input-group">
          <span class="input-group-addon">
          <input type="radio" name="spek" id="be_kerja" value="Belum Bekerja" <?php echo ($personal->statuspekerjaan == "Belum Bekerja") ? "checked": "" ?>>
          </span>
          <input type="text" class="form-control" placeholder="Belum Bekerja" readonly="">
        </div>
      </div>
      <div class="col-md-12 dv_kerja">
        <div class="form-group">
          <label>Pilih Profesi</label>
          <select class="form-control select2"  name="prof" style="width: 100%;">
            <option value="" >=== Pilih Profesi ===</option>
            @foreach($prof as $data)
            <option value="{{$data->idprofesi}}" @if($data->idprofesi == $personal->idprofesi) selected  @endif>{{$data->profesi}}</option>
             @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-12 dv_kerja">
        <div class="form-group">
          <label>Pilih Jenis Pekerjaan</label>
          <select class="form-control select2"  name="jp" style="width: 100%;">
            <option value="" >=== Pilih Jenis Pekerjaan ===</option>
            @foreach($jp as $data)
            <option value="{{$data->idjenispekerjaan}}" @if($data->idjenispekerjaan == $personal->idjenispekerjaan) selected  @endif>{{$data->jenispekerjaan}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-12 dv_kerja">
        <div class="form-group">
          <label>Pilih Bidang Pekerjaan</label>
          <select class="form-control select2"  name="bp" style="width: 100%;">
            <option value="" >=== Pilih Bidang Pekerjaan ===</option>
            @foreach($bp as $data)
            <option value="{{$data->idbidangpekerjaan}}" @if($data->idbidangpekerjaan == $personal->idbidangpekerjaan) selected  @endif>{{$data->bidangpekerjaan}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Hobi</label>
          <input type="text" name="hobi" class="form-control" placeholder="Hobi" value="{{$personal->hobi}}">
        </div>
      </div>
		</div>
    <div class="demo-button">
      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
    </div>
</form>   
<br>
<br>

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">List Pendidikan</h3>
       <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
       <div class="table-responsive">
        <table id="example3" class="table table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Pendidikan</th>
              <th>Nama Sekolah/Institusi</th>
              <th>Lokasi/Kota</th>
              <th>Jurusan</th>
              <th>Tahun</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="pen_data">
            @php $no = 1 @endphp
            @foreach($pendi as $item)
            <tr class="item{{$item->idpendidikan}}">
              <td>{{$no}}</td>
              <td>{{$item->tingkatpendidikan}}</td>
              <td>{{$item->institusi}}</td>
              <td>{{$item->lokasi}}</td>
              <td>{{$item->jurusan}}</td>
              <td>{{$item->tahun}}</td>
              <td>
                <button class="edit-modal btn btn-xs btn-warning" data-id="{{$item->idpendidikan}}" data-tingkatpendidikan="{{$item->tingkatpendidikan}}" data-institusi="{{$item->institusi}}" data-lokasi="{{$item->lokasi}}" data-jurusan="{{$item->jurusan}}" data-cpguru="{{$item->cpguru}}" data-tahun="{{$item->tahun}}">
                  <span class="glyphicon glyphicon-edit"></span> 
                </button>     
                <button class="btn btn-xs btn-danger" onclick="del_pen({{$item->idpendidikan}})">
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
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form action="" enctype="multipart/form-data" method="post" id="editpen" data-id="">
             <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="fid" name="id" disabled>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Tingkat Pendidikan</label>
                 <select class="form-control select2" name="tp" id="ti_pen" style="width: 100%;">
                  <option value='' selected="true">=== Pilih Pendidikan Terakhir ===</option>
                  <option value="SD" >SD</option>
                  <option value="SMP" >SMP</option>
                  <option value="SMA" >SMA</option>
                  <option value="Diploma" >Diploma</option>
                  <option value="S1" >S1</option>
                  <option value="S2" >S2</option>
                  <option value="S3" >S3</option>
                  <option value="Lainnya" >Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Nama Sekolah/Instiusi</label>
                <input type="text" name="sekolah" class="form-control" id="ins_pen">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Lokasi/kota</label>
                <input type="text" name="lokasi" class="form-control" id="lok_pen">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" id="jur_pen">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Contact Person Guru</label>
                <input type="text" name="cp" class="form-control" id="cp_pen">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control" id="thn_pen">
              </div>
            </div>
          <br>
          <br>
          <div class="modal-footer">
            <button type="submit" class="btn actionBtn" >
              <span id="footer_action_button" class='glyphicon'> </span>
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
