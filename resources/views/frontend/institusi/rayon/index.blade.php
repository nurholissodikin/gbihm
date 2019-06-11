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
              <h3 class="box-title">Data Rayon</h3>
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
                    <br>
                    <div class="box">
                      <div class="box-header">
                        <div class="col-md-9">
                         <h3 class="box-title">List Rayon</h3>
                        </div>
                          <a href="{{route('saldo.create')}}" class="btn btn-primary" ><i class="fa fa-plus"> Setor Saldo</i></a>
                          <a href="{{route('rayon.create')}}" class="btn btn-primary" ><i class="fa fa-plus">  Rayon</i></a>
                          <a href="#" class="btn btn-primary" ><i class="fa fa-plus"> Laporan</i></a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="table-responsive">
                          <table id="example2" class="table  table-bordered table-hover" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Rayon</th>
                                <th>Nama Rayon</th>
                                <th>Pemimpin</th>
                                <th>Wakil Pemimpin</th>
                                <th>No. Ref</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 0;?>
                              @foreach($rayon as $data)
                              <?php $no++ ;?>
                              <tr>
                                <td>{{$no}}</td>
                                <td>{{$data->koderayon}}</td>
                                <td>{{$data->namarayon}}</td>
                                <td>{{$data->personal['namalengkap']}}</td>
                                <td>{{$data->personala['namalengkap']}}</td>
                                <td>{{$data->noref}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>{{$data->active}}</td>    
                                <td>
                                  <a href="{{ url('rayon/personal',$data->idrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-success"><span class="glyphicon glyphicon-user"></a>
                                  <a href="{{ route('rayon.show',$data->idrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-primary"><i class="fa fa-credit-card"></i></a>
                                  <a href="{{ url('/rayon/detail/'.$data->idrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-info"><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('rayon.edit',$data->idrayon)}}" type="submit" class="btn btn-xs btn-block-small btn-warning"><span class="glyphicon glyphicon-edit"></a>
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
      </div>
    </section>
  </div>


@endsection