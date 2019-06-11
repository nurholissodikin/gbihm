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
              <h3 class="box-title">Data Cabang Personal</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                  <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                  <li role="presentation" class="active"><a href="#subrayon" data-toggle="tab" >Sub Rayon</a></li>            
                  <li role="presentation"><a href="{{route('cabang.index')}}">Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Edit Data Cabang Personal</h3>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama" readonly="" class="form-control" value="{{$personal->namalengkap}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Jenis Kelamin</label>                 
                            <input type="text" name="jk" value="{{$personal->jeniskelamin}}" readonly="" class="form-control"> 
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="number" name="nohp" class="form-control" readonly=""  value="{{$personal->nohp}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control" rows="3" name="alamat" readonly="">
                           <?php echo ($personal->alamattinggal); ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Gereja Asal</label>
                          <input type="text" name="gereja" class="form-control" readonly=""  value="{{$personal->gerejaasal}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" readonly=""  value="{{$personal->email}}">
                        </div>
                      </div> 
                      <div class="demo-button">
                        <button type="submit" class="btn btn-block btn-primary  waves-effect" onClick="history.go(-1);">Kembali</button>
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
