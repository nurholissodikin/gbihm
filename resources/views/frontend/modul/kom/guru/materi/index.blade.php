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
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Guru KOM</h3>
              </center>

            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>ID Personal</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$guru->idpersonal}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$guru->personal['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$guru->personal['jeniskelamin']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Rayon</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$guru->rayon['namarayon']}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Tambah Materi KOM</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form  action="{{url('gurumateri/store')}}" enctype="multipart/form-data" method="post">
                  {{csrf_field()}}
                   <input type="hidden" name="idguru" value="{{$guru->id}}">
                  <input type="hidden" name="created" value="{{Auth::user()->id}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Materi</label>
                      <select name="materi" class="form-control select2" style="width: 100%"> 
                        <option value="">=== Pilih Materi ===</option>
                        @foreach($materi as $data)
                        <option value="{{$data->id}}">{{$data->materi}}</option>
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
                      <th>Kode Materi</th>
                      <th>Materi</th>
                      <th>KOM Seri</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($materiguru as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->materi['kode_materi']}}</td>
                      <td>{{$item->materi['materi']}}</td>
                      <td>{{$item->materi['kom_seri']}}</td>
                      <td>
                        <a href="{{ url('guru/materi/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
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
      title: "Apakah Anda Ingin Menghapus Materi ?",
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