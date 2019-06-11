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
               <h3 class="box-title">Tambah Data Jenis Pekerjaan</h3>
              </div>
              <br>
              <form  action="{{route('jenispekerjaan.store')}}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis Pekerjaan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Jenis Pekerjaan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;" required="">
                      <option value="">-- Pilih Status --</option>
                      <option value="Aktif">Aktif</option>
                    </select>
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
              <h3 class="box-title">List Data Jenis Pekerjaan</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Profesi</th>
                      <th>User Created</th>
                      <th>User Updated</th>
                      <th>Date Created</th>
                      <th>Date Update</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($jp as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->jenispekerjaan}}</td>
                      <td>{{$item->usercreated}}</td>
                      <td>{{$item->userupdated}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->updated_at}}</td>
                      <td>
                        <a href="{{ route('jenispekerjaan.edit',$item->idjenispekerjaan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_prof({{$item->idjenispekerjaan}})">
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
  function del_prof(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Jenis Pekerjaan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('jenispekerjaan/delete')}}"+"/"+id,function(){
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