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
              <h3 class="box-title">Detail Rayon - <b>{{$rayon->namarayon}}</b></h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs tab-nav-right" role="tablist">
               <li role="presentation" class="active"><a href="#rayon" data-toggle="tab">Rayon</a></li>
               <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>
               <li role="presentation"><a href="{{route('cabang.index')}}">Rayon</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="rayon"> 
                  <br>
                  <div class="box-header with-border">
                   <h3 class="box-title">Detail Data Rayon</h3>
                  </div>
                  <br>
                  <div class="col-md-12"> 
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Wilayah</label>
                        <input type="text" name="a" value="{{$rayon->wilayah}}" class="form-control" readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kode Rayon</label>
                        <input type="text" name="koder" class="form-control" readonly="" value="{{$rayon->koderayon}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Rayon</label>
                        <input type="text" name="namar" class="form-control" readonly="" value="{{$rayon->namarayon}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pemimpin</label>
                        <input type="text" name="namara" class="form-control" readonly="" value="{{$rayon->personal['namalengkap']}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Wakil Pemimpin</label>
                        <input type="text" name="namara" class="form-control" readonly="" value="{{$rayon->personala['namalengkap']}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>No. Ref</label>
                        <input type="text" name="noref" class="form-control" readonly="" value="{{$rayon->noref}}" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="ketr" class="form-control" readonly="" value="{{$rayon->keterangan}}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Status</label>
                        <input type="text" name="namara" class="form-control" readonly="" value="{{$rayon->active}}">
                      </div>
                    </div>
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect" onClick="history.go(-1);" >Kembali</button>
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
