@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Tambah Peserta Kegiatan- <b>{{$kegiatan->nama_kegiatan}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form action="{{route('kegiatanpeserta.store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
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
                        <input type="hidden" name="idkegiatan" value="{{$kegiatan->id}}">
                        <label>: &nbsp; <b><span class="pero">{{$kegiatan->tgl_mulai}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tempat/Rauangan</label>  
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
                <h3 class="box-title ">Peserta {{$kegiatan->nama_kegiatan}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Peserta</label>
                        <select class="form-control select2" name="idpeserta" required="" id="idjabpel" style="width: 100%">
                          <option value="">== Pilih Peserta ==</option>
                          @foreach($personal as $data)
                          <option  value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>  
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                          <input type="text"  class="form-control" id="nama_k" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. HP</label>
                          <input type="text"  class="form-control" id="nohp_k" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kehadiran</label>
                        <select class="form-control select2" name="hadir" style="width: 100%">
                          <option value="Hadir">Hadir</option>
                          <option value="Ijin">Ijin</option>  
                          <option value="Alpha">Alpha</option>
                          <option value="Terlambat">Terlambat</option>
                          <option value="Sakit">Sakit</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alasan</label>
                        <textarea class="form-control" name="alasan" rows="3"></textarea>
                      </div>
                    </div>
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
  $(document).ready(function(){
    $("#idjabpel").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('kegiatan/get')}}"+"/"+id,function(value){
        $('#nohp_k').val(value.nohp);
        $('#idpersonal_k').val(value.idpersonal);
        $('#nama_k').val(value.nama_lengkap);
        // $('#jabatan_k').val(value.jabatan);
        // $('#rayon_k').val(value.rayon);
        // $('#subrayon_k').val(value.subrayon);
        // $('#cabang_k').val(value.cabang);
      });
    });
  });
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