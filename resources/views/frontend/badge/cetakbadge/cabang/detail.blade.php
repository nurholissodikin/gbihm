@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1 class="pull-left">
       MDPJ
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Detail Badge</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-3">
                <div class="form-group">
                  <label>ID</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">{{$badge->idpersonal}}</span></b></label> 
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nama Lengkap</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">
                   {{$badge->personal['namalengkap']}}</span></b></label> 
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Keterangan</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">{{$badge->keterangan}}</span></b></label> 
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Jenis Badge</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">Hitam</span></b></label> 
                </div>
              </div>
              <?php 
                if($badge->status_badge=='0'){
                  $status="Waiting Approve";
                  $color="bg-maroon";

                }else if($badge->status_badge=='1'){
                  $status="Approved by Gembala Rayon";
                  $color="bg-green";

                }
                else if($badge->status_badge=='2'){
                  $status="Sudah Cetak";
                  $color="bg-green";
                }
                else{
                  $status="";
                  $color="";
                }
              ?>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Status</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="{{$color}}">{{$status}}</span></b></label> 
                </div>
              </div>
              <!-- @php
              $kemarin = date('Y-m-d', strtotime("+3 day", strtotime(date("Y-m-d"))));
              @endphp
              {{$kemarin}} -->
              <div class="demo-button">
                <button type="submit" class="btn btn-block btn-primary  waves-effect" onClick="history.go(-1);">Kembali</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection