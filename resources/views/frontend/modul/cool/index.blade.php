@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        COOL
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data COOL</h3>
              <a href="{{route('cool.create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"> COOL</i></a>
              <a href="{{ url('cool/histori/all') }}" class="btn btn-primary pull-right" > Histori</a>
              <a href="{{ url('cool/data/absensi') }}" class="btn btn-primary pull-right" > Absensi</a>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tipe COOL</th>
                      <th>Gembala COOL</th>
                      <th>Lokasi COOL</th>
                      <th>Kabupaten / Kota</th>
                      <th>Provinsi</th>
                      <th>Jumlah Anggota COOL</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($cool as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->tipecool['tipecool']}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->lokasi}}</td>
                      <td>{{$item->kabkotaa['name']}}</td>
                      <td>{{$item->provinsia['name']}}</td>
                      @php
                        $aa= \App\Anggotacool::where('idcool',$item->id)->count();
                      @endphp
                      <td>{{$aa}}</td>
                      <td>
                        <a href="{{ url('cool/absensi',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> Absensi</a>
                        <a href="{{ url('cool/anggota',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> Anggota</a>
                         <a href="{{ url('cool/histori',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> Histori</a>
                       <!--  <a href="{{ url('cool/histori',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs"> histori</a> -->
                        <a href="{{ route('cool.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ route('cool.show',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-danger" onclick="del_cool({{$item->id}})">
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
  function del_cool(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Data COOL ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('cool/delete')}}"+"/"+id,function(){
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