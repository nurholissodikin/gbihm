@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Institusi Struktural
      </h1>
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
              <h3 class="box-title">Detail Saldo</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                  <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                  <li role="presentation" class="active"><a href="#subrayon" data-toggle="tab" >Sub Rayon</a></li>            
                  <li role="presentation"><a href="{{route('cabang.index')}}">Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="subrayon"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Setor Saldo</h3>
                    </div>
                    <br>
                      <div class="col-md-12"> 
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Tanggal Transfer</label>
                          <input type="text" name="tatra" class="form-control" value="{{$saldo->tanggal}}" readonly="">
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Rekening Asal</label>
                          <input type="text" name="rekas" class="form-control" value="{{$saldo->bank['namabank']}}" readonly>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Rekening Tujuan</label>
                          <input type="text" name="rektu" class="form-control" value="{{$saldo->banka['namabank']}}" readonly>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Kode Transfer</label>
                          <input type="text" name="kodetr" class="form-control" value="{{$saldo->kode_transfer}}" readonly>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Jumlah Transfer</label>
                          <input type="text" name="jumlah" class="form-control" value="{{$saldo->jumlah}}" readonly>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Berita</label>
                          <textarea class="form-control" rows="3" name="berita"  readonly><?php echo ($saldo->berita); ?></textarea>
                         </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                          <label>Upload Dokumen</label>
                          <input type="text" name="dokcab" class="form-control" value="{{$saldo->bukti}}" readonly>
                         </div>
                        </div>
                        <div class="demo-button">
                         <button type="submit" class="btn btn-block btn-primary  waves-effect" value="Back" onClick="history.go(-1);">Kembali</button>
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
