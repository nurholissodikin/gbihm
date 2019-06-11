@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1 class="pull-left">Personal</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Biodata</h3>
        </div>
        <div class="box-body">
          <form  action="{{route('personal.store')}}" enctype="multipart/form-data" method="post" id="formpil">
          {{csrf_field()}}  
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label>No. ID</label>
                  <input type="text" disabled="" name="" class="form-control">
                </div>
              </div>
              <div class="col-md-3 pull-right">
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".jpg" name="urlphoto" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('public/assets/img/userimage.png');">
                    </div>
                 </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>No.KTP</label>
                  <input type="number" name="noktp" class="form-control" placeholder="No. KTP" maxlength="20"  pattern=".{16,}" title="isi minimal 16 digit"  data-inputmask="'mask': '9999 9999 9999 9999'" autocomplete="off">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>(berlaku s/d)</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="berlaku" placeholder="Tanggal Berlaku" class="form-control pull-right datepickerlight" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required="">
                </div>
              </div>             
              <div class="col-md-5">
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="tela" placeholder="Tempat Lahir" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tala" class="form-control pull-right datepickerlight" placeholder="Tanggal Lahir"required="" autocomplete="off">
                  </div>
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
            </div>
            <div class="col-md-12"> 
              <div class="col-md-12">
                <div class="form-group">
                  <label>Golongan Darah</label>
                  <select class="form-control select2" name="gol" style="width: 100%;">
                    <option value="">-- Pilih Golongan Darah --</option>
                    <option value="A">A</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B">B</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB">AB</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O">O</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>RT</label>
                  <input type="number" name="rtrw[]" class="form-control" placeholder="Rt" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>RW</label>
                  <input type="number" name="rtrw[]" class="form-control" placeholder="Rw" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control select2" name="provinces" id="provinces" style="width: 100%">
                    <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                    @foreach ($provinces as $key => $value)
                    <option value="{{$value->id}}">{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kabupaten</label>
                  <select class="form-control select2" name="regencies" id="regencies" style="width: 100%">
                    <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control select2" name="districts" id="districts" style="width: 100%">
                    <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Kelurahan</label>
                  <select class="form-control select2" name="villages" id="villages" style="width: 100%">
                    <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Agama</label>
                  <select class="form-control select2" name="agama" style="width: 100%;">
                    <option value="">-- Pilih Agama --</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Islam">Islam</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-12">  
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status Perkawinan</label>
                  <select class="form-control  select2" id="belumNikah" name="sk" style="width: 100%;">
                    <option value="">-- Pilih Status Perkawinan --</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai">Cerai</option>
                    <option value="Duda/Janda">Duda/Janda</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sejak Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tsk" class="form-control belumNikah datepickerlight" placeholder="Sejak Tanggal"  autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                   <label>Kewarganegaraan</label><br>
                  <label class="col-sm-3">
                    <input type="radio" name="kewarganegaraan" class="minimal" value="WNA">WNA
                  </label>
                  <label class="col-sm-3">
                    <input type="radio" name="kewarganegaraan" class="minimal" value="WNI">
                    WNI
                  </label>
                </div>
              </div>
            </div>
            <div class="col-md-12">    
              <div class="col-md-6">
                <div class="form-group">
                  <label>Status Personal</label>
                  <select class="form-control select2" name="sp" style="width: 100%;">
                    <option value="">-- Pilih Status Personal --</option>
                    <option value="Aktif" selected>Aktif</option>
                    <option value="Non Aktif">Non Aktif</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sejak Tanggal</label>
                  <div class="input-group date">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="stp" class="form-control pull-right datepickerlight" placeholder="Sejak Tanggal"  autocomplete="off">
                  </div>
                </div>
              </div>
            </div>
            <div class="demo-button">
              <button type="submit" class="btn btn-block btn-primary  waves-effect" >Save</button>
            </div>
          </form>  
        </div>  
      </div>
    </section>
  </div>
@endsection
@push('script')
<script type="text/javascript">
   $("#formpil").on("submit",function(e) {
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
            title: "Apakah Anda ingin melanjutkan pengisian data detail Personal?",
            icon: "info",
            buttons: ["YA", "TIDAK"],
            // dangerMode: true,
          })
          .then((index) => {
            if (index) {
              window.location.href = "{{url('personal')}}";
            } else {
              window.location.href = "{{url('personal/detail')}}/"+data.idpersonal;
            }
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
    })
</script>
@endpush