  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Tamu Khusus
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
               <h3 class="box-title">Tambah Data Tamu Khusus</h3>
              </div>
              <br>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form  id="formtamu" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. ID</label>
                    <input type="text" disabled="" name="" class="form-control">
                  </div>
                </div>
                <div class="col-md-3 pull-right">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="urlphoto" />
                      <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url('{{asset('public/assets/img/userimage.png')}}');">
                      </div>
                   </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama (Sesuai KTP)</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama (Sesuai KTP)" required="">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="namapa" placeholder="Nama Panggilan" class="form-control">
                  </div>
                </div>             
                <div class="col-md-9">
                  <div class="form-group">
                    <label>NIK (No. KTP)</label><br><small>* Jika tidak ada NIK, No. ID lain (Pasport, K.Pelajar / dsb)</small>
                    <textarea class="form-control" name="nik" rows="3"></textarea>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                     <label>Jenis Kelamin</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="L" required="">Laki-Laki
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="P" required="">
                      Perempuan
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tala" class="form-control pull-right" placeholder="Tanggal Lahir" id="datepicker1" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pilih Jabatan</label>
                    <select class="form-control select2" name="jabatan" style="width: 100%">
                      <option value="">== Pilih Jabatan ==</option>
                      <option value="Pdt.">Pdt.</option>
                      <option value="Pdm.">Pdm.</option>
                      <option value="Pdp.">Pdp.</option>
                      <option value="Ka. Divisi">Ka. Divisi</option>
                      <option value="Istri Ka. Divisi">Istri Ka. Divisi</option>
                      <option value="Wkl. Ka. Divisi">Wkl. Ka. Divisi</option>
                      <option value="Istri/Suami Wkl. Ka. Divisi">Istri/Suami Wkl. Ka. Divisi</option>
                      <option value="Ka. Sub Divisi">Ka. Sub Divisi</option>
                      <option value="Istri/Suami Ka. Sub Divisi">Istri/Suami Ka. Sub Divisi</option>
                      <option value="Staf Ahli Penggembalaan">Staf Ahli Penggembalaan</option>
                      <option value="Istri/Suami Staf Ahli Penggembalaan">Istri/Suami Staf Ahli Penggembalaan</option>
                      <option value="Wkl. Ka. Sub Divisi">Wkl. Ka. Sub Divisi</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tempat</label>
                    <select name="rayon" class="form-control select2 sub_tem cab_tem" id="rayon"  style="width: 100%">
                      <option value="">== Pilih Rayon ==</option>
                      @foreach ($rayon as $data)
                      <option value="{{$data->idrayon}}"> {{$data->namarayon}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><br></label>
                    <select name="subrayon" class="form-control select2 ray_tem cab_tem" id="subrayon" style="width: 100%">
                      <option value="">== Pilih Sub Rayon ==</option>
                      @foreach ($subrayon as $data)
                      <option value="{{$data->idsubrayon}}"> {{$data->namasubrayon}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><br></label>
                    <select name="cabang" class="form-control select2 ray_tem sub_tem" id="cabang" style="width: 100%">
                      <option value="">== Pilih Cabang ==</option>
                      @foreach ($cabang as $data)
                      <option value="{{$data->idcabangranting}}"> {{$data->namacabang}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gereja / Organisasi</label>
                    <input type="text" name="gereja" class="form-control" placeholder="Gereja / Organisasi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mengetahui</label>
                    <select class="form-control select2" name="mengetahui" style="width: 100%">
                      <option value="">== Pilih Pemimpin / Gembala ==</option>
                      @foreach($gembala as $data)
                      <option value="{{$data->id}}">{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Menyutujui</label>
                    <select class="form-control select2" name="menyutujui" style="width: 100%">
                      <option value="">== Pilih Ka Divisi. ==</option>
                      @foreach($kadiv as $data)
                      <option value="{{$data->id}}">{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis Badge</label>
                    <select class="form-control select2" name="jenis" style="width: 100%;">
                      <option value="">== Pilih Jenis Badge ==</option>
                      <option value="Hitam">Hitam</option>
                      <option value="Kuning">Kuning</option>
                      <option value="Tamu">Tamu</option>
                      <option value="Tamu Khusus" selected="">Tamu Khusus</option>
                      <option value="Anak Anggota CT 20">Anak Anggota CT 20</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;">
                      <option value="">== Pilih Status ==</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Non Aktif">Non Aktif</option>
                      <option value="Belum Disetujui">Belum Disetujui</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="demo-button">
                    <button type="button" onclick="save_tamu()" id="btn-submit-jabpel" class="btn btn-primary form-control">Save</button>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="demo-button">
                    <button type="button" onclick="save_tamu_cetak()" id="btn-submit-jabpel" class="btn btn-primary form-control">Save  & Cetak Badge</button>
                  </div>
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
   $(document).ready(function () {
   // $('#rayon').on('change', function(){
   //    if($('#rayon').val()){
   //      $('.ray_tem').prop('disabled', true);
   //    }else{
   //      $('.ray_tem').prop('disabled', false);
   //    }
   //  });
   // $('#subrayon').on('change', function(){
   //    if($('#subrayon').val()){
   //      $('.sub_tem').prop('disabled', true);
   //    }else{
   //      $('.sub_tem').prop('disabled', false);
   //    }
   //  });
   // $('#cabang').on('change', function(){
   //    if($('#cabang').val()){
   //      $('.cab_tem').prop('disabled', true);
   //    }else{
   //      $('.cab_tem').prop('disabled', false);
   //    }
   //  });
   $('#subrayon').on('change', function(){
      if($('#subrayon').val()){
        $('#rayon').prop('disabled', true);
      }else{
        $('#rayon').prop('disabled', false);
      }
    });
   $('#cabang').on('change', function(){
      if($('#cabang').val()){
        $('#subrayon').prop('disabled', true);
      }else{
        $('#subrayon').prop('disabled', false);
      }
    });
});
   function save_tamu(){
    let formData = new FormData($('#formtamu')[0]);
    $.ajax({
      url: "{{url('tamukhusus/store')}}",
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
    })
  }
 </script>
 @endpush