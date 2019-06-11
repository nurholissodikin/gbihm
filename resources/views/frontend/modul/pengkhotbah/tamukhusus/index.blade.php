@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Pengkhotbah
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Tamu Khusus</h3>
               <a href="{{url('modul/pengkhotbah/tamukhusus/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Jenis Badge</th>
                      <th>Cabang</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($tamukhusus as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->idtamukhusus}}</td>
                      <td>{{$data->namalengkap}}</td>
                      <td>{{$data->jeniskelamin}}</td>
                      <td>{{$data->jenisbadge}}</td> 
                      <td>{{$data->cabang}}</td>
                      <td>{{$data->email}}</td>
                      <td>
                        <a href="{{ url('modul/pengkhotbah/tamukhusus/detail',$data->idtamukhusus)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pengkhotbah/tamukhusus/'.$data->idtamukhusus.'/edit')}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_taku({{$data->idtamukhusus}})">
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
  function del_taku(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Tamu Khusus ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('tamukhusus/destroy/')}}"+"/"+id,function(){
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