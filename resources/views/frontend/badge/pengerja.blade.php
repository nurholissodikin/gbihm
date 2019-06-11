    <section>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Upload</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{url('pengerjaImport')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-success">
                  {{ session('error') }}
                </div>
                @endif
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">File (.xls, .xlsx)</label>
                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx">
                    <p class="text-danger">{{ $errors->first('file') }}</p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">

                    <button type="submit" class="btn btn-primary form-control ">Upload</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
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
                      <th><input type="checkbox" id="select-all" name="aa">&nbsp; All</th>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>No Hp</th>
                      <th>Alamat</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Status Email</th>
                      <th>Status</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                     
                    </tr>

                  </thead>
                  <tbody>
                    <form action="{{url('pengerja_approve/kirim_gembalacabang/all')}}" method="post"> 
                       {{csrf_field()}}
                       <?php $no = 0;?>
                       @foreach($jabpel as $data)
                       <?php $no++ ;?>
                        <tr>
                          <?php 
                              if($data->personal['verifikasi']=='0'){
                                $status="Belum Verifikasi";
                                $color="bg-maroon";
                              }else if($data->personal['verifikasi']=='1'){
                                $status="Terverifikasi";
                                $color="bg-green"; 
                              }
                              else{
                                $status="";
                                $color="";
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

                                if($data->approve_gembala_cabang != null){
                                  $kirim="disabled";
                                }
                                else {
                                  $kirim = "";
                                }

                                if($data->approve_gembala_cabang=='0'){
                                  $approvea="Waiting Acc Gembala Cabang";
                                  $coloraa="bg-maroon";
                                }else if($data->approve_gembala_cabang=='1'){
                                  $approvea="Di Acc by Gembala Cabang";
                                  $coloraa="bg-green";
                                }
                                else{
                                  $approvea="";
                                  $coloraa="";
                                }
                            ?>
                          <td><input type="checkbox" name="kirim[{{$data->id}}]" class="selected-all" value="0" @if($status =='Belum Verifikasi') disabled @elseif($approve =='Waiting Acc') disabled  @elseif($kirim =='disabled') disabled checked @endif></td>
                          <td>{{$no}}</td>
                          <td><a href="{{ url('mdpj/pengerja/detail',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs">{{$data->idpersonal}}</a></td>
                          <td>{{$data->personal['namalengkap']}}</td>
                          <td>{{$data->personal['jeniskelamin']}}</td>
                          <td>{{$data->personal['nohp']}}p</td>
                          <td>{{$data->personal['alamat']}}</td>
                          <td>{{$data->jabatan}}</td>
                          <td>{{$data->personal['email']}}</td> 
                            
                          <input type="hidden" name="a" value="{{$data->verifikasi}}" id="verif_email" >
                          <td><span class="label {{$color}}">{{$status}}</span></td>
                          <td><span class="label {{$colora}}">{{$approve}}</span></td>
                          <td><span class="label {{$coloraa}}">{{$approvea}}</span></td>
                         
                        </tr>
                       @endforeach 
                       <div class="demo-button">
                           <button  class="btn  btn-primary  waves-effect pull-right" type="submit" >Kirim</button>
                        </div> 
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>