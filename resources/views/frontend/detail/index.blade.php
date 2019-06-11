@extends('layouts.master')

@section('content')
  <input type="hidden" id="kkj_aw" value="{{$personal->nokkj}}">
  <input type="hidden" id="gereja_aw" value="{{$personal->gerejaasal}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Personal
      </h1>
      <br>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Biodata</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <ul id="mytabsb"class="nav nav-tabs tab-nav-right dynamic-tabs" role="tablist">
                 <li role="presentation" class="active"><a href="#informasi" data-toggle="tab">Informasi Umum</a></li>
                 <li role="presentation"><a href="#kontak" data-toggle="tab">Kontak</a></li>            
                 <li role="presentation"><a href="#pendidikan" data-toggle="tab" disable >Pendidikan Pekerjaan</a></li>
                 <li role="presentation" id="li_keluarga"><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
                 <li role="presentation"><a href="#anggota" data-toggle="tab">Keanggotaan</a></li>
                 <li role="presentation"><a href="#jemaat" data-toggle="tab">Pelayanan Jemaat</a></li>
                 <li role="presentation"><a href="#rohani" data-toggle="tab">Pelayanan Rohani</a></li>
                 <li role="presentation"><a href="#kegiatan" data-toggle="tab">Kegiatan</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="informasi">   
                    @include('frontend.personal.form') 
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="kontak">  
                    @include('frontend.personal.kontak')    
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="pendidikan">
                    @include('frontend.pendidikan.pendidikan') 
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="keluarga">
                    @include('frontend.kkj.kkj')    
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="anggota">
                    @include('frontend.keanggotaan.keanggotaan')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="jemaat">
                    @include('frontend.jemaat.jemaat')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="rohani">
                    @include('frontend.rohani.rohani')
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="kegiatan">
                    @include('frontend.kegiatan.index')
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@push('script')
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{csrf_token()}}",
    }
  });
  $(function(){
    if(!$('#kkj_aw').val()){
      $('#li_keluarga').hide();
    }
  })
  $(function(){
    if($('#gereja_aw').val()){
      $('#add_ke').hide();
    }
  })
  $(function(){
    if(!$('.pero').val()){
      $('#edit_pero').hide();
    }else{
        $('#val_pero').hide();
    }
  })
  $(document).ready(function(){
    $("#belum").change(function(){
      $(".belum").prop('disabled', $(this).val() == 'Belum Menikah');
    });
    $('.btn-ena-ena').on('click', function(){
      let id_ena_ena = $(this).attr('id');
      if ( id_ena_ena == 'form_diserahkan') {
        $('#formdi')[0].reset();
        $('#formdi').attr('url','{{route('diserahkan.store')}}');
        $('#btn-submit-diserahkan').html('Save');
      }else if(id_ena_ena == 'form_baptisan'){
        $('#formba')[0].reset();
        $('#formba').attr('url','{{route('baptisan.store')}}');
        $('#btn-submit-baptisan').html('Save')
      }else if(id_ena_ena == 'form_baptis'){
        // $('#form')[0].reset();
      }else if(id_ena_ena == 'form_nikah'){
        $('#formnikah')[0].reset();
        $('#formnikah').attr('url','{{route('nikah.store')}}');
        $('#btn-submit-nikah').html('Save');
      }else if(id_ena_ena == 'form_anak'){
        $('#formanak')[0].reset();
        $('#formanak').attr('url','{{route('anak.store')}}');
        $('#btn-submit-anak').html('Save');
      }
    });
    $('.btn-rohani').on('click', function(){
      let id_btn_rohani = $(this).attr('id');
      if ( id_btn_rohani == 'tjp_f') {
        $('#formjabpel')[0].reset();
        $('#formjabpel').attr('url','{{route('jabatanpelayanan.store')}}');
        $('#btn-submit-jabpel').html('Save');
      }
    });
  });
  function save_informasi_umum(){
    let formData = new FormData($('#informasi_umum')[0]);
    $.ajax({
      url: "{{url('personal/action')}}",
      method: 'POST',
      data: formData,
      processData: false, 
      contentType: false,       
      beforeSend: function(){
        $('.text-danger').remove()
      },
      success: function(res){
        console.log(res);
        $('#li_keluarga').show();
        $('#kkj_i').empty();
        var nokkj = $('[name="nokkj"]').val();
        $('#kkj_i').html(nokkj);
        $('#nokkj_kk').val(nokkj);
        swal({
            title: "Berhasil Disimpan",
            icon: "success",
           
          });
      },
      error: function(xhr){
        let errors = xhr.responseJSON.errors;
        for(let key in errors){
          let el = $('[name="'+key+'"]');
          el.after('<span class="text-danger">'+errors[key]+'</span>'); 
        }
      },
    })
  }
  function get_by_kkj(){
    var kkj = $('#nokkj_kk').val();
    var data = "";
    $.get("{{url('personal/kkj/')}}"+"/"+kkj,function(data){
      $.each(data,function(i,v){
        data += '<tr class="item'+v.id+'">'+
                  '<td>'+(i+1)+'</td>'+
                  '<td>'+v.idpersonal+'</td>'+
                  '<td>'+v.namalengkap+'</td>'+
                  '<td>'+v.jeniskelamin+'</td>'+
                  '<td>'+v.tanggallahir+'</td>'+
                  '<td>'+v.ktpid+'</td>'+
                  '<td>'+v.hubkeluarga+'</td>'+
                  '<td>'+v.keanggotaan+'</td>'+
                  '<td>'+
                    '<button class="edit-modalkkj btn btn-xs btn-warning" data-id="'+v.idpersonal+'" data-namalengkap="'+v.namalengkap+'" data-jeniskelamin="'+v.jeniskelamin+'" data-tanggallahir="'+v.tanggallahir+'" data-ktpid="'+v.ktpid+'" data-hubkeluarga="'+v.hubkeluarga+'" data-keanggotaan="'+v.keanggotaan+'">'+
                      '<span class="glyphicon glyphicon-edit"></span> '+
                    '</button>'+
                    '<button class="delete-modal btn btn-xs btn-danger" data-ida="'+v.idpersonal+'" data-name="'+v.namalengkap+'">'+
                      '<span class="glyphicon glyphicon-trash"></span> '+
                    '</button>'+
                  '</td>'+
              '</tr>';
      })
      $('#keluarga_data').empty();
      $('#keluarga_data').append(data);
    });
  }
  function get_option_personal(){
    var kkj = $('#nokkj_kk').val();
    var data = "";
    $.get("{{url('personal/all')}}"+"/"+kkj,function(data){
      data += '<option value="" selected="true">- Pilih Personal -</option>';
      $.each(data,function(i,v){
        data += '<option value="'+v.idpersonal+'">'+v.idpersonal+'  | '+v.namalengkap+'</option>';
      });
      $('#id_personal_kk').empty();
      $('#id_personal_kk')[0].reset();  
      $('#id_personal_kk').append(data);
    });
  }
  function ask_kkj(){
    if($('#id_personal_kk').val()){  
      swal({
        title: "Anda Yakin Merubah No KKJ?",
        text: "Personal ini telah terdaftar di KKJ lain",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((oke) => {
        if (oke) {
         save_kkj();
         $('#formkk')[0].reset();  
        }
      });
    }else{
     save_kkj();
    }
  }
  $(document).on('click', '.edit-modalkkj', function() {

        var id = $(this).data('id');
        var url = "{{url('kkj/edit/')}}"+"/"+id;
        $('#editper').attr('action',url)
        $('#footer_action_button').text(" Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.delete-a').hide();
        $('.form-horizontal').show();
        $('#fid_per').val($(this).data('id'));
        $('#na_per').val($(this).data('namalengkap'));
        $('#jk_per').val($(this).data('jeniskelamin')).trigger('change');
        $('#tl_per').val($(this).data('tanggallahir'));
        $('#ktp_per').val($(this).data('ktpid'));
        $('#hub_per').val($(this).data('hubkeluarga')).trigger('change');
        $('#kea_per').val($(this).data('keanggotaan')).trigger('change');
        $('#myModalkkj').modal('show');
  });
  $("#editper").on("submit",function(e) {
    e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Diubah",
            icon: "success",
          })
        get_by_kkj();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Edit!')
      },
    })
  })
  $(document).on('click', '.delete-modal', function() {

        var ida = $(this).data('ida');
        var url = "{{url('kkj/delete/')}}"+"/"+ida;
        $('#deper').attr('action',url)
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Delete');
        $('.delete-a').show();
        $('.form-horizontal').hide();
        $('#ida').val($(this).data('ida'));
        $('.name').html($(this).data('name'));
        $('#myModalkkj').modal('show');
  });
  $("#deper").on("submit",function(e) {
    e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Dihapus",
            icon: "success",
          })
        get_by_kkj();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Hapus!')
      },
    })
  }) 
  function save_kkj(){ 
    let formData = new FormData($('#formkk')[0]);
    $.ajax({
      url: "{{url('personal/action/kkj')}}",
      method: 'POST',
      data: formData,
      processData: false, 
      contentType: false,               
      success: function(res){
        console.log(res);
        
        if($('#id_personal_kk').val()){
          swal({
              title: "Berhasil Diupdate",
              icon: "success",
            })
        }else{
          swal({
              title: "Berhasil Disimpan",
              icon: "success",
            })
        }
        get_option_personal();
        get_by_kkj();
      },
      errors: function(error){
        console.log(error);
        alert('error')
      },
    })
  }
  function change_id_personal(){
    var id_personal = $('#id_personal_kk').val();
    if(id_personal != null){
      $.get("{{url('get_data')}}"+"/"+id_personal,function(value){
        $('#nama_lengkap').val(value.nama_lengkap);
        $('#jenis_kelamin').val(value.jenis_kelamin).trigger('change');
        $('#tanggal_lahir').val(value.tanggal_lahir);
        $('#no_ktp').val(value.no_ktp);
      })
    }
    if(!id_personal){
        $('#nama_lengkap').val(null);
        $('#jenis_kelamin').val(null).trigger('change');
        $('#tanggal_lahir').val(null);
        $('#no_ktp').val(null);
    }
  }
  $("#formko").on("submit",function(e) {
   e.preventDefault();
      var form = e.target;
      var formdata = new FormData(form);
      $.ajax({
          type: form.method,
          url: form.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,
      success: function(data){
        console.log(data);
        swal({
          title: "Berhasil Disimpan",
          icon: "success",
        })
      },
      error: function(){
        alert('Ada Kesalahan Saat Input!');
      }
    })
  })
  
  // PENDIDIKAN =============================================
  // $('#peper').change(function() {
  //   $('.bekerja').prop('disabled', !($(this).is(":checked")));
  // });
  $('input[name="spek"]').change(function() {
      if($(this).val() == 'Bekerja'){
        $('.bekerja').prop('disabled', false);
      }else{
        $('.bekerja').prop('disabled', true);
      }
  });
  $("#formpen").on("submit",function(e) {
     e.preventDefault();
        var formpen = e.target;
        var formdata = new FormData(formpen);
        $.ajax({
            type: formpen.method,
            url: formpen.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
          success: function(data){
            console.log(data);
            swal({
                title: "Berhasil Disimpan",
                icon: "success",
              })
            $('#formpen')[0].reset();
            get_by_pen();
          },
          errors: function(error){
            console.log(error);
            alert('Ada Kesalahan Saat Input!')
          },
      })
  })
  $(document).on('submit', '.delpen', function() {
      e.preventDefault();
        var formpen = e.target;
        var formdata = new FormData(formpen);
        $.ajax({
            type: formpen.method,
            url: formpen.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
        success: function(data){
          console.log(data);
          swal({
              title: "Berhasil Dihapus",
              icon: "success",
            })
          get_by_pen();
        },
        errors: function(error){
          console.log(error);
          alert('Ada Kesalahan Saat Input!')
        },
      })
  })
  function get_by_pen(){
    var pen = $('#id_pen').val();
    var data = "";
    $.get("{{url('personal/pen/')}}"+"/"+pen,function(data){
      $.each(data,function(i,v){
        data += '<tr class="item'+v.id+'">'+
                  '<td>'+(i+1)+'</td>'+
                  '<td>'+v.tingkatpendidikan+'</td>'+
                  '<td>'+v.institusi+'</td>'+
                  '<td>'+v.lokasi+'</td>'+
                  '<td>'+v.jurusan+'</td>'+
                  '<td>'+v.tahun+'</td>'+
                  '<td>'+
                    '<button class="edit-modal btn btn-xs btn-warning" data-id="'+v.idpendidikan+'" data-tingkatpendidikan="'+v.tingkatpendidikan+'" data-institusi="'+v.institusi+'" data-lokasi="'+v.lokasi+'" data-jurusan="'+v.jurusan+'" data-cpguru="'+v.cpguru+'" data-tahun="'+v.tahun+'">'+
                      '<span class="glyphicon glyphicon-edit"></span> '+
                    '</button>'+
                    '<button class="btn btn-xs btn-danger" onclick="del_pen('+v.idpendidikan+')">'+
                      '<span class="glyphicon glyphicon-trash"></span> '+
                    '</button>'+
                  '</td>'+
              '</tr>';

      })
      $('#pen_data').empty();
      $('#pen_data').append(data);
    });
  }
  function del_pen(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pendidikan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('pendidikan/delete/')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",
          });
          get_by_pen();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }
  $(document).on('click', '.edit-modal', function() {

      var id = $(this).data('id');
      var url = "{{url('pen/edit/')}}"+"/"+id;
      $('#editpen').attr('action',url)
      $('#footer_action_button').text(" Update");
      $('#footer_action_button').addClass('glyphicon-check');
      $('#footer_action_button').removeClass('glyphicon-trash');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Edit');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#fid').val($(this).data('id'));
      $('#ti_pen').val($(this).data('tingkatpendidikan')).trigger('change');
      $('#ins_pen').val($(this).data('institusi'));
      $('#lok_pen').val($(this).data('lokasi'));
      $('#jur_pen').val($(this).data('jurusan'));
      $('#cp_pen').val($(this).data('cpguru'));
      $('#thn_pen').val($(this).data('tahun'));
      $('#myModal').modal('show');
  });
  $("#editpen").on("submit",function(e) {
     e.preventDefault();
        var formpen = e.target;
        var formdata = new FormData(formpen);
        $.ajax({
            type: formpen.method,
            url: formpen.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
        success: function(data){
          console.log(data);

          swal({
              title: "Berhasil Diubah",
              icon: "success",
            })
          get_by_pen();
        },
        errors: function(error){
          console.log(error);
          alert('Ada Kesalahan Saat Edit!')
        },
      })
  })

