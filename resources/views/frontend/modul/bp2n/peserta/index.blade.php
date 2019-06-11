@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        BP2N
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('bp2nkonseling')}}" class="btn btn-primary">Konseling</a>
          <a href="{{url('bp2n/kehadiran/pra')}}" class="btn btn-primary">Kehadiran Pra</a>
          <a href="{{url('bp2n/kehadiran/pasca')}}" class="btn btn-primary">Kehadiran Pasca</a>
          <a href="#" class="btn btn-primary">Sertifikat</a>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Peserta BP2N</h3>
              <a href="{{route('bp2npeserta.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori Peserta</th>
                      <th>ID Pria</th>
                      <th>Nama Pria</th>
                      <th>ID Wanita</th>
                      <th>Nama Wanita</th>
                      <th>Angkatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($peserta as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->kategori[0]}}</td>
                      <td>{{$item->pria['idpersonal']}}</td>
                      <td>{{$item->pria['namalengkap']}}</td>
                      <td>{{$item->wanita['idpersonal']}}</td>
                      <td>{{$item->wanita['namalengkap']}}</td>
                      <td>{{$item->angkatan}}</td>
                      <td>
                        <a href="{{ route('bp2npeserta.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ route('bp2npeserta.show',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('bp2npeserta/konseling',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> Konseling</a>
                        <a href="{{ url('bp2npeserta/kehadiran',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> Kehadiran</a>
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
  function del_prof(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Kehadiaran Peserta BP2N?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('bp2npeserta/delete')}}"+"/"+id,function(){
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