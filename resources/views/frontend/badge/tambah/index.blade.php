
@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        MDPJ
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
         <div class="nav-tabs-custom">
            <?php $role = Auth::user()->form; ?>

            <ul class="nav nav-tabs">
              @if($role == 'PENGERJA')
                <li class="active"><a href="#tab_1" data-toggle="tab">Pengerja</a></li>
              @elseif($role == 'COOL')
                <li class="active"><a href="#tab_2" data-toggle="tab">COOL </a></li>
              @elseif($role == 'TAMU')
                <li class="active"><a href="#tab_3" data-toggle="tab">Tamu</a></li>
              @else($role == null)
                <li class="active"><a href="#tab_1" data-toggle="tab">Pengerja</a></li>
                <li><a href="#tab_2" data-toggle="tab">COOL </a></li>
                <li><a href="#tab_3" data-toggle="tab">Tamu</a></li>
              @endif
            </ul>
            <div class="tab-content">
              @if(Session::has('alert-success'))
              <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
              @endif
              @if($role == 'PENGERJA')
                <div class="tab-pane active" id="tab_1">
                  @include('frontend.badge.tambah.pengerja')
                </div>
              @elseif($role == 'COOL')
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2">
                  @include('frontend.badge.tambah.cool')
                </div>
              @elseif($role == 'TAMU')
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_3">
                  @include('frontend.badge.tambah.tamu')
                </div>
              @else($role == null)
                <div class="tab-pane active" id="tab_1">
                  @include('frontend.badge.tambah.pengerja')
                </div>
                <div class="tab-pane" id="tab_2">
                  @include('frontend.badge.tambah.cool')
                </div>
                <div class="tab-pane" id="tab_3">
                  @include('frontend.badge.tambah.tamu')
                </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>
@endsection
@push('script')
<script type="text/javascript">
   
    
    $(function(){
     $(".datepicker").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
     $("#tgl_mulai").on('changeDate', function(selected) {
      var startDate = new Date(selected.date.valueOf());
      $("#tgl_akhir").datepicker('setStartDate', startDate);
      if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
        $("#tgl_akhir").val($("#tgl_mulai").val());
      }
    });
   });
   function save_tamu(){
    let formData = new FormData($('#formtamu')[0]);
    $.ajax({
      url: "{{url('mdpj/tamukhusus/store')}}",
      method: 'POST',
      data: formData,
      processData: false, 
      contentType: false,       
      beforeSend: function(){
        $('.text-danger').remove()
      },
      success: function(res){
        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          }).then(function() {
          window.location = "{{url('mdpj/badge')}}";
      });
         
      },
      error: function(xhr){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
  }
  function save_tamu_cetak(){
    let formData = new FormData($('#formtamu')[0]);
    $.ajax({
      url: "{{url('tamukhusus/store_cetak')}}",
      method: 'POST',
      data: formData,
      processData: false, 
      contentType: false,       
      beforeSend: function(){
        $('.text-danger').remove()
      },
      success: function(res){
        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          }).then(function() {
          window.location = "{{url('modul/pengkhotbah/tamukhusus')}}";
      });
         
      },
      error: function(xhr){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    });
  }
  
</script>
@endpush
