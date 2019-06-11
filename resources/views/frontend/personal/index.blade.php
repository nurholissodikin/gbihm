@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1 class="pull-left">
        Personal
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Personal</h3>
               <a href="{{url('/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
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
                      <th>No Hp</th>
                      <th>Alamat</th>
                      <th>Gereja</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($personal as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->idpersonal}}</td>
                      <td>{{$data->namalengkap}}</td>
                      <td>{{$data->jeniskelamin}}</td>
                      <td>{{$data->nohp}}</td>
                      <td>{{$data->alamattinggal}}</td>
                      <td>{{$data->gerejaawal}}</td>
                      <td>{{$data->email}}</td> 
                      <td>
                        <a href="{{ route('personal.show',$data->idpersonal)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('personal.edit',$data->idpersonal)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_person({{$data->idpersonal}})">
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