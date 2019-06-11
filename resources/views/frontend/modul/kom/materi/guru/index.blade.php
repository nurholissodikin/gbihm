@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pengajar KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Data Materi KOM</h3>
              </center>

            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kode Materi</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$materi->materi}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Materi</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$materi->materi}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>KOM Seri</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$materi->kom_seri}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Tambah Pengajar KOM</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form  action="{{url('materipengajar/store')}}" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                   <input type="hidden" name="idmateri" value="{{$materi->id}}">
                  <input type="hidden" name="created" value="{{Auth::user()->id}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pengajar</label>
                      <select name="guru" class="form-control select2" style="width: 100%"> 
                        <option value="">=== Pilih Pengajar ===</option>
                        @foreach($guru as $data)
                        <option value="{{$data->id}}">{{$data->personal['namalengkap']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                    </div>
                  </div>
                </form>  
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Materi KOM</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Rayon/Cabang</th>
                      <th>Angkatan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($materiguru as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->guru['idpersonal']}}</td>
                      <td>{{$item->guru->personal['namalengkap']}}</td>
                      <td>{{$item->guru->rayon['namarayon']}}</td>
                      <td>{{$item->guru['angkatan']}}</td>
                      <td>{{$item->guru['status']}}</td>
                      <td>
                        <a href="{{ url('materi/pengajar/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <button class="btn btn-xs btn-danger" onclick="del_mape({{$item->id}})">
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
  function del_mape(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pengajar ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('materipengajar/delete')}}"+"/"+id,function(){
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