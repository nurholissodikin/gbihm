<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Absensi COOL</h3>
            </div>
            <div class="box-body">
              <form   id="form_cool" action="{{url('absensi/pertemuan')}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="idpertemuan" value="{{$pertemuan->id}}">
                <input type="hidden" name="jenis" value="COOL">
                <input type="hidden" value="{{ Auth::user()->id }}" name="created">
                <input type="hidden" value="{{ Auth::user()->id }}" name="updated">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pengerja COOL</label>
                    <select name="cool" id="idpengerja_cool" class="form-control select2" style="width: 100%">
                      <option value="">-- Pilih Pengerja COOL --</option>
                      @foreach($cool as $data)
                      <option value="{{$data->id}}"> {{$data->id}} || {{$data->namalengkap}}
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12"> 
                  <div class="form-group">
                    <label>Kehadiran</label>
                    <select class="form-control select2 kehadiran_tamu" name="hadir" id="tamu_absensi_cool" style="width: 100%">
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
                    <textarea class="form-control alasan_ijin_tamu_cool" disabled="" id="alasan_kehadiran_tamu" name="alasan"></textarea>
                 </div>
                </div>
                <div class="demo-button">
                  <button id="btn-submit-cool" type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Absensi Pengerja</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover data-table1"  cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Pengerja COOL</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($absensi_cool as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->pengerjacool['id']}}</td>
                      <td>{{$item->pengerjacool['namalengkap']}}</td>
                      <td>{{$item->pengerjacool['jabatan']}}</td>
                      <td>{{$item->pengerjacool['status']}}</td>
                      <td>{{$item->kehadiran}}</td>
                      <td>
                     
                        <a href="{{ url('pertemuan/absensi/detail/cool',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-warning" onclick="edit_absensi_cool({{$item->id}})">
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