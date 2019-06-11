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
          <a href="{{url('modul/pelayanjemaat/pernikahan/caper')}}" class="btn btn-primary">Calon Peserta Pernikahan</a>
          <a href="{{url('dokumenpernikahan')}}" class="btn btn-primary active">Master Dokumen</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/pendaftaran')}}" class="btn btn-primary">Form Pendaftaran Pernikahan</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/tambahakta')}}" class="btn btn-primary">Tambah Akta Pernikahan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Master Dokumen Pernikahan</h3>
               <a href="{{route('dokumenpernikahan.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Dokumen</th>
                      <th>Dokumen</th>
                      <th>User Created</th>
                      <th>User Updated</th>
                      <th>Date Created</th>
                      <th>Date Updated</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($dokumen as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->nama}}</td>
                      <td><a href="{{asset('public/assets/modul/jemaat/pernikahan/dokumen/'.$data->dokumen.'')}}" class="btn bg-navy" target="_blank">{{$data->dokumen}}</a></td>
                      <td>{{$data->usercreated}}</td>
                      <td>{{$data->userupdated}}</td>
                      <td>{{$data->created_at}}</td>
                      <td>{{$data->updated_at}}</td>
                      <td>
                         <a href="{{ route('dokumenpernikahan.edit',$data->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="dokumenpernikahan({{$data->id}})">
                          <span class="glyphicon glyphicon-trash"></span> 
                        </button>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>  
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
  function dokumenpernikahan(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Dokumen Pernikahan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('dokumenpernikahan/delete/')}}"+"/"+id,function(){
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