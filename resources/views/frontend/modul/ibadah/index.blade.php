@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Ibadah Raya
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Ibadah Raya</h3>
               <a href="{{url('modul/ibadahraya/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
               <a href="{{url('modul/ibadahraya/kalender')}}" class="btn btn-primary pull-right" ><i class="fa fa-calendar"> Tampilkan Kalender</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">      
                  <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Ibadah</th>
                        <th>Kategori Ibadah</th>
                        <th>Nama Ibadah</th>
                        <th>Tempat/Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Kordinator</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="kom_data">
                      @php $no = 1 @endphp
                      @foreach($ibadahraya as $item)
                      <tr class="item{{$item->id}}">
                        <td>{{$no}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->nama_ibadah}}</td>
                        <td>{{$item->tempat}}</td>
                        @php
                        $a = date('l,d F Y', strtotime($item->tanggal));
                        @endphp
                        <td>{{$a}}</td>
                        <td>{{$item->waktu}}</td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>
                          <a href="{{ url('modul/ibadahraya/'.$item->id.'/edit')}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <a href="{{ url('modul/ibadahraya/pelayan',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Pelayanan</a>
                          <a href="{{ url('modul/ibadahraya/kehadiran',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Kehadiran</a>
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
    </section>
  </div>
  
@endsection