<div class="row">
  <div  class="col-md-12">
    <h3>Kegiatan</h3>
    <hr/>
    <div class="col-md-1">
      <!-- required for floating -->
      <!-- Nav tabs -->
      <ul class="nav nav-tabs tabs-left vertical-text">
        <li class="active"><a href="#reg-v" data-toggle="tab">Kegiatan Reguler</a></li>
        <li><a href="#noreg-v" data-toggle="tab">Kegiatan Non Reguler</a></li>
      </ul>
    </div>
    <div class="col-md-11">
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="reg-v">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kegiatan Non Reguler</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><i class="fa fa-calendar"> Tampilkan Calendar </i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table>
                  <tbody>
                    <tr>
                      <td>Range :</td>
                      <td><input name="min" id="min" class="form-control" type="text"></td><td>-</td>
                      <td><input name="max" id="max" class="form-control" type="text"></td>
                    </tr>
                  </tbody>
                </table>          
                <table width="100%" class="table table-bordered table-hover" id="datadate" cellspacing="0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Keg.</th>
                        <th>Kategori Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Tempat/Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Kehadiran</th>
                        <th>Pelayanan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody >
                      @php $no = 1 @endphp
                      @foreach($pelakeg as $item)
                      <tr class="item{{$item->id}}">
                        <td>{{$no}}</td>
                        <td>{{$item->idkegiatan}}</td>
                        <td>{{$item->kegiatan['kategori']}}</td>
                        <td>{{$item->kegiatan['nama_kegiatan']}}</td>
                        <td>{{$item->kegiatan['tempat']}}</td>
                        <td>{{$item->kegiatan['tgl_mulai']}}</td>
                        <td>{{$item->kegiatan['waktu_mulai']}}</td>
                        <td>{{$item->hadir}}</td>
                        <td>{{$item->melayani}}</td>
                        <td>
                          <a href="{{ url('personal/kegiatan/pelayan/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> </a>
                          <a href="{{ url('personal/kegiatan/pelayan/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i> </a>
                        </td>
                      </tr>
                      @php $no++ @endphp
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="demo" class="collapse">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendarb"></div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
        <div class="tab-pane" id="noreg-v">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kegiatan Non Reguler</h3>
              <div class="box-tools pull-right">
                <a href="{{url('personal/kegiatan/pelayan/create/'.$personal->idpersonal)}}" class="btn btn-primary btn-block-small pull-right" ><i class="fa fa-plus"> Jadwal Pelayan</i></a>
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demoa"><i class="fa fa-calendar"> Tampilkan Calendar </i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table>
                  <tbody>
                    <tr>
                      <td>Range :</td>
                      <td><input name="mina" id="mina" class="form-control" type="text"></td><td>-</td>
                      <td><input name="maxa" id="maxa" class="form-control" type="text"></td>
                    </tr>
                  </tbody>
                </table>          
                <table width="100%" class="table table-bordered table-hover" id="datadatec" >
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Keg.</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>PIC</th>
                        <th>Pelayanan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody >
                      @php $no = 1 @endphp
                      @foreach($pelakegi as $item)
                      <tr class="item{{$item->id}}">
                        <td>{{$no}}</td>
                        <td>{{$item->idkegiatan}}</td>
                        <td>{{$item->kegiatan['nama_kegiatan']}}</td>
                        <td>{{$item->kegiatan['tgl_mulai']}}</td>
                        <td>{{$item->kegiatan['waktu_mulai']}}</td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>{{$item->melayani}}</td>
                        <td>
                          <a href="{{ url('personal/kegiatan/pelayan/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> </a>
                          <a href="{{ url('personal/kegiatan/pelayan/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i> </a>
                        </td>
                      </tr>
                      @php $no++ @endphp
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="demoa" class="collapse">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendarc"></div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
