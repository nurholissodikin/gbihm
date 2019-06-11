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
          <a href="{{url('modul/pelayanjemaat/peneguhan/caper')}}" class="btn btn-primary active">Calon Peserta Peneguhan</a>
          <a href="{{url('dokumenanak')}}" class="btn btn-primary">Master Dokumen</a>
          <a href="{{url('modul/pelayanjemaat/peneguhan/pendaftaran')}}" class="btn btn-primary">Form Pendaftaran Peneguhan</a>
          <a href="{{url('modul/pelayanjemaat/peneguhan/tambahakta')}}" class="btn btn-primary">Tambah Akta Peneguhan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Peneguhan Nikah</h3>
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
                      <th>No. ID</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat / Tanggal Lahir</th>
                      <th>No KKJ</th>
                      <th>Status</th>
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
                      <td>{{$data->idpersonal}}</td>
                      <td>{{$data->namalengkap_personal}}</td>
                      <td>{{$data->tempatlahir_personal}}  {{$data->tanggallahir_personal}}</td>
                      <td>{{$data->nokkj}}</td>
                      <td>
                        <?php 
                          if($data->status=='In Confirmation'){
                            $status="In Confirmation";
                            $color="bg-maroon";
                          }else if($data->status=='Revised'){
                            $status="Revised";
                            $color="bg-red";
                          }else if($data->status=='Waiting for Cretificate'){
                            $status="Waiting for Cretificate";
                            $color="bg-green";
                          }else if($data->status=='Akta Peneguhan'){
                            $status="Akta Peneguhan";
                            $color="bg-blue";
                          }
                          else{
                            $status="";
                            $color="";
                          }
                        ?>
                        <span class="label {{$color}}">{{$status}}</span>
                      <td>
                        <a href="{{ url('modul/pelayanjemaat/peneguhan/pendaftaran/detail',$data->idpeneguhan)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pelayanjemaat/peneguhan/pendaftaran/edit',$data->idpeneguhan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
                <label>Note : Jika Akta Peneguhan Nikah sudah dikirim ke Peserta maka Peserta tidak terdaftar lagi di List Calon Peserta Peneguhan Nikah, melainkan pindah ke List Akta Peneguhan Nikah</label>
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