<br>
<br>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Data Pelayanan Rohani</h3>
    <div class="box-tools pull-right">
      <a href="{{url('pelayanan/create/'.$personal->idpersonal)}}" type="submit" id="val_pero" class="btn btn-primary btn-xs " ><i class="fa fa-pencil"> Insert</i></a>
       @foreach($pelayanana as $pl)
      <a href="{{url('pelayanan/edit/'.$pl->id)}}" type="submit" id="edit_pero" class="btn btn-primary btn-xs " ><i class="fa fa-pencil"> Edit</i></a>
      @endforeach
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-3">
          <div class="form-group">
            <label>No. Sertifikat SOM/KOM Terakhir</label>  
          </div>
        </div>
        @foreach($pelayanana as $pelayananaa)
        <div class="col-md-9"> 
          <div class="form-group">
            <label>: &nbsp; <b><span class="pero">{{$pelayananaa->nosertifikat}}</span></b></label> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Melayani Sejak</label>  
          </div>
        </div>
        <div class="col-md-9"> 
          <div class="form-group">
            <label>: &nbsp; <b><span class="pero">
              @php
              $a = $pelayananaa->sejak;   
              $sejak = date('d F Y', strtotime($a));
              @endphp
            {{$sejak}}</span></b></label> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Dokumen</label>  
          </div>
        </div>
        <div class="col-md-9"> 
          <div class="form-group">
            <label>: &nbsp; <b><span class="pero">{{$pelayananaa->dokumen}}</span></b></label> 
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
<br>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Jabatan Pelayanan</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table  class="table table-bordered table-striped" >
          <thead>
            <tr>
              <th>No</th>
              <th>No. Ref.</th>
              <th>Jabatan</th>
              <th>Tempat</th>
              <th>Masa Jabatan</th>
              <th>Tanggal Lantik</th>
              <th>Rekomendasi</th>
              <th>No. Sertifikat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="jabpel2_data">
            @php $no = 1 @endphp
            @foreach($jabpel as $item)
            <tr class="item{{$item->iddiserahkan}}">
              <td>{{$no}}</td>
              <td>{{$item->noreferensi}}</td>
              <td>{{$item->jabatan}}</td>
              <td>{{$item->tempat}}</td>
              <td> 
                @php
                  $a = $item->sejak;   
                  $b = $item->sampai;   
                  $sejak = date('d F Y', strtotime($a));
                  $sampai = date('d F Y', strtotime($b));
                @endphp
                {{$sejak}} Sampai {{$sampai}}</td>
              <td>{{$item->tgl}}</td>
              <td>{{$item->pengerjaa['namalengkap']}}</td>
              <td>{{$item->nosertifikat}}</td>
              <td>{{$item->status}}</td>
              <td>
               <button class="btn btn-xs btn-warning" onclick="edit_jabpel({{$item->id}})">
                  <span class="glyphicon glyphicon-edit"></span> 
                </button>     
                <button class="btn btn-xs btn-danger" onclick="del_jabpel({{$item->id}})">
                  <span class="glyphicon glyphicon-trash"></span> 
                </button>
              </td>
            </tr>
            @php $no++ @endphp
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
<br>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Histori Mutasi Antar Divisi/Rayon/CK</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table  class="table table-bordered table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>ID Mutasi</th>
          <th>ID Transaksi</th>
          <th>Div/Rayon/CK Asal</th>
          <th>Div/Rayon/CK Penerima</th>
          <th>Tanggal Non Aktif</th>
          <th>Tgl Aktif</th>
          <th>Approver</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="di_data">
        @php $no = 1 @endphp
        @foreach($diserahkan as $item)
        <tr class="item{{$item->iddiserahkan}}">
          <td>{{$no}}</td>
          <td>{{$item->tingkatpendidikan}}</td>
          <td>{{$item->tanggal}}</td>
          <td>{{$item->noakta}}</td>
          <td>{{$item->jurusan}}</td>
          <td>{{$item->dokumen}}</td>
          <td>{{$item->dokumen}}</td>
          <td>{{$item->dokumen}}</td>
          <td>{{$item->dokumen}}</td>
          <td>
            <button class="edit-modala btn btn-xs btn-warning" data-iddiserahkan="{{$item->iddiserahkan}}" data-noakta="{{$item->noakta}}" data-tanggal="{{$item->tanggal}}" data-idcabangranting="{{$item->idcabangranting}}" data-idpelayan="{{$item->idpelayan}}" data-dokumen="{{$item->dokumen}}" data-idpersonal="{{$item->idpersonal}}">
              <span class="glyphicon glyphicon-edit"></span> 
            </button>     
            <button class="btn btn-xs btn-danger" onclick="del_di({{$item->iddiserahkan}} )">
              <span class="glyphicon glyphicon-trash"></span> 
            </button>
          </td>
        </tr>
        @php $no++ @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Histori Badge</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table  class="table table-bordered table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Tanggal</th>
          <th>Approver</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="di_data">
        @php $no = 1 @endphp
        @foreach($saldo as $item)
        <tr class="item{{$item->iddiserahkan}}">
          <td>{{$no}}</td>
          <td>{{$item->id}}</td>
          <td>{{$item->tanggal}}</td>
          <td>{{$item->saldo}}</td>
          <td>{{$item->jurusan}}</td>
          <td>
            <button class="edit-modala btn btn-xs btn-warning" data-iddiserahkan="{{$item->iddiserahkan}}" data-noakta="{{$item->noakta}}" data-tanggal="{{$item->tanggal}}" data-idcabangranting="{{$item->idcabangranting}}" data-idpelayan="{{$item->idpelayan}}" data-dokumen="{{$item->dokumen}}" data-idpersonal="{{$item->idpersonal}}">
              <span class="glyphicon glyphicon-edit"></span> 
            </button>     
            <button class="btn btn-xs btn-danger" onclick="del_di({{$item->iddiserahkan}} )">
              <span class="glyphicon glyphicon-trash"></span> 
            </button>
          </td>
        </tr>
        @php $no++ @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>