    <section>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Pengerja</h3>
               <a href="{{url('/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
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
                      <th>No Hp</th>
                      <th>Alamat</th>
                      <th>Jabatan</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($jabpel as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td><a href="{{ url('mdpj/pengerja/detail',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs">{{$data->idpersonal}}</a></td>
                      <td>{{$data->personal['namalengkap']}}</td>
                      <td>{{$data->personal['jeniskelamin']}}</td>
                      <td>{{$data->personal['nohp']}}p</td>
                      <td>{{$data->personal['alamat']}}</td>
                      <td>{{$data->jabatan}}</td>
                        <?php 
                          if($data->status_order=='0'){
                              $approve="Waiting Acc";
                              $colora="bg-maroon";
                            }else if($data->status_order=='1'){
                              $approve="Di Acc";
                              $colora="bg-green";
                            }
                            else{
                              $approve="";
                              $colora="";
                            }
                        ?>
                
                      <td><span class="label {{$colora}}">{{$approve}}</span></td>
                      <td>
                        <button onclick="location.href='{{ url('pengerja_approve/pusat',$data->id)}}'" @if($approve =='Di Acc') disabled @endif class="btn btn-block-small btn-success btn-xs ">Acc</button>
                        <a href="{{ url('mdpj/pengerja/detail',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('mdpj/pengerja/edit',$data->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
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