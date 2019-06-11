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
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Konseling BP2N</h3>
              </div>
              <br>
              <form  action="{{route('bp2nkonseling.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" placeholder="Tanggal " class="form-control datepickerlight">
                    </div>
                  </div>                   
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" name="tempat" class="form-control" placeholder="Tempat">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pejabat</label>
                    <input type="text" name="pejabat" class="form-control" placeholder="Pejabat">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Peserta</label>
                      <select class="form-control select2" name="peserta" id="id_peserta" style="width: 100%;" >
                        <option value="">-- Pilih Peserta --</option>
                        @foreach($peserta as $data)
                        <option value="{{$data->id}}">{{$data->idpria}} | {{$data->pria['namalengkap']}}</option>
                        @endforeach
                      </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ID Pria</label>
                    <input type="text" name="angkatan" id ="id_pria" class="form-control" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>ID Wanita</label>
                    <input type="text" name="angkatan" id ="id_wanita" class="form-control" readonly="">
                  </div>                  
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  
 @push('script')
<script type="text/javascript">
  
  $(document).ready(function(){
    $("#id_peserta").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('get/peserta/konseling')}}"+"/"+id,function(value){
        $('#id_wanita').val(value.id_wanita);
        $('#id_pria').val(value.id_pria);
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