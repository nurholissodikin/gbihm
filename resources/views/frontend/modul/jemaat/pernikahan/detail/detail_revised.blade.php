@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pelayanan Jemaat
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Pendaftaran Pernikahan - Revised</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <section>
                <div class="wizard">
                  <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Pernikahan">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-user"></i>
                          </span>
                        </a>
                      </li>
                      <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Dokumen Pernikahan">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-folder-open"></i>
                          </span>
                          </a>
                      </li>
                      <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Berita Acara">
                          <span class="round-tab">
                            <i class="fa fa-file-text-o"></i>
                          </span>
                        </a>
                      </li>
                      <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Catatan / Keterangan">
                          <span class="round-tab">
                            <i class="glyphicon glyphicon-pencil"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                    
                  <form role="form" action="{{url('pernikahan/caper_update',$pernikahan->idpernikahan)}}" enctype="multipart/form-data" method="post" id="formba">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="method_type">  
                    <input type="hidden" name="status" value="In Confirmation">
                    <input type="hidden" name="idayahibupas" value="{{$pernikahan->idayahibupas}}">
                    <input type="hidden" name="idayahibuper" value="{{$pernikahan->idayahibuper}}">  
                    <div class="tab-content">
                      <div class="tab-pane active" role="tabpanel" id="step1">
                        @include('frontend.modul.jemaat.pernikahan.caper.edit_personal')
                      </div>
                      <div class="tab-pane" role="tabpanel" id="step2"> 
                        @include('frontend.modul.jemaat.pernikahan.caper.edit_dokumen')
                      </div>
                      <div class="tab-pane" role="tabpanel" id="step3">
                        @include('frontend.modul.jemaat.pernikahan.caper.edit_berita')
                      </div>
                      <div class="tab-pane" role="tabpanel" id="complete">
                        @include('frontend.modul.jemaat.pernikahan.caper.edit_keterangan')
                      </div>
                    </div>
                  </form>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push('scriptz')
<script type="text/javascript">
  $(document).ready(function () {
    $("#idpersonal").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      $.get("{{url('bap_personal/get')}}"+"/"+id,function(value){
        $('#status_b').val(value.status);
        $('#idpersonal_b').val(value.idpersonal);
        $('#namadepan_b').val(value.nama_lengkap);
        $('#namatengah_b').val(value.nama_tengah);
        $('#namabelakang_b').val(value.nama_lengkap);
        $('#tempatlahir_b').val(value.tempat_lahir);
        $('#tanggallahir_b').val(value.tanggal_la);
        // $('#jabatan_k').val(value.jabatan);
        // $('#rayon_k').val(value.rayon);
        // $('#subrayon_k').val(value.subrayon);
        // $('#cabang_k').val(value.cabang);
      });
    });
 
   $('#id_baptisanibupersonal').on('change', function(){
      if($('#id_baptisanibupersonal').val()){
        $('.ibu').prop('disabled', true);
      }else{
        $('.ibu').prop('disabled', false);
      }
    });
   $('#id_tempat_rayon').on('change', function(){
      if($('#id_tempat_rayon').val()){
        $('.ray_tem').prop('disabled', true);
      }else{
        $('.ray_tem').prop('disabled', false);
      }
    });
   $('#id_tempat_subrayon').on('change', function(){
      if($('#id_tempat_subrayon').val()){
        $('.sub_tem').prop('disabled', true);
      }else{
        $('.sub_tem').prop('disabled', false);
      }
    });
   $('#id_tempat_cabang').on('change', function(){
      if($('#id_tempat_cabang').val()){
        $('.cab_tem').prop('disabled', true);
      }else{
        $('.cab_tem').prop('disabled', false);
      }
    });
   $('#id_baptisanayahpersonal').on('change', function(){
      if($('#id_baptisanayahpersonal').val()){
        $('.ayah').prop('disabled', true);
      }else{
        $('.ayah').prop('disabled', false);
      }
    });
   $('#id_ayahnikahpersonal').on('change', function(){
      if($('#id_ayahnikahpersonal').val()){
        $('.ayahn').prop('disabled', true);
      }else{
        $('.ayahn').prop('disabled', false);
      }
    });
   $('#id_ibunikahpersonal').on('change', function(){
      if($('#id_ibunikahpersonal').val()){
        $('.ibun').prop('disabled', true);
      }else{
        $('.ibun').prop('disabled', false);
      }
    });

  //Initialize tooltips
   $('.nav-tabs > li a[title]').tooltip();

  //Wizard
   $('a[data-toggle="tab"]').on('show.bs.tab', function (e){

      var $target = $(e.target);

      if ($target.parent().hasClass('disabled')) {
          return false;
      }
   });

   $(".next-step").click(function (e){
      var $active = $('.wizard .nav-tabs li.active');
      $active.next().removeClass('disabled');
      nextTab($active);
   });
   $(".prev-step").click(function (e){

      var $active = $('.wizard .nav-tabs li.active');
      prevTab($active);
   });

   $("#chkPassport").click(function () {
      if ($(this).is(":checked")) {
        $(".show17").show();
      } else {
        $(".show17").hide();
    }
    });
 });

  function asaaa(){
    var id_personal = $('#personal_nama').val();
    if(id_personal != null){
      $.get("{{url('bap_personal/get')}}"+"/"+id_personal,function(value){

        $('#namadepan_b').val(value.nama_depan);
        $('#namatengah_b').val(value.nama_tengah);
        $('#namabelakang_b').val(value.nama_belakang);
        $('#tempatlahir_b').val(value.tempat_la);
        $('#tanggal_la').val(value.tanggal_la);
      })
    }
    if(!id_personal){
      $('#namadepan_b').val(null);
      $('#namatengah_b').val(null);
      $('#namabelakang_b').val(null);
      $('#tempatlahir_b').val(null);
      $('#tanggal_la').val(null);
    }
  }
  function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
  }

</script>
@endpush