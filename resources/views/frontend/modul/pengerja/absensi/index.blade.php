 @extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
       Absensi Pertemuan
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pengerja" class="btn-absensi" data-toggle="tab" id="tab_pengerja">PENGERJA</a></li>
              <li><a href="#cool" class="btn-absensi" data-toggle="tab" id="tab_cool">COOL</a></li>
              <li><a href="#tamu" class="btn-absensi" data-toggle="tab" id="tab_tamu">TAMU</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="pengerja">
                @include('frontend.modul.pengerja.absensi.pengerja')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="cool">
                @include('frontend.modul.pengerja.absensi.cool')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tamu">
                @include('frontend.modul.pengerja.absensi.tamu')
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
	$("#pengerja_absensi").change(function(){
      $(".alasan_ijin").prop('disabled', $(this).val() != 'Ijin');
    });
    $("#tamu_absensi").change(function(){
      $(".alasan_ijin_tamu").prop('disabled', $(this).val() != 'Ijin');
    });
    $("#tamu_absensi_cool").change(function(){
      $(".alasan_ijin_tamu_cool").prop('disabled', $(this).val() != 'Ijin');
    });
   
 
	function edit_absensi(id){
		$('#tab_pengerja').click();
		$('#form_pengerja').attr('action','{{url('absensipertemuan/update')}}'+'/'+id);
		$('#btn-submit-pengerja').html('Update');
		$.get("{{url('absensipertemuan/get/')}}"+"/"+id,function(data){
			$('#id_pengerja').val(data.idpengerja).trigger('change');
			$('#id_pertemuan').val(data.idpertemuan).trigger('change');
			$('#alasan_kehadiran').val(data.alasan);
			$('.kehadiran').val(data.kehadiran).trigger('change');
		});
	}
	function edit_absensi_tamu(id){
		$('#tab_tamu').click();
		$('#form_tamu').attr('action','{{url('absensipertemuan/update')}}'+'/'+id);
		$('#btn-submit-tamu').html('Update');
		$.get("{{url('absensipertemuan/get/')}}"+"/"+id,function(data){
			$('#id_pertemuan').val(data.idpertemuan).trigger('change');
			$('#id_tamukhusus').val(data.idtamukhusus).trigger('change');
			$('#alasan_kehadiran_tamu').val(data.alasan);
			$('.kehadiran_tamu').val(data.kehadiran).trigger('change');
		});
	}
	function edit_absensi_cool(id){
		$('#tab_cool').click();
		$('#form_cool').attr('action','{{url('absensipertemuan/update')}}'+'/'+id);
		$('#btn-submit-cool').html('Update');
		$.get("{{url('absensipertemuan/get/')}}"+"/"+id,function(data){
			$('#id_pertemuan').val(data.idpertemuan).trigger('change');
			$('#idpengerja_cool').val(data.idpengerja_cool).trigger('change');
			$('#alasan_kehadiran_tamu').val(data.alasan);
			$('.kehadiran_tamu').val(data.kehadiran).trigger('change');
		});
	}
</script>
@endpush