@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Kegiatan Non Reguler
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Kegiatan</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('kegiatan.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12"> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Rayon</label>
                      <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                        @foreach ($rayon as $key => $value)
                        <option value="{{$value->idrayon}}">{{ $value->namarayon }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Rayon</label>
                      <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Cabang</label>
                      <select class="form-control select2" name="idcabangranting" id="cabang2" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Cabang ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Kegiatan</label>
                      <select class="form-control select2" name="kategori" style="width: 100%"> 
                        <option value="">== Pilih Jenis Kegiatan ==</option>
                        <option value="Ibadah Raya">Ibadah Raya</option>
                        <option value="Kebaktian Tengah Minggu">Kebaktian Tengah Minggu</option>
                        <option value="DM">DM</option>
                        <option value="Youth">Youth</option>
                        <option value="WBI">WBI</option>
                        <option value="COOL">COOL</option>
                        <option value="Doa Pengerja">Doa Pengerja</option>
                        <option value="Menara Doa">Menara Doa</option>
                        <option value="Ibadah BOM">Ibadah BOM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Kategori Kegiatan</label>
                      <select class="form-control select2" name="subkategori" style="width: 100%"> 
                        <option value="">== Pilih Sub Kategori Kegiatan ==</option>
                        <option value="Doa Pusat">Doa Pusat</option>
                        <option value="Doa Rayon">Doa Rayon</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <input type="text" name="nama" class="form-control" placeholder="nama kegiatan">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Peserta</label>
                      <select class="form-control select2" name="kapes" style="width: 100%"> 
                        <option value="">== Pilih Kategori Peserta ==</option>
                        <option value="Terbuka untuk Umum">Terbuka untuk Umum</option>
                        <option value="Tertutup internal Cabang">Tertutup internal Cabang</option>
                        <option value="Tertutup internal Sinode">Tertutup internal Sinode</option>
                        <option value="Khusus Pengerja">Khusus Pengerja</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Mulai</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                       <input type="text" name="tgl_mulai" class="form-control datepickerkegiatan" id="tgl_mulaikeg">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Selesai</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="tgl_selesai" class="form-control datepickerkegiatan" id="tgl_akhirkeg">
                      </div>  
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jam Mulai</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" name="waktu_mulai" class="form-control timepicker">
                      </div>  
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
                      <label>Rt</label>
                      <input type="text" name="rtrw[]" class="form-control" placeholder="Rt">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rw</label>
                      <input type="text" name="rtrw[]" class="form-control" placeholder="Rw">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinsi" id="provinces" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                        @foreach ($provinces as $key => $value)
                        <option value="{{$value->id}}">{{ $value->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten/Kota</label>
                      <select class="form-control select2" name="kabkota" id="regencies" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control select2" name="kecamatan" id="districts" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select class="form-control select2" name="kelurahan" id="villages" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos">
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
                      <label>Kordinator</label>
                      <select class="form-control select2" name="kordinator" style="width: 100%;">
                        <option value="">-- Pilih Kordinator --</option>
                        @foreach ($personal as $key => $value)
                        <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Template Sertifikat</label>
                      <input type="file" name="template" class="form-control" placeholder="Template Sertifikat">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif">Aktif</option>
                      </select>
                    </div>
                  </div>
                </div>  
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
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
 $(function(){

   $(".datepickerkegiatan").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
  });
   $("#tgl_mulaikeg").on('changeDate', function(selected) {
    var startDate = new Date(selected.date.valueOf());
    $("#tgl_akhirkeg").datepicker('setStartDate', startDate);
    if($("#tgl_mulaikeg").val() > $("#tgl_akhirkeg").val()){
      $("#tgl_akhirkeg").val($("#tgl_mulaikeg").val());
    }
  });
});
  
</script>
@endpush