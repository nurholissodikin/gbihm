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
              <h3 class="box-title">Data SubRayon</h3>
            </div>
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                  <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                  <li role="presentation" class="active"><a href="#subrayon" data-toggle="tab" >Sub Rayon</a></li>            
                  <li role="presentation"><a href="{{route('cabang.index')}}">Cabang</a></li>
                </ul>
            </div>
            <br>
          
                <div class="box">
                  <div class="box-header">
                    <div class="col-md-10">
                      <h3 class="box-title">List Data Kegiatan Subrayon</h3>
                    </div>
                  </div>
                   <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive">
                      <table width="100%" class="table table-bordered table-hover data-table"  cellspacing="0">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>ID Kegiatan</th>
                            <th>Kategori Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Tempat/Ruangan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Pic</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="kom_data">
                          @php $no = 1 @endphp
                          @foreach($kegiatan as $item)
                          <tr class="item{{$item->id}}">
                            <td>{{$no}}</td>
                            <td>{{$item->id}}</td>
                            <td>{{$item->kategori}}</td>
                            <td>{{$item->nama_kegiatan}}</td>
                            <td>{{$item->tempat}}</td>
                            <td>{{$item->tgl_mulai}}</td>
                            <td>{{$item->waktu_mulai}}</td>
                            <td>{{$item->personal['namalengkap']}}</td>
                            <td>
                              <a href="{{ route('kegiatan.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                              <a href="{{ url('kegiatan/pelayan',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Pelayanan</a>
                              <a href="{{ url('kegiatan/peserta',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Peserta</a>
                              <a href="{{ url('kegiatan/kehadiran',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Kehadiran</a>
                            </td>
                          </tr>
                          @php $no++ @endphp
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>

  </div>


@endsection