// DISERAHKAN =====================================

  $("#formdi").on("submit",function(e) {
     e.preventDefault();
        var formpen = e.target;
        var formdata = new FormData(formpen);
        $.ajax({
            type: formpen.method,
            url: formpen.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
        success: function(data){
          console.log(data);
          swal({
              title: "Berhasil Disimpan",
              icon: "success",
            })
          get_by_di();
          $('#formdi')[0].reset();
          $('#formdi').attr('action',"{{route('diserahkan.store')}}");
          $('#btn-submit-diserahkan').html('Save');
        },
        errors: function(error){
          console.log(error);
          alert('Ada Kesalahan Saat Input!')
        },
      })
  })
  function get_by_di(){
    var pen = $('#id_dipen').val();
    var bp = "";
    $.get("{{url('personal/dipen/')}}"+"/"+pen,function(data){
      $.each(data,function(i,v){
        $.each(v,function(index,obj){
          var id = '';
          if (i == 'diserahkan') {
            id = obj.iddiserahkan;
          }
          else if (i == 'baptisan') {
            id = obj.idbaptisan;
          }
          else if (i == 'penyerahan') {
            id = obj.idpenyanak;
          }
          else if (i == 'pernikahan') {
            id = obj.idpernikahan;
          }
          console.log('i',obj)
                  bp += '<tr class="item'+obj.id+'">'+
                  '<td>'+(index+1)+'</td>'+
                  '<td>'+i+'</td>'+
                  '<td>'+obj.tanggal+'</td>'+
                  '<td>'+obj.noakta+'</td>'+
                  '<td>'+obj.personal.namalengkap+'</td>'+
                  '<td>'+obj.keterangan+'</td>'+
                  '<td>'+obj.dokumen+'</td>'+
                  '<td>'+
                    '<button class="btn btn-xs btn-warning" onclick="edit_jemaat(\''+i+'\','+id+')">'+
                      '<span class="glyphicon glyphicon-edit"></span> '+
                    '</button>'+
                    '<button class="btn btn-xs btn-danger" onclick="delete_jemaat(\''+i+'\','+id+')">'+
                      '<span class="glyphicon glyphicon-trash"></span> '+
                    '</button>'+
                  '</td>'+
              '</tr>';
        })

      })
        $('#di_data').empty();
        $('#di_data').append(bp);
      });
  }
  function edit_jemaat(jenis,id){
    if (jenis == 'diserahkan') {
      $('#form_diserahkan').click();
      $('#formdi').attr('action','{{url('diserahkan/update')}}'+'/'+id);
       $('#btn-submit-diserahkan').html('Update');
      $.get("{{url('diserahkan/get/')}}"+"/"+id,function(data){
        $('#id_dis').val(data.iddiserahkan);
        $('#no_dis').val(data.noakta);
        $('#tg_dis').val(data.tanggal);
        $('#cab_dis').val(data.idcabangranting).trigger('change');
        $('#pe_dis').val(data.idpelayan).trigger('change');
        $('#dok_dis').val(data.dokumen);
      })
    }
    else if (jenis == 'baptisan') {
      $('#form_baptisan').click();
      $('#formba').attr('action','{{url('baptisan/update')}}'+'/'+id);
      $('#btn-submit-baptisan').html('Update');
      $.get("{{url('baptisan/get/')}}"+"/"+id,function(item){
        $('#id_brk').val(item.idbaptisan);
        $('#id_ayahibubrk').val(item.idayahibubap);
        $('#id_baptisanayahpersonal').val(item.idayahper).trigger('change');
        $('#id_baptisanibupersonal').val(item.idibuper).trigger('change');
        $('#cab_brk').val(item.idcabangranting).trigger('change');
        $('#idpel_brk').val(item.idpelayan).trigger('change');
        $('#noakta_brk').val(item.noakta);
        $('#baptisanair_brk').val(item.baptisanair).trigger('change');
        $('#tgl_brk').val(item.tanggal);
        $('#dok_brk').val(item.dokumen);
        $('#idkkj_brk').val(item.idkkj);
        $('#d_aktakelahiran_brk').val(item.d_aktakelahiran);
        $('#d_ktppass_brk').val(item.d_ktppass);
        $('#d_kk_brk').val(item.d_kk);
        $('#d_kkj_brk').val(item.d_kkj);
        $('#imageUpload2').val(item.d_foto1);
        $('#imageUpload3').val(item.d_foto2);
        $('#d_perceraian_brk').val(item.d_perceraian);
        $('#d_saksi1_brk').val(item.d_saksi1);
        $('#d_saksi2_brk').val(item.d_saksi2);
        $('#d_sp_ortu_brk').val(item.d_sp_ortu);
        $('#d_ktp_ortu_brk').val(item.d_ktp_ortu);
        $('#d_kawin_ortu_brk').val(item.d_kawin_ortu);
        $('#d_sp_agama_brk').val(item.d_sp_agama);
        $('#d_ttd_baptisan_brk').val(item.d_ttd_baptisan);
        $('#d_berita_brk').val(item.d_ttd_baptisan);
        $('#d_pendaftaran_brk').val(item.d_ttd_baptisan);
        $('#d_lain_brk').val(item.d_ttd_baptisan);
        $('#keterangan_brk').val(item.keterangan);
        $('#namadepanayah_brk').val(item.namadepan);
        $('#namatengahayah_brk').val(item.namatengah);
        $('#namabelakangayah_brk').val(item.namabelakang);
        $('#namadepanibu_brk').val(item.namadepanibu);
        $('#namatengahibu_brk').val(item.namatengahibu);
        $('#namabelakangibu_brk').val(item.namabelakangibu);
        
      })

    }
    else if (jenis == 'penyerahan') {
      $('#form_anak').click();
      $('#formanak').attr('action','{{url('anak/update')}}'+'/'+id);
       $('#btn-submit-anak').html('Update');
       $.get("{{url('anak/get/')}}"+"/"+id,function(data){
        $('#id_nak').val(data.idpenyanak);
        $('#no_nak').val(data.noakta);
        $('#tg_nak').val(data.tanggal);
        $('#cab_nak').val(data.idcabangranting).trigger('change');
        $('#id_anakpersonal').val(data.idpersonalanak).trigger('change');
        $('#pe_nak').val(data.idpelayan).trigger('change');
        $('#dok_nak').val(data.dokumen);
      })
    }
    else if (jenis == 'pernikahan') {
      $('#form_nikah').click();
      $('#formnikah').attr('action','{{url('nikah/update')}}'+'/'+id);
       $('#btn-submit-nikah').html('Update');
        $.get("{{url('nikah/get/')}}"+"/"+id,function(data){
        $('#id_nik').val(data.idpernikahan);
        $('#id_nikahpersonal').val(data.idpasangan).trigger('change');
        $('#no_nik').val(data.noakta);
        $('#iapas_nik').val(data.idayahibupas);
        $('#tg_nik').val(data.tanggal);
        $('#id_ayahnikahpersonal').val(data.idayahper).trigger('change');
        $('#id_ibunikahpersonal').val(data.idibuper).trigger('change');
        $('#namapas_depanayah').val(data.namadepan);
        $('#namapas_tengahayah').val(data.namatengah);
        $('#namapas_belakangayah').val(data.namabelakang);
        $('#namapas_depanibu').val(data.namadepanibu);
        $('#namapas_tengahibu').val(data.namatengahibu);
        $('#namapas_belakangibu').val(data.namabelakangibu);
        $('#cab_nik').val(data.idcabangranting).trigger('change');
        $('#pe_nik').val(data.idpelayan).trigger('change');
        $('#dok_nik').val(data.dokumen);  
        $('#tempat_nik').val(data.tempatpernikahan);  
        
      })
    }
    // alert(jenis,id);
  }
  function delete_jemaat(deljenis,iddel){
    if (deljenis == 'diserahkan') {
       swal({
        title: "Apakah Anda Ingin Menghapus Data Diserahkan ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
       .then((oke) => {
        if (oke) {
          $.get("{{url('diserahkan/delete/')}}"+"/"+iddel,function(){
            swal({
              title: "Berhasil Dihapus",
              icon: "success",
            });
            get_by_di();
          }).fail(function() {
            alert( "error" );
          });
        }
      });
    }
    else if (deljenis == 'baptisan') {
       swal({
        title: "Apakah Anda Ingin Menghapus Data Baptisanair ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
       .then((oke) => {
        if (oke) {
          $.get("{{url('baptisan/delete/')}}"+"/"+iddel,function(){
            swal({
              title: "Berhasil Dihapus",
              icon: "success",
            });
            get_by_di();
          }).fail(function() {
            alert( "error" );
          });
        }
      });
    }
    else if (deljenis == 'penyerahan') {
       swal({
        title: "Apakah Anda Ingin Menghapus Data Penyerahan ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
       .then((oke) => {
        if (oke) {
          $.get("{{url('anak/delete/')}}"+"/"+iddel,function(){
            swal({
              title: "Berhasil Dihapus",
              icon: "success",
            });
            get_by_di();
          }).fail(function() {
            alert( "error" );
          });
        }
      });
    }
    else if (deljenis == 'pernikahan') {
       swal({
        title: "Apakah Anda Ingin Menghapus Data pernikahan ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
       .then((oke) => {
        if (oke) {
          $.get("{{url('nikah/delete/')}}"+"/"+iddel,function(){
            swal({
              title: "Berhasil Dihapus",
              icon: "success",
            });
            get_by_di();
          }).fail(function() {
            alert( "error" );
          });
        }
      });
    }

  }

  $(document).on('click', '.edit-modala', function() {

      var id = $(this).data('iddiserahkan');
      var url = "{{url('diserahkan/update/')}}"+"/"+id;
      $('#editdi').attr('action',url)
      $('#footer_action_button').text("Update");
      $('#footer_action_button').addClass('glyphicon-check');
      $('#footer_action_button').removeClass('glyphicon-trash');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').removeClass('btn-danger');
      $('.actionBtn').addClass('edit');
      $('.modal-title').text('Edit');
      $('.deleteContent').hide();
      $('.form-horizontal').show();
      $('#id_di').val($(this).data('iddiserahkan'));
      $('#no_di').val($(this).data('noakta'));
      $('#ta_di').val($(this).data('tanggal'));
      $('#per_di').val($(this).data('idpersonal'));
      $('#idc_di').val($(this).data('idcabangranting')).trigger('change');
      $('#idp_di').val($(this).data('idpelayan')).trigger('change');
      $('#dok_di').val($(this).data('dokumen'));
      $('#myModala').modal('show');
  });
  $("#editdi").on("submit",function(e) {
     e.preventDefault();
        var formpen = e.target;
        var formdata = new FormData(formpen);
        $.ajax({
            type: formpen.method,
            url: formpen.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
        success: function(data){
          console.log(data);

          swal({
              title: "Berhasil Diubah",
              icon: "success",
            })
          get_by_di();
        },
        errors: function(error){
          console.log(error);
          alert('Ada Kesalahan Saat Edit!')
        },
      })
  })
  function del_di(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pendidikan ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('diserahkan/delete/')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",
          });
          get_by_di();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }

// BAPTISAN AIR  

$(document).ready(function () {

  $('#id_baptisanibupersonal').on('change', function(){
      if($('#id_baptisanibupersonal').val()){
        $('.ibu').prop('disabled', true);
      }else{
        $('.ibu').prop('disabled', false);
      }
    });
   $('#id_tempat_subrayon').on('change', function(){
      if($('#id_tempat_subrayon').val()){
        $('#id_tempat_rayon').prop('disabled', true);
      }else{
        $('#id_tempat_rayon').prop('disabled', false);
      }
    });
   $('#id_tempat_cabang').on('change', function(){
      if($('#id_tempat_cabang').val()){
        $('#id_tempat_subrayon').prop('disabled', true);
      }else{
        $('#id_tempat_subrayon').prop('disabled', false);
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
  get_by_di();
  //Initialize tooltips
  $('.nav-tabs > li a[title]').tooltip();

  //Wizard
  $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

      var $target = $(e.target);

      if ($target.parent().hasClass('disabled')) {
          return false;
      }
  });

  $(".next-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      $active.next().removeClass('disabled');
      nextTab($active);

  });
  $(".prev-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      prevTab($active);

  });

  $('#autocomplete').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.ajax') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#autocomplete_list').fadeIn();  
                    $('#autocomplete_list').html(data);
          }
         });
        }
    });
    $(document).on('click', 'li', function(){  
        $('#autocomplete').val($(this).text());  
        $('#autocomplete_list').fadeOut();  
    });
});
function nextTab(elem) {
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}
function get_baptisan_allpersonal(){
    var pe_id = $('#baper_id').val();
    var data = "";
    $.get("{{url('baptisan/allpersonal')}}"+"/"+pe_id,function(data){
      data += '<option value="" selected="true">- Pilih Personal -</option>';
      $.each(data,function(i,v){
        data += '<option value="'+v.idpersonal+'">'+v.idpersonal+'  | '+v.namalengkap+'</option>';
      })
      $('#id_baptisanpersonal').empty();
      $('#id_baptisanpersonal').append(data);
    });
}
function change_id_baptisanpersonal(){
    var id_personal = $('#id_baptisanpersonal').val();
    if(id_personal != null){
      $.get("{{url('get_data_baper')}}"+"/"+id_personal,function(value){
        $('#nama_depan').val(value.nama_depan);
        $('#nama_tengah').val(value.nama_tengah);
        $('#nama_belakang').val(value.nama_belakang);
        $('#tempat_lahir').val(value.tempat_lahir);
        $('#tanggal_la').val(value.tanggal_la);
      })
    }
    if(!id_personal){
        $('#nama_depan').val(null);
        $('#nama_tengah').val(null);
        $('#nama_belakang').val(null);
        $('#tempat_lahir').val(null);
        $('#tanggal_la').val(null);
    }
}

