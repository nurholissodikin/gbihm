    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data COOL</h3>
               <a  href="{{asset('public/assets/template/TemplatePersonalCOOL.xlsx')}}" class="btn btn-primary pull-right" target="_blank">Download Template</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover data-table2"   cellspacing="0">
                  <thead>
                    <tr>
                      <th><input type="checkbox" id="select-all-cool" name="aa">&nbsp; All</th>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>Rayon</th>
                      <th>Cabang</th>
                      <th>Status</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    <form action="{{url('pengerja_approve/adminrayon/all')}}" method="post" id="form-kirim">
                      {{csrf_field()}}

                      @php $no = 1 @endphp
                      @foreach($cool as $item)
                      <tr class="item{{$item->id}}">
                        <?php 
                            if($item->approve_gembala_cabang=='0'){
                                $approve="Waiting Acc";
                                $colora="bg-maroon";
                              }else if($item->approve_gembala_cabang=='1'){
                                $approve="Di Acc";
                                $colora="bg-green";
                              }
                              else{
                                $approve="";
                                $colora="";
                              }

                              if($item->approve_rayon != null){
                                $kirim="disable";
                              }
                              else {
                                $kirim = "";
                              }

                              if($item->approve_rayon=='0'){
                                $approvea="Waiting Acc Rayon";
                                $coloraa="bg-maroon";
                              }else if($item->approve_rayon=='1'){
                                $approvea="Di Acc by Rayon";
                                $coloraa="bg-green";
                              }
                              else{
                                $approvea="";
                                $coloraa="";
                              }
                          ?>
                         <td><input type="checkbox" name="kirim[{{$item->id}}]" class="selected-all-cool" value="0" @if($approve =='Waiting Acc'){ disabled  } @elseif($kirim =='disable') disabled checked @endif></td>
                        <td>{{$no}}</td>
                        <td><a href="{{ url('mdpj/cool/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs">{{$item->idpersonal}}</a></td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>{{$item->jabatan}}</td>
                        <td>{{$item->rayon['namarayon']}}</td>
                        <td>{{$item->cabang['namacabang']}}</td>

                        <td><span class="label {{$colora}}">{{$approve}}</span></td>
                        <td><span class="label {{$coloraa}}">{{$approvea}}</span></td>
                        <!-- <td> -->
                        
                         <!--  <a href="{{ route('cool.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <a href="{{ route('cool.show',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                          <button class="btn btn-xs btn-danger" onclick="del_cool({{$item->id}})">
                            <span class="glyphicon glyphicon-trash"></span> 
                          </button> -->

                        <!-- </td> -->
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