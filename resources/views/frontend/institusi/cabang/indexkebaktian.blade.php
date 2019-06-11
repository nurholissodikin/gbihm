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
            <div class="box-body">
              <br>
              <div class="box-header with-border">
               <h3 class="box-title">Cabang - {{$cabang->namacabang}}</h3>
              </div>
              <br>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Kebaktian</h3>
                  <a href="{{ url('/cabang/kebaktian/tambah',$cabang->idcabangranting)}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"> Kebaktian</i></a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori Kebaktian</th>
                        <th>Nama Kebaktian</th>
                        <th>Tempat/Ruangan</th>
                        <th>Hari/Waktu</th>
                        <th>Kordinator</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 0;?>
                      @foreach($kebaktian as $data)
                      <?php $no++ ;?>
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->kategori}}</td>
                        <td>{{$data->namakebaktian}}</td>
                        <td>{{$data->tempat}}</td>
                        <td>Minggu,{{$data->jam}}</td>
                        <td>{{$data->kordinator}}</td>
                        <td>{{$data->status}}</td> 
                        <td>
                          <a href="#" type="submit" class="btn btn-block-small btn-warning">Anggota</a>
                          <a href="{{ url('/cabang/kebaktian/detail/'.$data->idkebaktian)}}" type="submit" class="btn btn-block-small btn-warning">Detail</a>
                          <a href="{{ url('/cabang/kebaktian/edit/'.$data->idkebaktian)}}" type="submit" class="btn btn-block-small btn-warning">edit</a>
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
    </section>
  </div>
@endsection
