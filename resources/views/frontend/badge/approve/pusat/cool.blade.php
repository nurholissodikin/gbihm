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
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Jabatan</th>
                      <th>Rayon</th>
                      <th>Cabang</th>
                      <th>Status Acc</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($cool as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->personal['idpersonal']}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->jabatan}}</td>
                      <td>{{$item->rayon['namarayon']}}</td>
                      <td>{{$item->cabang['namacabang']}}</td>
                      <?php 
                          if($item->status_order=='0'){
                              $approve="Waiting Acc";
                              $colora="bg-maroon";
                            }else if($item->status_order=='1'){
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
                        <button onclick="location.href='{{ url('pengerja_approve/pusat',$item->id)}}'" @if($approve =='Di Acc') disabled @endif class="btn btn-block-small btn-success btn-xs ">Acc</button>
                     
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