<br>

    <div class="col-md-12">
      <div id="tab" class="btn-group btn-group-justified" data-toggle="buttons">
        <a href="#peja" class="btn btn-primary btn-ena-ena  active" data-toggle="tab" id="form_pela">
          <input type="radio" />Pelayanan Jemaat
        </a>
        <a href="#diserahkan" class="btn btn-primary btn-ena-ena " data-toggle="tab" id="form_diserahkan" >
          <input type="radio" />Diserahkan
        </a>
        <a href="#baptisan" class="btn btn-primary btn-ena-ena " data-toggle="tab" id="form_baptisan" >
          <input type="radio" />Baptisan
        </a>
        <a href="#baptis" class="btn btn-primary btn-ena-ena " data-toggle="tab" id="form_baptis" >
          <input type="radio" />Baptis Roh Kudus
        </a>
        <a href="#nikah" class="btn btn-primary btn-ena-ena " data-toggle="tab" id="form_nikah">
          <input type="radio" />Nikah
        </a>
        <a href="#anak" class="btn btn-primary btn-ena-ena " data-toggle="tab" id="form_anak">
          <input type="radio" />Peneyerahan Anak
        </a>
      </div>

      <div class="tab-content">
        <div class="tab-pane active" id="peja">
          @include('frontend.jemaat.index')
        </div>
        <div class="tab-pane" id="diserahkan">
          @include('frontend.jemaat.diserahkan.index')
        </div>
        <div class="tab-pane" id="baptisan">
          @include('frontend.jemaat.baptisan.index')
        </div>
        <div class="tab-pane" id="baptis">
          @include('frontend.jemaat.baptisrohkudus.index')
        </div>
        <div class="tab-pane" id="nikah">
          @include('frontend.jemaat.nikah.index')
        </div>
        <div class="tab-pane" id="anak">
          @include('frontend.jemaat.penyerahananak.index')
        </div>
        
      </div>  
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Sakramen</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table  class="table table-bordered table-striped" >
            <thead>
              <tr>
                <th>No</th>
                <th>Jenis Sertifikat</th>
                <th>Tanggal</th>
                <th>No Sertifikat</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Dokumen</th>
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
                <td>{{$item->jurusan}}</td>
                <td>{{$item->dokumen}}</td>
                <td>
                  <button class="edit-modala btn btn-xs btn-warning" data-iddiserahkan="{{$item->iddiserahkan}}" data-noakta="{{$item->noakta}}" data-tanggal="{{$item->tanggal}}" data-idcabangranting="{{$item->idcabangranting}}" data-idpelayan="{{$item->idpelayan}}" data-dokumen="{{$item->dokumen}}" data-idpersonal="{{$item->idpersonal}}">
                    <span class="glyphicon glyphicon-edit"></span> 
                  </button>     
                  <button class="btn btn-xs btn-danger" onclick="del_di({{$item->iddiserahkan}})">
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
 