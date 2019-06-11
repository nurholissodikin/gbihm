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
          <a href="{{url('modul/pelayanjemaat/pernikahan/caper')}}" class="btn btn-primary active">Calon Peserta Pernikahan</a>
          <a href="{{url('dokumenpernikahan')}}" class="btn btn-primary">Master Dokumen</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/pendaftaran')}}" class="btn btn-primary">Form Pendaftaran Pernikahan</a>
          <a href="{{url('modul/pelayanjemaat/pernikahan/tambahakta')}}" class="btn btn-primary">Tambah Akta Pernikahan</a>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Pernikahan</h3>
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
                      <th>No. ID</th>
                      <th>Nama Lengkap</th>
                      <th>Tempat / Tanggal Lahir</th>
                      <th>No KKJ</th>
                      <th>Status</th>
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
                      <td>{{$data->idpasangan}}</td>
                      <td>{{$data->namalengkap_pasangan}}</td>
                      <td>{{$data->tempatlahir_pasangan}}  {{$data->tanggallahir_pasangan}}</td>
                      <td>{{$data->nokkj_pasangan}}</td>
                      <td>
                        <?php 
                          if($data->status=='In Confirmation'){
                            $status="In Confirmation";
                            $color="bg-maroon";
                          }else if($data->status=='Revised'){
                            $status="Revised";
                            $color="bg-red";
                          }else if($data->status=='Waiting for Cretificate'){
                            $status="Waiting for Cretificate";
                            $color="bg-green";
                          }else if($data->status=='Akta Baptisan'){
                            $status="Akta Baptisan";
                            $color="bg-blue";
                          }
                          else{
                            $status="";
                            $color="";
                          }
                        ?>
                        <span class="label {{$color}}">{{$status}}</span>
                      <td>
                        <a href="{{ url('modul/pelayanjemaat/pernikahan/pendaftaran/detail',$data->idpernikahan)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('modul/pelayanjemaat/pernikahan/pendaftaran/edit',$data->idpernikahan)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>            
                    </tr>
                   @endforeach 
                  </tbody>
                </table>
                <label>Note : Jika Akta Pernikahan sudah dikirim ke Peserta maka Peserta tidak terdaftar lagi di List Calon Peserta Pernikahan, melainkan pindah ke List Akta Pernikahan</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
