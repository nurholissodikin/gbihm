      <section>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">List Tamu Khusus</h3>
                  <a  href="{{asset('public/assets/template/TemplateTamu2.xlsx')}}" class="btn btn-primary pull-right" target="_blank">Download Template</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover data-table" style="width: 100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Jenis Badge</th>
                        <th>Cabang</th>
                        <th>Email</th>
                        <th>Status Email</th>
                        <th>Status Approve</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $no = 0;?>
                     @foreach($tamukhusus as $data)
                     <?php $no++ ;?>
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->idtamukhusus}}</td>
                        <td>{{$data->namalengkap}}</td>
                        <td>{{$data->jeniskelamin}}</td>
                        <td>{{$data->jenisbadge}}</td> 
                        <td>{{$data->cabang}}</td>
                        <td>{{$data->email}}</td>
                          <?php 
                            if($data->verifikasi=='0'){
                              $status="Belum Verifikasi";
                              $color="bg-maroon";
                              $disabled= "disabled";
                            }else if($data->verifikasi=='1'){
                              $status="Terverifikasi";
                              $color="bg-green";
                              $disabled="";
                            }
                            else{
                              $status="";
                              $color="";
                              $disabled= "disabled";
                            }
                          ?>
                          <?php 
                            if($data->approve=='0'){
                              $approve="Waiting Approve";
                              $colora="bg-maroon";
                            }else if($data->approve=='1'){
                              $approve="Terapprove";
                              $colora="bg-green";
                            }
                            else{
                              $approve="";
                              $colora="";
                            }
                          ?>
                          <input type="hidden" name="" id="verif_email" value="{{$data->verifikasi}}">
                          <td><span class="label {{$color}}">{{$status}}</span> </td>
                            <td><span class="label {{$colora}}">{{$approve}}</span>
                        </td>
                        <td>
                          <a href="{{ url('tamukhusus/approve',$data->idtamukhusus)}}" type="submit" class="btn btn-block-small btn-success btn-xs but_approve" >Approve</a>
                          <a href="{{ url('modul/pengkhotbah/tamukhusus/detail',$data->idtamukhusus)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                          <a href="{{ url('modul/pengkhotbah/tamukhusus/'.$data->idtamukhusus.'/edit')}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <button  class="btn btn-xs btn-danger" onclick="del_taku({{$data->idtamukhusus}})">
                            <span class="glyphicon glyphicon-trash"></span> 
                          </button>
                        </td>            
                      </tr>
                     @endforeach 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>