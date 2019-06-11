  <br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div id="demo" class="collapse box box-info">        
            <div class="box-body">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Kelas</h3>
              </div>
                <br>
                <form  action="{{route('komkehadiran.store')}}" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="created" value="{{Auth::user()->id}}">
                  <input type="hidden" name="id" value="{{$kelas->id}}">
                  <div class="col-md-6">
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
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jam</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" name="jam" class="form-control timepicker pull-right" >
                      </div>
                    </div>
                  </div>
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
                      <label>Guru</label>
                      <select class="form-control select2" name="guru" style="width: 100%;" >
                        <option value="">-- Pilih Guru --</option>
                        @foreach($guru as $data)
                        <option value="{{$data->id}}">{{$data->personal['namalengkap']}}</option>
                        @endforeach
                      </select>
                    </div>                  
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Persembahan</label>
                      <input type="text" name="persembahan" class="form-control" placeholder="Persembahan">
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
              <h3 class="box-title">List Kehadiran</h3>
              <button class="btn btn-primary pull-right" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus"></i></button>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Jam</th>
                      <th>Materi</th>
                      <th>Guru</th>
                      <th>Persembahan</th>
                      <th>Jumlah Yang Hadir</th>
                      <th>Jumlah Yang Tidak Hadir</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($komkehadiran as $item)
                    <tr class="item{{$item->id}}">
                       @php
                        $hadir= \App\Kehadiranabsensi::where('kehadiran','Hadir')->count();
                        $tidakhadir= \App\Kehadiranabsensi::where('kehadiran','!=','Hadir')->count();
                      @endphp
                      <td>{{$no}}</td>
                      <td>{{$item->tgl}} &nbsp; {{$item->jam}} </td>
                      <td>{{$item->materi['materi']}}</td>
                      <td>{{$item->guru->personal['namalengkap']}}</td>
                      <td>{{$item->persembahan}}</td>
                      <td>{{$hadir}}</td>
                      <td>{{$tidakhadir}}</td>
                      <td>
                        <a href="{{ url('komkehadiran/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('komkehadiran.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ url('komkehadiran/absensi',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Absensi</a>
                        
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
 