// $(document).ready(function(){
//  var id_personal = $('#id_baptisanpersonal').val();
//   $(".id_baptisanpersonal").change(function(v){
//     $(".ayah").prop('disabled', $(this).val(v.id_personal));
//   });
// });
// $(document).ready(function(){
//  var id_personal = $('#id_baptisanibupersonal').val();
//   $("#id_baptisanibupersonal").change(function(v){
//     $(".ibu").prop('disabled', $(this).val(v.id_personal));
//   });
// });

function change_id_baptisanibupersonal(){
  var id_personal = $('#id_baptisanibupersonal').val();
  if(id_personal != null){
    $.get("{{url('get_data_baper')}}"+"/"+id_personal,function(value){
      $('#namaibu_depan').val(value.nama_depan);
      $('#namaibu_tengah').val(value.nama_tengah);
      $('#namaibu_belakang').val(value.nama_belakang);
    })
  }
  if(!id_personal){
      $('#namaibu_depan').val(null);
      $('#namaibu_tengah').val(null);
      $('#namaibu_belakang').val(null);
  }
}
$("#formba").on("submit",function(e) {
     e.preventDefault();
        var formba = e.target;
        var formdata = new FormData(formba);
        $.ajax({
            type: formba.method,
            url: formba.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,               
        success: function(data){
          console.log(data);
          swal({
              title: "Berhasil Disimpan",
              icon: "success",
            })
          $('#formba')[0].reset();
          $('#formba').attr('action',"{{route('baptisan.store')}}");
          $('#btn-submit-baptisan').html('Save');
          get_by_di();
        },
        errors: function(error){
          console.log(error);
          alert('Ada Kesalahan Saat Input!')
        },
      })
  })
