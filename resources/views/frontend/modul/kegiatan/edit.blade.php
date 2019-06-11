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
              <h3 class="box-title">Edit Data Kegiatan - {{$kegiatan->nama_kegiatan}}</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('kegiatan.update',$kegiatan->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12"> 
                   <div class="form-group">
                  <div class="col-sm-12">
                    <label>Rayon</label>
                    <select class="form-control select2" name="idrayon" id="rayon3" style="width: 100%;">
                      <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                      @foreach ($rayon as $key => $value)
                      <option value="{{$value->idrayon}}" @if($value->idrayon == $kegiatan->idrayon) selected  @endif>{{ $value->namarayon }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Sub Rayon</label>
                      <select class="form-control select2" name="idsubrayon" id="subrayon3" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                        @php
                        $subray = app()->make('App\Http\Controllers\CountryController')->fill_subrayon2($kegiatan->idrayon);
                        @endphp
                        @foreach($subray as $data)
                        <option value="{{$data->idsubrayon}}" @if($data->idsubrayon == $kegiatan->idsubrayon) selected @endif> {{ $data->namasubrayon }}</option>  
                        @endforeach
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <label>Cabang</label>
                      <select class="form-control select2" name="idcabangranting" id="cabang3" style="width: 100%;">
                        <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                        @php
                        $casub = app()->make('App\Http\Controllers\CountryController')->fill_cabang2($kegiatan->idsubrayon);
                        @endphp
                        @foreach($casub as $data)
                        <option value="{{$data->idcabangranting}}" @if($data->idcabangranting == $kegiatan->idcabangranting) selected @endif> {{ $data->namacabang }}</option>  
                        @endforeach
                      </select>
                  </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Kegiatan</label>
                      <select class="form-control select2" name="kategori" style="width: 100%"> 
                        <option value="">== Pilih Jenis Kegiatan ==</option>
                        <option value="Ibadah Raya" <?php echo ($kegiatan->kategori == 'Ibadah Raya') ? "selected": "" ?>>Ibadah Raya</option>
                        <option value="Kebaktian Tengah Minggu" <?php echo ($kegiatan->kategori == 'Kebaktian Tengah Minggu') ? "selected": "" ?>>Kebaktian Tengah Minggu</option>
                        <option value="DM" <?php echo ($kegiatan->kategori == 'DM') ? "selected": "" ?>>DM</option>
                        <option value="Youth" <?php echo ($kegiatan->kategori == 'Youth') ? "selected": "" ?>>Youth</option>
                        <option value="WBI" <?php echo ($kegiatan->kategori == 'WBI') ? "selected": "" ?>>WBI</option>
                        <option value="COOL" <?php echo ($kegiatan->kategori == 'COOL') ? "selected": "" ?>>COOL</option>
                        <option value="Doa Pengerja" <?php echo ($kegiatan->kategori == 'Doa Pengerja') ? "selected": "" ?>>Doa Pengerja</option>
                        <option value="Menara Doa" <?php echo ($kegiatan->kategori == 'Menara Doa') ? "selected": "" ?>>Menara Doa</option>
                        <option value="Ibadah BOM" <?php echo ($kegiatan->kategori == 'Ibadah BOM') ? "selected": "" ?>>Ibadah BOM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Kategori Kegiatan</label>
                      <select class="form-control select2" name="subkategori" style="width: 100%"> 
                        <option value="">== Pilih Sub Kategori Kegiatan ==</option>
                        <option value="Doa Pusat" <?php echo ($kegiatan->subkategori == 'Doa Pusat') ? "selected": "" ?>>Doa Pusat</option>
                        <option value="Doa Rayon" <?php echo ($kegiatan->subkategori == 'Doa Rayon') ? "selected": "" ?>>Doa Rayon</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <input type="text" name="nama" value="{{$kegiatan->nama_kegiatan}}" class="form-control" placeholder="nama kegiatan">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Peserta</label>
                      <select class="form-control select2" name="kapes" style="width: 100%"> 
                        <option value="">== Pilih Kategori Peserta ==</option>
                        <option value="Terbuka untuk Umum" <?php echo ($kegiatan->kategori_peserta == 'Terbuka untuk Umum') ? "selected": "" ?>>Terbuka untuk Umum</option>
                        <option value="Tertutup internal Cabang" <?php echo ($kegiatan->kategori_peserta == 'Tertutup internal Cabang') ? "selected": "" ?>>Tertutup internal Cabang</option>
                        <option value="Tertutup internal Sinode" <?php echo ($kegiatan->kategori_peserta == 'Tertutup internal Sinode') ? "selected": "" ?>>Tertutup internal Sinode</option>
                        <option value="Khusus Pengerja" <?php echo ($kegiatan->kategori_peserta == 'Khusus Pengerja') ? "selected": "" ?>>Khusus Pengerja</option>
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
                       <input type="text" name="tgl_mulai" value="{{$kegiatan->tgl_mulai}}" class="form-control datepickerkegiatan" id="tgl_mulaikeg">
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
                        <input type="text" name="tgl_selesai" value="{{$kegiatan->tgl_selesai}}" class="form-control datepickerkegiatan" id="tgl_akhirkeg">
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
                        <input type="text" name="waktu_mulai"  value="{{$kegiatan->waktu_mulai}}"  class="form-control timepicker">
                      </div>  
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"><?php echo ($kegiatan->alamat) ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rt</label>
                      <input type="text" name="rtrw[]" class="form-control"  value="{{$kegiatan->rtrw[0]}}"  placeholder="Rt">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rw</label>
                      <input type="text" name="rtrw[]" class="form-control"  value="{{$kegiatan->rtrw[1]}}"  placeholder="Rw">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinsi" id="provinces" style="width: 100%;">
                        <option value="0" disable="true">=== Pilih Provinsi ===</option>
                        @foreach ($provinces as $key => $value)
                        <option value="{{$value->id}}" @if($value->id == $kegiatan->provinsi) selected  @endif>{{ $value->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten / Kota</label>
                      <select class="form-control select2" name="kabkota" id="regencies" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kabupaten/Kota ===</option>
                        @php
                        $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($kegiatan->provinsi);
                        @endphp
                        @foreach($kabupaten as $data)
                        <option value="{{$data->id}}" @if($data->id == $kegiatan->kabkota) selected  @endif> {{ $data->name }}</option>

                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kecamatan</label>
                      <select class="form-control select2" name="kecamatan" id="districts" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kecamatan ===</option>
                        @php
                        $kecamatan = app()->make('App\Http\Controllers\CountryController')->fill_kecamatan($kegiatan->kabkota);
                        @endphp
                        @foreach($kecamatan as $data)
                        @if($data->id == $kegiatan->kecamatan)
                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                        @else
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kelurahan</label>
                      <select class="form-control select2" name="kelurahan" id="villages" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kelurahan ===</option>
                        @php
                        $kelurahan = app()->make('App\Http\Controllers\CountryController')->fill_kelurahan($kegiatan->kecamatan);
                        @endphp
                        @foreach($kelurahan as $data)
                        @if($data->id == $kegiatan->kelurahan)
                        <option value="{{$data->id}}" selected>{{$data->name}}</option>
                        @else
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="text" name="kodepos" class="form-control"  value="{{$kegiatan->kodepos}}"  placeholder="Kode Pos">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tempat</label>
                      <input type="text" name="tempat" class="form-control"  value="{{$kegiatan->tempat}}"  placeholder="Tempat">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kordinator</label>
                      <select class="form-control select2" name="kordinator"  style="width: 100%;">
                        <option value="">-- Pilih Kordinator --</option>
                        @foreach ($personal as $key => $value)
                        <option value="{{$value->idpersonal}}" <?php echo ($kegiatan->kordinator == $value->idpersonal) ? "selected": "" ?>>{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Template Sertifikat</label>
                      <div class="input-group date">
                        <input type="file" name="template" class="form-control" placeholder="Template Sertifikat">
                        <div class="input-group-addon">
                          <a  href="{{asset('public/assets/modul/kegiatan/template/'.$kegiatan->dokumen.'')}}" class="btn bg-navy" target="_blank">{{$kegiatan->dokumen}}</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" <?php echo ($kegiatan->status == 'Aktif') ? "selected": "" ?>>Aktif</option>
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