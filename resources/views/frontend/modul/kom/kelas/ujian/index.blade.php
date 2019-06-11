<br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Kelas KOM Ujian</h3>
              
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover data-table" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal</th>
                      <th>Nilai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($komujian as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->murid['idpersonal']}}</td>
                      <td>{{$item->murid->personal['namalengkap']}}</td>
                      <td>{{$item->murid->personal['jeniskelamin']}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->nilai}}</td>
                      <td>
                        <a href="{{ route('komujian.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
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
 