function save_baptisan_air(){
  let formData = new FormData($('#formba')[0]);
  $.ajax({
    url: "{{route('baptisan.store')}}",
    method: 'POST',
    data: formData,
    processData: false, 
    contentType: false,               
    success: function(res){
      console.log(res);
      swal({
          title: "Berhasil Disimpan",
          icon: "success",
        })
      $('#formba')[0].reset();
      $('#formba').attr('action',"{{route('baptisan.store')}}");
      $('#btn-submit-baptisan').html('Save');
      get_by_di();
    },
    errors: function(error){
      console.log(error);
      alert('error')
    },
  })
}
// NIKAH
function change_id_nikahpersonal(){
  var id_personal = $('#id_nikahpersonal').val();
  if(id_personal != null){
    $.get("{{url('get_data_niper')}}"+"/"+id_personal,function(value){
      $('#namapas_depan').val(value.nama_depan);
      $('#namapas_tengah').val(value.nama_tengah);
      $('#namapas_belakang').val(value.nama_belakang);
      $('#tempatpas_lahir').val(value.tempat_lahir);
      $('#tanggalpas_la').val(value.tanggal_la);
    })
  }
  if(!id_personal){
      $('#namapas_depan').val(null);
      $('#namapas_tengah').val(null);
      $('#namapas_belakang').val(null);
      $('#tempatpas_lahir').val(null);
      $('#tanggalpas_la').val(null);
  }
}
// $(document).ready(function(){
//  var id_personal = $('#id_ayahnikahpersonal').val();
//   $("#id_ayahnikahpersonal").change(function(v){
//     $(".ayahn").prop('disabled', $(this).val(v.id_personal));
//   });
// });
// $(document).ready(function(){
//  var id_personal = $('#id_ibunikahpersonal').val();
//   $("#id_ibunikahpersonal").change(function(v){
//     $(".ibun").prop('disabled', $(this).val(v.id_personal));
//   });
// });
$("#formnikah").on("submit",function(e) {
   e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          })
        $('#formnikah')[0].reset();
        $('#formnikah').attr('action',"{{route('nikah.store')}}");
        $('#btn-submit-anak').html('Save');
        get_by_di();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Edit!')
      },
    })
})
// ANAK
function change_id_anakpersonal(){
  var id_personal = $('#id_anakpersonal').val();
  if(id_personal != null){
    $.get("{{url('get_data_anakper')}}"+"/"+id_personal,function(value){
      $('#namaanak_depan').val(value.nama_depan);
      $('#namaanak_tengah').val(value.nama_tengah);
      $('#namaanak_belakang').val(value.nama_belakang);
      $('#tempatanak_lahir').val(value.tempat_lahir);
      $('#tanggalanak_la').val(value.tanggal_la);
      $('#jk_anak').val(value.jk).trigger('change');
    })
  }
  if(!id_personal){
      $('#namaanak_depan').val(null);
      $('#namaanak_tengah').val(null);
      $('#namaanak_belakang').val(null);
      $('#tempatanak_lahir').val(null);
      $('#tanggalanak_la').val(null);
      $('#jk_anak').val(null).trigger('change');
  }
}
$("#formanak").on("submit",function(e) {
   e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          })
        $('#formanak')[0].reset();
        $('#formanak').attr('action',"{{route('anak.store')}}");
        $('#btn-submit-anak').html('Save');
        get_by_di();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
})

