    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Upload</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{url('coolImport')}}" method="post" enctype="multipart/form-data">
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
            <div class="box-header with-border">
              <h3 class="box-title">List Data COOL</h3>
               <a  href="{{asset('public/assets/template/TemplatePersonalCOOL.xlsx')}}" class="btn btn-primary pull-right" target="_blank">Download Template</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover data-table"   cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" id="select-all-cool" name="aa">&nbsp; All</th>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>Rayon</th>
                      <th>Cabang</th>
                      <th>Status Email</th>
                      <th>Status</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    <form action="{{url('pengerja_approve/kirim_gembalacabang/all')}}" method="post"> 
                      {{csrf_field()}}

                      @php $no = 1 @endphp
                      @foreach($cool as $item)
                      <tr class="item{{$item->id}}">
                        <?php 
                          if($item->personal['verifikasi']=='0'){
                            $status="Belum Verifikasi";
                            $color="bg-maroon";
                          }else if($item->personal['verifikasi']=='1'){
                            $status="Terverifikasi";
                            $color="bg-green"; 
                          }
                          else{
                            $status="";
                            $color="";
                          }

                          if($item->approve=='0'){
                            $approve="Waiting Acc";
                            $colora="bg-maroon";
                          }else if($item->approve=='1'){
                            $approve="Di Acc";
                            $colora="bg-green";
                          }
                          else{
                            $approve="";
                            $colora="";
                          }

                          if($item->approve_gembala_cabang != null){
                            $kirim="disabled";
                          }
                          else {
                            $kirim = "";
                          }

                          if($item->approve_gembala_cabang=='0'){
                            $approvea="Waiting Acc Gembala Cabang";
                            $coloraa="bg-maroon";
                          }else if($item->approve_gembala_cabang=='1'){
                            $approvea="Di Acc by Gembala Cabang";
                            $coloraa="bg-green";
                          }
                          else{
                            $approvea="";
                            $coloraa="";
                          }
                        ?>
                         <td><input type="checkbox" name="kirim[{{$item->id}}]" class="selected-all-cool" value="0" @if($status =='Belum Verifikasi') disabled @elseif($approve =='Waiting Acc') disabled  @elseif($kirim =='disabled') disabled checked @endif></td>
                        <td>{{$no}}</td>
                        <td><a href="{{ url('mdpj/cool/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs">{{$item->idpersonal}}</a></td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>{{$item->rayon['namarayon']}}</td>
                        <td>{{$item->cabang['namacabang']}}</td>
                        <td><span class="label {{$color}}">{{$status}}</span></td>
                        <td><span class="label {{$colora}}">{{$approve}}</span></td>
                        <td><span class="label {{$coloraa}}">{{$approvea}}</span></td>
                        
                      </tr>
                      @php $no++ @endphp
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