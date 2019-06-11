@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Institusi Struktural
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('subrayon.index')}}">Subrayon</a></li>
        <li class="active">List Data Personal Rayon</li>
      </ol>
    </section>
    <br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Rayon - <b>{{$rayon->namarayon}}</b></h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation" class="active"><a href="#rayon" data-toggle="tab">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>
                 <li role="presentation"><a href="{{route('cabang.index')}}">Rayon</a></li>
                </ul>
              <div class="tab-content"> 
                <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                  <br>
                  <br>
                  <div class="box">
                    <div class="box-header">
                      <div class="col-md-6">
                       <h3 class="box-title">List Data Personal Rayon</h3>
                      </div>
                        <a href="{{url('/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"> Tambah Personal</i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nkp</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Gereja</th>
                            <th>Email</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 0;?>
                          @foreach($anggota as $data)
                          <?php $no++ ;?>
                          <tr>
                            <td>{{$no}}</td>
                              <td>{{$data->personal->idpersonal}}</td>
                              <td>{{$data->personal->namalengkap}}</td>
                              <td>{{$data->personal->jeniskelamin}}</td>
                              <td>{{$data->personal->nohp}}</td>
                              <td>{{$data->personal->alamattinggal}}</td>
                              <td>{{$data->personal->gerejaasal}}</td>
                              <td>{{$data->personal->email}}</td>    
                            <td>
                              <a href="{{ url('rayon/personal/detail/'.$data->personal->idpersonal)}}" type="submit" class="btn btn-xs btn-block-small btn-info"><i class="fa fa-eye"></i></a>
                              <a href="{{ url('rayon/personal/edit/'.$data->personal->idpersonal)}}" type="submit" class="btn btn-xs btn-block-small btn-warning"><span class="glyphicon glyphicon-edit"></a>
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