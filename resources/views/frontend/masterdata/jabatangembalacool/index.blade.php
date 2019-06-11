@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Master Data
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Jabatan Gembala COOL</h3>
              </div>
              <br>
              <form  action="{{route('jabatangembalacool.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
               <input type="hidden" name="created" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Jabatan</label>
                    <input type="number" name="kode" class="form-control" placeholder="Kode Jabatan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Nama Jabatan">
                  </div>                  
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Jabatan Gembala COOL</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Jabatan</th>
                      <th>Jabatan</th>
                      <th>User Created</th>
                      <th>User Updated</th>
                      <th>Date Created</th>
                      <th>Date Update</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($jabatan as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->kode_jabatan}}</td>
                      <td>{{$item->jabatan_gembala}}</td>
                      <td>{{$item->user_created['name']}}</td>
                      <td>{{$item->user_updated['name']}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>
                        <a href="{{ route('jabatangembalacool.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_jabatancool({{$item->id}})">
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
  function del_jabatancool(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Jabatan Gembala COOL ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('jabatangembalacool/delete')}}"+"/"+id,function(){
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