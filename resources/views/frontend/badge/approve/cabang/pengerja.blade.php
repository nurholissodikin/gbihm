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
                      <th><input type="checkbox" name="aa">Check All</th>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>No Hp</th>
                      <th>Alamat</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Status Email</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($jabpel as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td><input type="checkbox" name="aa"></td>
                      <td>{{$no}}</td>
                      <td><a href="{{ url('mdpj/pengerja/detail',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs">{{$data->idpersonal}}</a></td>
                      <td>{{$data->personal['namalengkap']}}</td>
                      <td>{{$data->personal['jeniskelamin']}}</td>
                      <td>{{$data->personal['nohp']}}p</td>
                      <td>{{$data->personal['alamat']}}</td>
                      <td>{{$data->jabatan}}</td>
                      <td>{{$data->personal['email']}}</td> 
                        <?php 
                          if($data->personal['verifikasi']=='0'){
                            $status="Belum Verifikasi";
                            $color="bg-maroon";
                            $disabled= "disabled";
                          }else if($data->personal['verifikasi']=='1'){
                            $status="Terverifikasi";
                            $color="bg-green";
                            $disabled="";
                          }
                          else{
                            $status="";
                            $color="";
                            $disabled= "disabled";
                          }

                          if($data->approve=='0'){
                              $approve="Waiting Acc";
                              $colora="bg-maroon";
                            }else if($data->approve=='1'){
                              $approve="Di Acc";
                              $colora="bg-green";
                            }
                            else{
                              $approve="";
                              $colora="";
                            }
                        ?>
                        <input type="hidden" name="a" value="{{$data->verifikasi}}" id="verif_email" >
                      <td><span class="label {{$color}}">{{$status}}</span></td>
                      <td><span class="label {{$colora}}">{{$approve}}</span></td>
                      <td>
                        <a  href="{{ url('pengerja/approve',$data->id)}}" type="submit" class="btn btn-block-small btn-success btn-xs but_approve" >Acc</a>
                        <a  href="{{ url('kirimpengerja/gembala',$data->id)}}" type="submit" class="btn btn-block-small btn-success btn-xs but_approve" >Kirim ke Gembala Cabang</a>
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