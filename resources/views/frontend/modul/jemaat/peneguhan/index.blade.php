@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pelayanan Jemaat
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <a href="{{url('modul/pelayanjemaat/peneguhan/caper')}}" class="btn btn-primary">Calon Peserta Peneguhan</a>
          <a href="{{url('dokumenanak')}}" class="btn btn-primary">Master Dokumen</a>
          <a href="{{url('modul/pelayanjemaat/peneguhan/pendaftaran')}}" class="btn btn-primary">Form Pendaftaran Peneguhan</a>
          <a href="{{url('modul/pelayanjemaat/peneguhan/tambahakta')}}" class="btn btn-primary">Tambah Akta Peneguhan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Peneguhan Nikah</h3>
               <a href="{{url('modul/pelayanjemaat/peneguhan/pendaftaran')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Rayon</th>
                      <th>Cabang / Ranting</th>
                      <th>No. Akta</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Pelayan</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($peneguhan as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->namarayon}}</td>
                      <td>{{$data->namacabang}}</td>
                      <td>{{$data->noakta}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->namalengkap_anak}}</td>
                      <td>{{$data->namalengkap_pelayan}}</td>
                      <td>{{$data->dokumen}}</td> 
                      <td>
                        <a href="{{ url('modul/pelayanjemaat/peneguhan/tambahakta/detail',$data->idpeneguhan)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pelayanjemaat/peneguhan/tambahakta/edit',$data->idpeneguhan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
                <label>Note : List Akta Peneguhan Nikah adalah Jemaat yang sudah menerima Akta Peneguhan Nikah</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('scriptz')
<script type="text/javascript">
  function del_person(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Personal ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('personal/destroy/')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",

          });
          location.reload();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }
</script>
@endpush