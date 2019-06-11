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
        <li class="active">Detail</li>
      </ol>
    </section>
<br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Data Pengerja</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ID Personal</label>
                      <input type="text" name="noref" value="{{$jabpel->personal['idpersonal']}}" class="form-control" readonly=""> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="noref" value="{{$jabpel->personal['namalengkap']}}" class="form-control" readonly=""> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Referensi</label>
                      <input type="text" name="noref" value="{{$jabpel->noreferensi}}" class="form-control" readonly=""> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="noref" value="{{$jabpel->jabatan}}" class="form-control" readonly=""> 
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                     <label>
                      <input type="checkbox" class="minimal" name="jabut" value="Jabatan Utama" readonly="" <?php echo ($jabpel->jabut == 'Jabatan Utama') ? 'checked' :'' ?>> Tandai Sebagai Jabatan Utama
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
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tempat</label>
                      <input type="text" name="noref" value="{{$jabpel->rayon['namarayon']}}{{$jabpel->subrayon['namasubrayon']}}{{$jabpel->cabang['namacabang']}}" class="form-control" readonly="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sejak</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input  value="{{$jabpel->sejak}}"  type="text" class="form-control" readonly="" name="tgl_awal">
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
                      <input  placeholder="Sampai" value="{{$jabpel->sampai}}" type="text" class="form-control" readonly="">
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
                      <input  type="text" value="{{$jabpel->tgl}}" class="form-control" readonly="" name="lantik">
                     </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Rekomendasi</label>
                     <input  type="text" value="{{$jabpel->pengerjaa['namalengkap']}}" class="form-control" readonly="" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <label>Hadir Di Pertemuan</label>
                    <div class="form-group">
                      <label>
                      
                        <input type="checkbox" name="hp[]" class="minimal" value="Menara Doa Pelayan Jemaat (MDPJ)"
                       <?php echo ($jabpel->hadirpertemuan[0] == 'Menara Doa Pelayan Jemaat (MDPJ)') ? "checked" : "" ?> />Menara Doa Pelayan Jemaat (MDPJ)
                      </label>
                    </div>
                    <div class="form-group">
                      <label>
                        <input type="checkbox"  name="hp[]" class="minimal" value="DPPJ" <?php if($jabpel->hadirpertemuan[0] == 'DPPJ'){
                      echo "checked";
                      } else if ($jabpel->hadirpertemuan[1] == 'DPPJ') {
                       echo "checked";
                      }else{} ?>> DPPJ
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No. Sertifikat</label>
                      <input type="text" name="noser" value="{{$jabpel->nosertifikat}}"  class="form-control" readonly="">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Dokumen</label>
                     <a  href="{{asset('public/assets/rohani/jabatanpelayanan/dokumen/'.$jabpel->dok.'')}}" class="btn bg-navy" target="_blank">{{$jabpel->dok}}</a>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="" class="form-control" readonly="" value="{{$jabpel->status}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