// Rohani  =======================================================
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
// Komisi
$("#formkom").on("submit",function(e) {
   e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          })
        get_by_kom();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
})
function get_by_kom(){
    var pen = $('#id_pekom').val();
    var data = "";
    $.get("{{url('personal/kom/')}}"+"/"+pen,function(data){
      $.each(data,function(i,v){
        data += '<tr class="item'+v.id+'">'+
                  '<td>'+(i+1)+'</td>'+
                  '<td>'+v.komisi+'</td>'+
                  '<td>'+v.rayon['namarayon']+'</td>'+
                  '<td>'+v.subrayon.namasubrayon+'</td>'+
                  '<td>'+v.cabang.namacabang+'</td>'+
                  '<td>'+v.jadwal+'</td>'+
                  '<td>'+
                    '<button data-target="'+'#edit'+v.id+'" data-toggle="modal" type="submit" class="btn btn-xs btn-warning">'+
                    '<span class="glyphicon glyphicon-edit"></span>'+ 
                    '</button>'+
                    '</button>'+
                    '<button class="btn btn-xs btn-danger" onclick="del_kom('+v.id+')">'+
                      '<span class="glyphicon glyphicon-trash"></span> '+
                    '</button>'+
                  '</td>'+
              '</tr>';

      })
      $('#kom_data').empty();
      $('#kom_data').append(data);
    });
  }
  function del_kom(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Komisi ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('komisi/delete/')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",
          });
         get_by_kom();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }
  $("#editformkom").on("submit",function(e) {
   e.preventDefault();
      var formpen = e.target;
      var formdata = new FormData(formpen);
      $.ajax({
          type: formpen.method,
          url: formpen.action,
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,               
      success: function(data){
        console.log(data);

        swal({
            title: "Berhasil Disimpan",
            icon: "success",
          })
        get_by_kom();
      },
      errors: function(error){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
})
// Jabpel
function save_jabpel(){
    let formData = new FormData($('#formjabpel')[0]);
    $.ajax({
      url: "{{route('jabatanpelayanan.store')}}",
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
          });
          $('#formjabpel')[0].reset();
          $('#formjabpel').attr('action',"{{route('jabatanpelayanan.store')}}");
          $('#btn-submit-jabpel').html('Save')
          get_by_jabpel();
      },
      error: function(xhr){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    });
  }
  function save_jabpel_renew(){
    let formData = new FormData($('#formjabpel')[0]);
    $.ajax({
      url: "{{url('jabpel/renew')}}",
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
          });
          $('#formjabpel')[0].reset();
          get_by_jabpel();
      },
      error: function(xhr){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
  }
  function save_jabpel_badge(){
    let formData = new FormData($('#formjabpel')[0]);
    $.ajax({
      url: "{{url('jabpel/badge')}}",
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
          });
          $('#formjabpel')[0].reset();
          get_by_jabpel();
      },
      error: function(xhr){
        console.log(error);
        alert('Ada Kesalahan Saat Input!')
      },
    })
  }

