@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Pertemuan
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Pertemuan</h3>
               <a href="{{route('pertemuan.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Pertemuan</th>
                      <th>Tanggal</th>
                      <th>Nama Pertemuan</th>
                      <th>Tempat</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($pertemuan as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->kode}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->nama}}</td>
                      <td>{{$data->tempat}}p</td> 
                      <td>
                        <a href="{{ url('pertemuan/absensi',$data->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Absensi</a>
                        <a href="{{ route('pertemuan.show',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('pertemuan.edit',$data->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
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
  function del_person(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pertemuan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('pertemuan/destroy/')}}"+"/"+id,function(){
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