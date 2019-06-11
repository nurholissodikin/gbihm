@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Modul Pengerja

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Modul</a></li>
        <li><a href="#">Pengerja</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Pengerja</h3>
            </div>
            <form action="{{url('pengerja/update',$jabpel->id)}}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="idpersonal" value="{{ $jabpel->idpersonal }}">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Referensi</label>
                        <input type="text" name="noref" value="{{$jabpel->noreferensi}}" class="form-control" placeholder="No. Referensi">  
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pilih Jabatan</label>
                        <select class="form-control select2" name="jabatan" style="width: 100%">
                          <option value="">== Pilih Pilih Jabatan ==</option>
                          <option value="Pdt." <?php echo ($jabpel->jabatan == 'Pdt.') ? "selected" : "" ?>>Pdt.</option>
                          <option value="Pdm." <?php echo ($jabpel->jabatan == 'Pdm.') ? "selected" : "" ?>>Pdm.</option>
                          <option value="Pdp." <?php echo ($jabpel->jabatan == 'Pdp.') ? "selected" : "" ?>>Pdp.</option>
                          <option value="Ka. Divisi" <?php echo ($jabpel->jabatan == 'Ka. Divisi') ? "selected" : "" ?>>Ka. Divisi</option>
                          <option value="Istri Ka. Divisi" <?php echo ($jabpel->jabatan == 'Istri Ka. Divisi') ? "selected" : "" ?>>Istri Ka. Divisi</option>
                          <option value="Wkl. Ka. Divisi" <?php echo ($jabpel->jabatan == 'Wkl. Ka. Divisi') ? "selected" : "" ?>>Wkl. Ka. Divisi</option>
                          <option value="Istri/Suami Wkl. Ka. Divisi" <?php echo ($jabpel->jabatan == 'Istri/Suami Wkl. Ka. Divisi') ? "selected" : "" ?>>Istri/Suami Wkl. Ka. Divisi</option>
                          <option value="Ka. Sub Divisi" <?php echo ($jabpel->jabatan == 'Ka. Sub Divisi') ? "selected" : "" ?>>Ka. Sub Divisi</option>
                          <option value="Istri/Suami Ka. Sub Divisi" <?php echo ($jabpel->jabatan == 'Istri/Suami Ka. Sub Divisi') ? "selected" : "" ?>>Istri/Suami Ka. Sub Divisi</option>
                          <option value="Staf Ahli Penggembalaan" <?php echo ($jabpel->jabatan == 'Staf Ahli Penggembalaan') ? "selected" : "" ?>>Staf Ahli Penggembalaan</option>
                          <option value="Istri/Suami Staf Ahli Penggembalaan" <?php echo ($jabpel->jabatan == 'Istri/Suami Staf Ahli Penggembalaan') ? "selected" : "" ?>>Istri/Suami Staf Ahli Penggembalaan</option>
                          <option value="Wkl. Ka. Sub Divisi" <?php echo ($jabpel->jabatan == 'Wkl. Ka. Sub Divisi') ? "selected" : "" ?>>Wkl. Ka. Sub Divisi</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                       <label>
                        <input type="checkbox" class="minimal" name="jabut" value="Jabatan Utama" <?php echo ($jabpel->jabut == 'Jabatan Utama') ? 'checked' :'' ?>> Tandai Sebagai Jabatan Utama
                        </label>
                      </div>
                    </div>
                        <!-- <div class="col-md-12">
                          <div class="form-group">
                            <label>Tempat (Pusat/Rayon/Cabang/Ranting)</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-search"></i>
                              </div>
                              <input type="text" class=" form-control" name="tempat" id="autocomplete" placeholder="Cari Pusat/Rayon/Cabang/Ranting">
                            </div>
                             <div id="autocomplete_list">
                              </div>
                          </div>
                        </div> -->
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tempat</label>
                        <select name="rayon" class="form-control select2 sub_tem cab_tem" id="id_tempat_rayon"  style="width: 100%">
                          <option value="">== Pilih Rayon ==</option>
                          @foreach ($raper as $data)
                          <option value="{{$data->idrayon}}" <?php echo ($jabpel->idrayon == $data->idrayon) ? "selected" : "" ?>> {{$data->namarayon}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label><br></label>
                        <select name="subrayon" class="form-control select2 ray_tem cab_tem" id="id_tempat_subrayon" style="width: 100%">
                          <option value="">== Pilih Sub Rayon ==</option>
                          @foreach ($subray as $data)
                          <option value="{{$data->idsubrayon}}" <?php echo ($jabpel->idsubrayon == $data->idsubrayon) ? "selected" : "" ?>> {{$data->namasubrayon}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label><br></label>
                        <select name="cabang" class="form-control select2 ray_tem sub_tem" id="id_tempat_cabang" style="width: 100%">
                          <option value="">== Pilih Cabang ==</option>
                          @foreach ($cabran as $data)
                          <option value="{{$data->idcabangranting}}" <?php echo ($jabpel->idcabangranting == $data->idcabangranting) ? "selected" : "" ?>> {{$data->namacabang}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Sejak</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input id="tgl_mulai" value="{{$jabpel->sejak}}" placeholder="Sejak" type="text" class="form-control datepicker" name="tgl_awal">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <label>Sampai Dengan</label>
                       <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input id="tgl_akhir" placeholder="Sampai" value="{{$jabpel->sampai}}" type="text" class="form-control datepicker" name="tgl_akhir">
                       </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                       <label>Tanggal Lantik</label>
                       <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input placeholder="Tanggal Lantik" type="text" value="{{$jabpel->tgl}}" class="form-control datepicker" name="lantik">
                       </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Rekomendasi</label>
                        <select name="pengerja" class="form-control select2" required="" id="pej_jpl" style="width: 100%">
                          <option value="">== Pilih Nama Penegerja ==</option>
                          @foreach ($perso as $data)
                          <option value="{{$data->idpersonal}}" <?php echo ($jabpel->pengerja == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label>Hadir Di Pertemuan</label>
                      <div class="form-group">
                        <label>
                          <input type="checkbox" name="hp[]" value="Menara Doa Pelayan Jemaat (MDPJ)"
                         <?php 
                          if (in_array("Menara Doa Pelayan Jemaat (MDPJ)", $jabpel->hadirpertemuan))
                                { echo "checked"; } 
                         ?>>Menara Doa Pelayan Jemaat (MDPJ)
                        </label>
                      </div>
                      <div class="form-group">
                        <label>
                          <input type="checkbox"  name="hp[]" value="DPPJ" <?php 
                          if (in_array("DPPJ", $jabpel->hadirpertemuan))
                                { echo "checked"; } 
                         ?>> DPPJ
                        </label>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Sertifikat</label>
                        <input type="text" name="noser" value="{{$jabpel->nosertifikat}}"  class="form-control" placeholder="No. Sertifikat">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dokumen</label>
                        <input type="file" name="dok"  class="form-control"><a  href="{{asset('public/assets/rohani/jabatanpelayanan/dokumen/'.$jabpel->dok.'')}}" class="btn bg-navy" target="_blank">{{$jabpel->dok}}</a>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2" style="width: 100%">
                          <option value="">== Pilih Status ==</option>
                          <option value="Aktif" <?php echo($jabpel->status == 'Aktif')? "selected" : "" ?>>Aktif</option>
                          <option value="Non Aktif" <?php echo($jabpel->status == 'Non Aktif')? "selected" : "" ?>>Non Aktif</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="demo-button">
                        <button type="submit"  class="btn btn-primary form-control">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>  
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@push ('script')
<script type="text/javascript">
 $(document).ready(function () {
 $("#tgl_mulai").on('changeDate', function(selected) {
    var startDate = new Date(selected.date.valueOf());
    $("#tgl_akhir").datepicker('setStartDate', startDate);
    if($("#tgl_mulai").val() > $("#tgl_akhir").val()){
      $("#tgl_akhir").val($("#tgl_mulai").val());
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
 });
</script>
@endpush