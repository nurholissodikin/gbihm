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
            <form action="{{url('kirim/pusat',$badge->id)}}" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jumlah Yang Harus Di bayar</label>
                    <input type="text" name="jumlah" class="form-control"  readonly="" value="50000">  
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pembayaran Anda harus sudah dilakukan sebelum</label>
                    <input type="text" name="saldo" class="form-control" readonly="" value="28 April 2019 00:00:00"> 
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Pembayaran Anda</label>
                    <input type="text" name="saldo" class="form-control" readonly="" value="4184902394284"> 
                  </div>
                </div>
                <input type="hidden" name="status_order" value="{{$badge->status_order}}">
                
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect" onClick="history.go(-1);">Bayar</button>
                </div>
              </div>
             </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection