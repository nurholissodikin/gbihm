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
              <h3 class="box-title">Data Cabang</h3>
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
                    <br>
                    <div class="box">
                      <div class="box-header">
                        <div class="col-md-10">
                         <h3 class="box-title">List Data Cabang</h3>
                        </div>
                          <a href="{{route('kebaktian.create')}}" class="btn btn-primary center" ><i class="fa fa-plus">  Kebaktian</i></a>
                          <a href="{{route('cabang.create')}}" class="btn btn-primary center" ><i class="fa fa-plus">  Cabang</i></a>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="table-responsive">
                          <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Cabang</th>
                                <th>Sub Rayon</th>
                                <th>Pemimpin</th>
                                <th>Wakil Pemimpin</th>
                                <th>No. Ref</th>
                                <th>No. Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 0;?>
                              @foreach($cabang as $data)
                              <?php $no++ ;?>
                              <tr>
                                <td>{{$no}}</td>
                                <td>{{$data->namacabang}}</td>
                                <td>{{$data->subrayon['namasubrayon']}}</td>
                                <td>{{$data->personal['namalengkap']}}</td>
                                <td>{{$data->personala['namalengkap']}}</td>
                                <td>{{$data->noref}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>{{$data->active}}</td>    
                                <td>
                                  <a href="{{ route('cabang.show',$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small bg-navy">Kebaktian</a>
                                  <a href="{{ url('cabang/kegiatan',$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small bg-navy">Kegiatan</a>
                                  <a href="{{ url('cabang/personal/'.$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small btn-success"><span class="glyphicon glyphicon-user"></span></a>
                                  <a href="{{ url('cabang/saldo/'.$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small btn-primary"><i class="fa fa-credit-card"></i></a>
                                  <a href="{{ url('cabang/detail/'.$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small btn-info"><i class="fa fa-eye"></i></a>
                                  <a href="{{ route('cabang.edit',$data->idcabangranting)}}" type="submit" class="btn btn-xs btn-block-small btn-warning"><span class="glyphicon glyphicon-edit"></span></a>
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