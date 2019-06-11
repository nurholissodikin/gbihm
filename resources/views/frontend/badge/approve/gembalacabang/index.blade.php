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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pengerja</a></li>
              <li><a href="#tab_2" data-toggle="tab">COOL</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tamu</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @include('frontend.badge.approve.gembalacabang.pengerja')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('frontend.badge.approve.gembalacabang.cool')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('frontend.badge.approve.gembalacabang.tamu')
              </div>
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
  $('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.selected-all').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.selected-all').each(function() {
            this.checked = false;                       
        });
    }
  });
  $('#select-all-tamu').click(function(event) {   
    if(this.checked) {
      // Iterate each checkbox
      $('.selected-all-tamu').each(function() {
        this.checked = true;                        
      });
    } else {
      $('.selected-all-tamu').each(function() {
        this.checked = false;                       
      });
    }
  });
  $('#select-all-cool').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $('.selected-all-cool').each(function() {
            this.checked = true;                        
        });
    } else {
        $('.selected-all-cool').each(function() {
            this.checked = false;                       
        });
    }
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{csrf_token()}}",
    }
  });
  function save_kirim_all(){
    let formData = new FormData($('#form-kirim')[0]);
    $.ajax({
      url: "{{url('pengerja_approve/adminrayon/all')}}",
      method: 'POST',
      data: formData,
      processData: false, 
      contentType: false,       
      beforeSend: function(){
        $('.text-danger').remove()
      },
      success: function(res){
        console.log(res);
        swal({
            title: "Berhasil Disimpan",
            icon: "success",
           
          });
      },
      // error: function(xhr){
      //   let errors = xhr.responseJSON.errors;
      //   for(let key in errors){
      //     let el = $('[name="'+key+'"]');
      //     el.after('<span class="text-danger">'+errors[key]+'</span>'); 
      //   }
      // },
    })
  }
</script>
@endpush