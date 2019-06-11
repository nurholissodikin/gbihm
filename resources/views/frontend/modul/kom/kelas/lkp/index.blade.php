
 <br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div id="demoa" class="collapse box box-info">        
            <div class="box-body">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Kelas</h3>
              </div>
                <br>
                <form  action="{{route('komlkp.store')}}" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="created" value="{{Auth::user()->id}}">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Materi</label>
                      <select class="form-control select2" name="materi" style="width: 100%;" >
                        <option value="">-- Pilih Materi --</option>
                        @foreach($materi as $data)
                        <option value="{{$data->id}}">{{$data->materi}}</option>
                        @endforeach
                      </select>
                    </div>                  
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tanggal" autocomplete="off" class="form-control datepickerlight" >
                      </div>
                    </div>
                  </div>
                  <div class="demo-button">
                    <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                  </div>
                </form>    
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">LKP (Laporan Kerja Peserta)</h3>
              <button class="btn btn-primary pull-right" data-toggle="collapse" data-target="#demoa"><i class="fa fa-plus"></i></button>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered data-table table-hover"  cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Materi</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($komlkp as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->materi['materi']}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>
                        <a href="{{url('komlkp/absensi',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">
                        <a href="{{ url('komlkp/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('komlkp.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
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
