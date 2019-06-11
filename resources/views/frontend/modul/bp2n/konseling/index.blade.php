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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Peserta BP2N</h3>
              <a href="{{route('bp2nkonseling.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Tempat</th>
                      <th>ID Pria</th>
                      <th>ID Wanita</th>
                      <th>Pejabat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($konseling as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->tempat}}</td>
                      <td>{{$item->peserta['idpria']}}</td>
                      <td>{{$item->peserta['idwanita']}}</td>
                      <td>{{$item->pejabat}}</td>
                      <td>
                        <a href="{{ route('bp2nkonseling.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ route('bp2nkonseling.show',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
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
      title: "Apakah Anda Ingin Menghapus Konseling BP2N?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('bp2nkonseling/delete')}}"+"/"+id,function(){
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