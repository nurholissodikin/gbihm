@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kegiatan - <b>{{$kegiatan->nama_kegiatan}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
              <h3 class="box-title ">Data {{$kegiatan->nama_kegiatan}}</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Hari/Tanggal</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$kegiatan->tgl_mulai}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tempat/Ruangan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$kegiatan->tempat}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kordinator</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$kegiatan->personal['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
              <h3 class="box-title">Pelayan {{$kegiatan->nama_kegiatan}}</h3>
              
               <a href="{{url('modul/kegiatan/pelayan/create/'.$kegiatan->id)}}" class="btn btn-primary btn-block-small pull-right btn-xs" ><i class="fa fa-plus"></i></a>
               </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">        
                  <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Reg</th>
                        <th>ID Personal</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Gereja</th>
                        <th>Melayani Sebagai</th>
                        <th>Hadir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1 @endphp
                      @foreach($peke as $item)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->personal['idpersonal']}}</td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>{{$item->personal['jeniskelamin']}}</td>
                        <td>{{$item->personal['nohp']}}</td>
                        <td>{{$item->personal['gereja']}}</td>
                        <td>{{$item->melayani}}</td>
                        <td>{{$item->hadir}}</td>
                        <td>
                          <a href="{{ url('kegiatan/detail/pelayan',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                          <button class="btn btn-xs btn-danger" onclick="del_pelke({{$item->id}})">
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
  function del_pelke(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pelayan Kegiatan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('kegiatanpelayan/delete/')}}"+"/"+id,function(){
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