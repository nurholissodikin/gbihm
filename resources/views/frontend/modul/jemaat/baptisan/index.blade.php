@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pelayanan Jemaat
      </h1>
    </section>
    <br>

    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <a href="{{url('modul/pelayanjemaat/baptisan/caper')}}" class="btn btn-primary">Calon Peserta Baptisan</a>
            <a href="{{url('dokumenbaptisan')}}" class="btn btn-primary ">Master Dokumen</a>
            <a href="{{url('modul/pelayanjemaat/baptisan/pendaftaran')}}" class="btn btn-primary ">Form Pendaftaran Baptisan</a>
            <a href="{{url('modul/pelayanjemaat/baptisan/tambahakta')}}" class="btn btn-primary ">Tambah Akta Baptisan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Baptisan</h3>
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
                   @foreach($baptisan as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                     <td>{{$data->namarayon}}</td>
                      <td>{{$data->namacabang}}</td>
                      <td>{{$data->noakta}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->namalengkap_p}}</td>
                      <td>{{$data->namapelayan}}</td>
                      <td>{{$data->dokumen}}</td> 
                      <td>
                        <a href="{{ url('modul/pelayanjemaat/baptisan/tambahakta/detail',$data->idbaptisan)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pelayanjemaat/baptisan/tambahakta/edit',$data->idbaptisan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
                <label>Note : List Akta Baptisan adalah Jemaat yang sudah menerima Akta Baptisan</label>
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