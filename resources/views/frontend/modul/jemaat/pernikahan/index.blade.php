@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pelayanan Jemaat
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <a href="{{url('modul/pelayanjemaat/pernikahan/caper')}}" class="btn btn-primary">Calon Peserta Pernikahan</a>
          <a href="{{url('dokumenpernikahan')}}" class="btn btn-primary">Master Dokumen</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/pendaftaran')}}" class="btn btn-primary">Form Pendaftaran Pernikahan</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/tambahakta')}}" class="btn btn-primary">Tambah Akta Pernikahan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Pernikahan</h3>
               <a href="{{url('modul/pelayanjemaat/pernikahan/pendaftaran')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Rayon</th>
                      <th>Cabang / Ranting</th>
                      <th>No. Akta</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Pelayan</th>
                      <th>Dokumen</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($pernikahan as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->namarayon}}</td>
                      <td>{{$data->namacabang}}</td>
                      <td>{{$data->noakta}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->namalengkap_anak}}</td>
                      <td>{{$data->namalengkap_pelayan}}</td>
                      <td>{{$data->dokumen}}</td> 
                      <td>
                        <a href="{{ url('modul/pelayanjemaat/pernikahan/tambahakta/detail',$data->idpernikahan)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pelayanjemaat/pernikahan/tambahakta/edit',$data->idpernikahan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
                <label>Note : List Akta Pernikahan adalah Jemaat yang sudah menerima Akta Pernikahan</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection