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
                  <label>Rayon</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">aa</span></b></label> 
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Sub Rayon</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">
                   aa</span></b></label> 
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Cabang</label>  
                </div>
              </div>
              <div class="col-md-9"> 
                <div class="form-group">
                  <label>: &nbsp; <b><span class="pero">aa</span></b></label> 
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Pelayan</h3>
               <a href="{{url('/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>No Hp</th>
                      <th>Jenis Badge</th>
                      <th>Keterangan</th>
                      <th>Jumlah</th>
                     
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0; $jumlah = 50000; $total = 0; ?>
                   @foreach($badge as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->idpersonal}}</td>
                      <td>{{$data->personal['namalengkap']}}</td>
                      <td>{{$data->personal['jeniskelamin']}}</td>
                      <td>{{$data->personal['nohp']}}</td>
                      <td>{{$data->pelayan['jenisbadge']}}</td>
                      <td>{{$data->keterangan}}</td>
                      <td>{{"Rp " . number_format($jumlah,2,',','.')}}</td> 
                      @php
                     
                      $total = $total + $jumlah;

                      @endphp
                     
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Jumlah Yang Harus DI bayar</label>
                  <input type="text" name="jumlah" class="form-control"  readonly="" value="{{$total}}"> 
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Saldo Cabang</label>
                  <input type="text" name="saldo" class="form-control" readonly=""> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection