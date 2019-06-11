@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Tambah Kegiatan Pelayan
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form action="{{url('addpelayan/kegiatan')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data Personal {{$personal->namalengkap}}</h3>
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
                        <input type="hidden" name="idpersonal" value="{{$personal->idpersonal}}">
                        <label>: &nbsp; <b><span>{{$personal->idpersonal}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nama lengkap</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$personal->namalengkap}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Status</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$personal->statuspersonal}}</span></b></label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Pilih Kegiatan</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kegiatan</label>
                        <select class="form-control select2" name="idkegiatan" required="" id="idkegiatan" onclick="get_pelayan()" style="width: 100%">
                          <option value="">== Pilih Kegiatan ==</option>
                          @foreach($kegiatan as $data)
                          <option  value="{{$data->id}}">{{$data->id}} || {{$data->nama_kegiatan}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal</label>
                          <input type="text"  class="form-control" id="tgl_ke" readonly="">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jam</label>
                          <input type="text"  class="form-control" id="jam_ke" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Tempat</label>
                          <input type="text"  class="form-control" id="tempat_ke" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kordinator</label>
                          <input type="text"  class="form-control" id="kordinator_ke" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Melayani Sebagai</label>
                        <select class="form-control select2" name="melayani" style="width: 100%">
                          <option value="">== Pilih Jenis Pelayan ==</option>
                          <option value="MC">MC</option>
                          <option value="Singer">Singer</option>  
                          <option value="Kolektan">Kolektan</option>
                          <option value="Usher">Usher</option>
                          <option value="Music">Music</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="hadir" value="Hadir">
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>
      </div>
    </section>
  </div>
  
@endsection
@push('script')
<script type="text/javascript">
  function get_pelayan(){
      var id_kegiatan = $('#idkegiatan').val();
      if(id_kegiatan != null){
        $.get("{{url('kegiatan/get/kegiatan')}}"+"/"+id_kegiatan,function(value){
          $('#tgl_ke').val(value.tanggal);
          $('#jam_ke').val(value.jam);
          $('#tempat_ke').val(value.tempat);
          $('#kordinator_ke').val(value.kordinator);
        })
      }
      if(!id_kegiatan){
        $('#tgl_ke').val(null);
          $('#jam_ke').val(null);
          $('#tempat_ke').val(null);
          $('#kordinator_ke').val(null);
      }
    }
//   function change_id_jabpel(){
//   var idjabpel = document.getElementById("idjabpel").value();
//   if(idjabpel = null){
//     $.get("{{url('kegiatan/get')}}"+"/"+idjabpel,function(value){
//       $('#status_k').val(value.status);
//       $('#idpersonal_k').val(value.idpersonal);
//       $('#nama_k').val(value.nama_lengkap);
//       $('#jabatan_k').val(value.jabatan);
//       $('#rayon_k').val(value.rayon);
//       $('#subrayon-K').val(value.subrayon);
//       $('#cabang_k').val(value.cabang);
//     });
//   if(!idjabpel){
//       $('#status_k').val(null);
//       $('#idpersonal_k').val(null);
//       $('#nama_k').val(null);
//       $('#jabatan_k').val(null);
//       $('#rayon_k').val(null);
//       $('#subrayon_k').val(null);
//       $('#cabang_k').val(null);
//   }
// }
</script>
@endpush