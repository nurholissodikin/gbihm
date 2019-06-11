<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Absensi Tamu</h3>
            </div>
            <div class="box-body">
              <form  id="form_tamu" action="{{url('absensi/pertemuan')}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="idpertemuan" value="{{$pertemuan->id}}">
                <input type="hidden" value="{{ Auth::user()->id }}" name="created">
                <input type="hidden" value="{{ Auth::user()->id }}" name="updated">
                <input type="hidden" name="jenis" value="Tamu">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tamu</label>
                    <select name="tamu" class="form-control select2" id="id_tamukhusus" style="width: 100%">
                      <option value="">-- Pilih Tamu --</option>
                      @foreach($tamu as $data)
                      <option value="{{$data->idtamukhusus}}"> {{$data->idtamukhusus}} || {{$data->namalengkap}}
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12"> 
                  <div class="form-group">
                    <label>Kehadiran</label>
                    <select class="form-control select2 kehadiran_tamu" name="hadir" id="tamu_absensi" style="width: 100%">
                      <option value="Hadir">Hadir</option>
                      <option value="Ijin">Ijin</option>
                      <option value="Alpha">Alpha</option>
                      <option value="Terlambat">Terlambat</option>
                      <option value="Sakit">Sakit</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alasan Ijin</label>  
                    <textarea class="form-control alasan_ijin_tamu" disabled="" id="alasan_kehadiran_tamu" name="alasan"></textarea>
                 </div>
                </div>
                <div class="demo-button">
                  <button type="submit" id="btn-submit-tamu" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Absensi Tamu</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover data-table2" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Tamu</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($absensi_tamu as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->tamukhusus['idtamukhusus']}}</td>
                      <td>{{$item->tamukhusus['namalengkap']}}</td>
                      <td>{{$item->tamukhusus['jabatan']}}</td>
                      <td>{{$item->tamukhusus['status']}}</td>
                      <td>{{$item->kehadiran}}</td>
                      <td>
                        <a href="{{ url('pertemuan/absensi/detail/tamu',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-warning" onclick="edit_absensi_tamu({{$item->id}})">
                          <span class="glyphicon glyphicon-edit"></span>
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
        </div>
      </div>
</section>