function get_by_jabpel(){
  var pen = $('#id_pejab').val();
  var data = "";
  $.get("{{url('personal/jabpel/')}}"+"/"+pen,function(data){
    $.each(data,function(i,v){
      data += '<tr class="item'+v.id+'">'+
        '<td>'+(i+1)+'</td>'+
        '<td>'+v.noreferensi+'</td>'+
        '<td>'+v.jabatan+'</td>'+
        '<td>'+v.tempat+'</td>'+
        '<td>'+v.sejak+'-'+v.sampai+'</td>'+
        '<td>'+v.tgl+'</td>'+
        '<td>'+v.pengerjaa['namalengkap']+'</td>'+
        '<td>'+v.nosertifikat+'</td>'+
        '<td>'+v.status+'</td>'+
        '<td>'+
          '<button class="btn btn-xs btn-warning" onclick="edit_jabpel('+v.id+')">'+
            '<span class="glyphicon glyphicon-edit"></span> '+
          '</button>'+
          '</button>'+
          '<button class="btn btn-xs btn-danger" onclick="del_jabpel('+v.id+')">'+
            '<span class="glyphicon glyphicon-trash"></span> '+
          '</button>'+
        '</td>'+
      '</tr>';
    })
    $('#jabpel_data').empty();
    $('#jabpel_data').append(data);
    $('#jabpel2_data').empty();
    $('#jabpel2_data').append(data);
  });
}
function edit_jabpel(id){
  $('#tjp_f').click();
   $('#formjabpel').attr('url','{{url('jabpel/update')}}'+'/'+id);
       $('#btn-submit-jabpel').html('Update');
       $.get("{{url('jabpel/get/')}}"+"/"+id,function(data){
        $('#tgl_mulai').val(data.sejak);
        $('#tgl_akhir').val(data.sampai);
        $('#tgl_jpl').val(data.tanggal);
        $('#jab_jpl').val(data.jabatan);
        $('#noref_jpl').val(data.noreferensi);
        $('#noser_jpl').val(data.nosertifikat);
        if(data.jabut=="Jabatan Utama"){
            $("#jabut_jpl").prop("checked", true);
        }else{
            $("#jabut_jpl").prop("checked", false);
        }
        if(data.hadirpertemuan[0]=="Menara Doa Pelayan Jemaat (MDPJ)"){
            $("#hdr_jpl").prop("checked", true);
        }else{
            $("#hdr_jpl").prop("checked", false);
        }
        if(data.hadirpertemuan[0]=="DPPJ"){
            $("#hdr1_jpl").prop("checked", true);
        }else if(data.hadirpertemuan[1]=="DPPJ"){
            $("#hdr1_jpl").prop("checked", true);
        }else{
            $("#hdr1_jpl").prop("checked", false);
        }
        $('#dok_jpl').val(data.dokumen);
        $('#status_jpl').val(data.status).trigger('change');
        $('#pel_jpl').val(data.idpelayanan);
        $('#pej_jpl').val(data.pengerja).trigger('change');
      })

}
  function del_jabpel(id){
       swal({
        title: "Apakah Anda Ingin Menghapus Data Jabatan Pelayan ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
       .then((oke) => {
        if (oke) {
          $.get("{{url('jabpel/delete/')}}"+"/"+id,function(){
            swal({
              title: "Berhasil Dihapus",
              icon: "success",
            });
            get_by_jabpel();
          }).fail(function() {
            alert( "error" );
          });
        }
      });
    }
    



// KEGIATAn
     $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[4]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
            $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
             var table = $('#datadate').DataTable( {
              "scrollX": true,
               "responsive": true,

             }
    //          {
    //     "bProcessing": true,
    //     "bDeferRender": true,
    //     "serverSide": false,
    //     orderCellsTop: true,
    //     "responsive": true,
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //    "scrollX": true,
    //    dom: 'Blfrtip',
    //     buttons: [
    //         {
    //             extend:    'print',
    //             text:      '<i class="fa fa-print"></i>',
    //             titleAttr: 'Print',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'copyHtml5',
    //             text:      '<i class="fa fa-files-o"></i>',
    //             titleAttr: 'Copy',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'excelHtml5',
    //             text:      '<i class="fa fa-file-excel-o"></i>',
    //             titleAttr: 'Excel',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'csvHtml5',
    //             text:      '<i class="fa fa-file-text-o"></i>',
    //             titleAttr: 'CSV',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'pdfHtml5',
    //             text:      '<i class="fa fa-file-pdf-o"></i>',
    //             titleAttr: 'PDF',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         }
    //     ],
    //    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    // } 
    );

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });

 var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendarb').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
     events : [
                @foreach($kegiatan as $task)
                {
                    title : '{{ $task->nama_kegiatan }}',
                    start : '{{ $task->tgl_mulai }}',
                    end : '{{ $task->tgl_selesai }}'
                    // url : '{{ route('kegiatan.edit', $task->id) }}'
                },
                @endforeach
            ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendarb').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })
    $(document).ready(function(){
      $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
          var min = $('#mina').datepicker("getDate");
          var max = $('#maxa').datepicker("getDate");
          var startDate = new Date(data[4]);
          if (min == null && max == null) { return true; }
          if (min == null && startDate <= max) { return true;}
          if(max == null && startDate >= min) {return true;}
          if (startDate <= max && startDate >= min) { return true; }
          return false;
        }
        );


      $("#mina").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
      $("#maxa").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
      var table = $('#datadatec').DataTable( {
        "scrollX": true,
        "responsive": true,

      }
    //          {
    //     "bProcessing": true,
    //     "bDeferRender": true,
    //     "serverSide": false,
    //     orderCellsTop: true,
    //     "responsive": true,
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //    "scrollX": true,
    //    dom: 'Blfrtip',
    //     buttons: [
    //         {
    //             extend:    'print',
    //             text:      '<i class="fa fa-print"></i>',
    //             titleAttr: 'Print',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'copyHtml5',
    //             text:      '<i class="fa fa-files-o"></i>',
    //             titleAttr: 'Copy',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'excelHtml5',
    //             text:      '<i class="fa fa-file-excel-o"></i>',
    //             titleAttr: 'Excel',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'csvHtml5',
    //             text:      '<i class="fa fa-file-text-o"></i>',
    //             titleAttr: 'CSV',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'pdfHtml5',
    //             text:      '<i class="fa fa-file-pdf-o"></i>',
    //             titleAttr: 'PDF',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         }
    //     ],
    //    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    // } 
    );

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
              table.draw();
            });
          });

    var date = new Date()
    var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()
    $('#calendarc').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events : [
      @foreach($kegiatan as $task)
      {
        title : '{{ $task->nama_kegiatan }}',
        start : '{{ $task->tgl_mulai }}',
        end : '{{ $task->tgl_selesai }}'
                    // url : '{{ route('kegiatan.edit', $task->id) }}'
                  },
                  @endforeach
                  ],
                  editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendarc').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    });

 $(".datepickerpersonal").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
  });

 function confirm_renew(){
      swal({
        title: "Lakukan Renew Badge",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((oke) => {
        if (oke) {
         save_jabpel_renew();

        }
      });
  }
  function confirm_badge(){
      swal({
        title: "Lakukan Badge Hilang",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((oke) => {
        if (oke) {
         save_jabpel_badge();
           
        }
      });
  }

  $('.dv_kerja').hide();
  $("input[id$='kerja']").click(function() {
    $('.dv_kerja').show();
  });

  $("input[id$='be_kerja']").click(function() {
    $('.dv_kerja').hide();
  });
    $('#subrayon2').on('change', function(){
      if($('#subrayon2').val()){
        $('#rayon2').prop('disabled', true);
      }else{
        $('#rayon2').prop('disabled', false);
      }
    });
    $('#cabang2').on('change', function(){
      if($('#cabang2').val()){
        $('#subrayon2').prop('disabled', true);
      }else{
        $('#subrayon2').prop('disabled', false);
      }
    });
</script>

@endpush
    