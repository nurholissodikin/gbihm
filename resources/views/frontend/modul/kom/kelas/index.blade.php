@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Kelas KOM</h3>
              <a href="{{route('kelaskom.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover table" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Rayon</th>
                      <th>KOM Seri</th>
                      <th>Angkatan</th>
                      <th>Tanggal Mulai Kelas</th>
                      <th>Periode</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($kelas as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->rayon['namarayon']}}</td>
                      <td>{{$item->kom_seri}}</td>
                      <td>{{$item->angkatan}}</td>
                      <td>{{$item->tgl_mulai}}</td>
                      <td>{{$item->periode_m}} - {{$item->periode}}</td>
                      <td>
                          <a href="{{ url('kelaskom/murid',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Murid</a>
                          <a href="{{ url('kelaskom/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i> </a>
                        <a href="{{ route('kelaskom.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_kel({{$item->id}})">
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
        </div>
      </div>
    </section>
  </div>
 @endsection 
 @push('scriptz')
<script type="text/javascript">
  function del_kel(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Data Kelas ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('kelaskom/delete')}}"+"/"+id,function(){
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