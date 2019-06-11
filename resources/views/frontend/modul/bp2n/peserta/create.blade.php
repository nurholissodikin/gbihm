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
               <h3 class="box-title">Tambah Peserta BP2N</h3>
              </div>
              <br>
              <form  action="{{route('bp2npeserta.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Peserta</label>
                    <td>
                      <br>
                      <input type="checkbox" name="kategori[]" class="minimal" value="Pra Nikah"> Pra Nikah
                    </td>
                    <td>
                      <input type="checkbox" name="kategori[]" class="minimal" value="Pasca Nikah"> Pasca Nikah
                    </td>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pria</label>
                    <div class="input-group date">
                      <select class="form-control select2" name="pria" id="id_pria" style="width: 100%;" >
                        <option value="">-- Pilih Pria --</option>
                        @foreach($pria as $data)
                        <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                        @endforeach
                      </select>
                      <div class="input-group-addon">
                        <a href="{{url('/create')}}" target="_blank" class="btn btn-primary pull-right btn-xs" ><i class="fa fa-plus"> Personal</i></a>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="angkatan" id = "nama_pria" class="form-control" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Wanita</label>
                    <div class="input-group date">
                      <select class="form-control select2" name="wanita" id="id_wanita" style="width: 100%;" >
                        <option value="">-- Pilih Wanita --</option>
                        @foreach($wanita as $data)
                        <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                        @endforeach
                      </select>
                      <div class="input-group-addon">
                        <a href="{{url('/create')}}" target="_blank" class="btn btn-primary pull-right btn-xs" ><i class="fa fa-plus"> Personal</i></a>
                      </div>
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="angkatan" id = "nama_wanita" class="form-control" readonly="">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control">
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
    $("#id_pria").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('get/peserta')}}"+"/"+id,function(value){
        $('#nama_pria').val(value.namalengkap);
      });
    });
  });
   $(document).ready(function(){
    $("#id_wanita").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('get/peserta')}}"+"/"+id,function(value){
        $('#nama_wanita').val(value.namalengkap);
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