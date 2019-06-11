    <br>
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Keanggotaan</h3>
        <div class="box-tools pull-right">
          <a href="{{url('keanggotaan/create/'.$personal->idpersonal)}}" type="submit" id="add_ke" class="btn btn-primary btn-xs " ><i class="fa fa-pencil"> Insert</i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Gereja Asal</label> : <span id="gereja_i"> {{$personal->gerejaasal}} </span> 
              <br>
              <label>Mulai Berjamaat</label> : <span> {{$personal->mulaiberjemaat}} </span> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">List Keanggotaan</h3>
         <div class="box-tools pull-right">
          <a href="{{url('keanggotaan/mutasi/'.$personal->idpersonal)}}" type="submit" id="add_ke" class="btn btn-primary btn-xs " ><i class="fa fa-pencil"> Insert</i></a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table id="example5" class="table table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Kompetensi</th>
                <th>Rayon</th>
                <th>Sub Rayon</th>
                <th>Cabang/Ranting</th>
                <th>Tgl Pindah/Out</th>
                <th>Status Keanggotaan</th>
                <th>Alasan Pindah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1 @endphp
              @foreach($kea as $item)
              <tr>
                <td>{{$no}}</td>
                <td>{{$item->kompetensi['kompetensi']}}</td>
                <td>{{$item->cabang->subrayon->rayon->namarayon}}</td>
                <td>{{$item->cabang->subrayon->namasubrayon}}</td>
                <td>{{$item->cabang->namacabang}}</td>
                <td>{{$item->tglregistrasipindah}}</td>
                <td>{{$item->statuskeanggotaan}}</td>
                <td>{{$item->alasanpindah}}</td>
                <td>
                  <a href="{{ route('keanggotaan.edit',$item->idkeanggotaan)}}" class="btn btn-xs btn-warning" type="submit">
                    <span class="glyphicon glyphicon-edit"></span> 
                  </a>     
                </td>
              </tr>
              @php $no++ @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
