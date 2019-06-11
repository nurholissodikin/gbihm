@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Ibadah Raya Tambah Pelayan- <b>{{$ibadahraya->nama_ibadah}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form action="{{url('ibadahrayapelayan/store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data {{$ibadahraya->nama_ibadah}}</h3>
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
                        <input type="hidden" name="idibadahraya" value="{{$ibadahraya->id}}">
                         @php
                        $a = date('l,d F Y', strtotime($ibadahraya->tanggal));
                        @endphp
                        <label>: &nbsp; <b><span class="pero">{{$a}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tempat/Rauangan</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$ibadahraya->tempat}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Kordinator</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$ibadahraya->personal['namalengkap']}}</span></b></label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Pelayan {{$ibadahraya->nama_ibadah}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pelayan</label>
                        <select class="form-control select2" name="idjabpel" id="idjabpel" required="" style="width: 100%">
                          <option value="">== Pilih Pelayan ==</option>
                          @foreach($personal as $data)
                          <option  value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>  
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Status</label>
                          <input type="text" name="status" class="form-control" readonly="" id="status_k">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID Personal</label>
                          <input type="text" name="status" class="form-control" id="idpersonal_k" readonly="">
                      </div>
                    </div>
                   <!--  <div class="col-md-12">
                      <div class="form-group">
                        <label>Type Kartu</label>
                          <input type="text" name="status" class="form-control"  readonly="">
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                          <input type="text" name="status" class="form-control" id="nama_k" readonly="">
                      </div>
                    </div>
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label>Jabatan</label>
                          <input type="text" name="status" class="form-control" id="jabatan_k" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Divisi/Rayon</label>
                          <input type="text" name="status" class="form-control" id="rayon_k" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>SubRayon</label>
                          <input type="text" name="status" class="form-control" id="subrayon_k" readonly="">
                      </div>
                    </div>    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Cabang</label>
                          <input type="text" name="status" class="form-control" id="cabang_k" readonly="">
                      </div>
                    </div> -->
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
  $(document).ready(function(){
    $("#idjabpel").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('kegiatan/get')}}"+"/"+id,function(value){
        $('#status_k').val(value.status);
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
//     $.get("{{url('ibadahraya/get')}}"+"/"+idjabpel,function(value){
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