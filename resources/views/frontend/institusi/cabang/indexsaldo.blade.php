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
              <h3 class="box-title">Senayan 1</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                  <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                  <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                  <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Setor Saldo</h3>
                    </div>
                    <br>
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">Histori Transaksi</h3>
                        <a href="{{ url('/cabang/saldo/tambah/'.$cabang->idcabangranting)}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"> Setor Saldo</i></a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>ID Transaksi</th>
                              <th>Tanggal</th>
                              <th>Jenis Transaksi</th>
                              <th>Jenis Badge</th>
                              <th>Jumlah</th>
                              <th>Saldo</th>
                              <th>Creator</th>
                              <th>ID Personal</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $no = 0;
                              $t_saldo = 0;
                              ?>
                            @foreach($saldo as $data)
                            <?php $no++ ;?>
                            <tr>
                              <td>{{$no}}</td>
                              <td>{{$data->idtransaksi}}</td>   
                              <td>
                                @php
                                  $a = $data->tanggal;   
                                  $tanggal = date('d F Y', strtotime($a));
                                @endphp
                                {{$tanggal}}
                              </td>
                              <td>{{$data->jenis_transaksi}}</td>
                              <td>{{$data->jenisbadge}}</td>
                              <td>{{"Rp " . number_format($data->jumlah,2,',','.')}}</td>
                              <td>
                                @php
                                  if($data->jenis_transaksi == 'Setor'){
                                    $t_saldo = $t_saldo + $data->jumlah;
                                  }else if($data->jenis_transaksi == 'Badge Hilang'){
                                    $t_saldo = $t_saldo - $data->jumlah;
                                  }else if($data->jenis_transaksi == 'Renew'){
                                    $t_saldo = $t_saldo - $data->jumlah;
                                  }
                                @endphp
                                {{"Rp " . number_format($t_saldo,2,',','.')}}
                              </td>
                              <td>{{$data->active}}</td>
                              <td>{{$data->cabang->pemimpin}}</td>    
                              <td>
                                <a href="{{ url('/cabang/saldo/detail/'.$data->idtransaksi)}}" type="submit" class="btn btn-block-small btn-warning">Detail</a>
                              </td>                 
                            </tr>
                            @endforeach 
                          </tbody>
                        </table>
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
