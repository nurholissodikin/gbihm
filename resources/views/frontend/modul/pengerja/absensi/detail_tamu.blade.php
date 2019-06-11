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
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>  
                <h3 class="box-title ">Detail Data Tamu</h3><button type="submit" class="btn btn-xs pull-right btn-primary  waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button> 

              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>ID Tamu</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$absensi_tamu->tamukhusus['idtamukhusus']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Nama Lengkap</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$absensi_tamu->tamukhusus['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Jabatan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$absensi_tamu->tamukhusus['jabatan']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Keterangan</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$absensi_tamu->kehadiran}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Alasan Ijin</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span class="pero">{{$absensi_tamu->alasan}}</span></b></label> 
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
