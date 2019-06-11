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
              <h3 class="box-title">Order Badge</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Jenis Badge</th>
                      <th>Status</th>
                      <th>Status Pembayaran</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                     
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0; ?>
                   @foreach($badge as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->idpersonal}}</td>
                      <td>{{$data->personal['namalengkap']}}</td>
                      <td>{{$data->personal['jeniskelamin']}}</td>
                      <td>Hitam</td>
                      <?php 
                        if($data->status_badge=='0'){
                          $status="Waiting Approve";
                          $color="bg-maroon";
                         
                        }else if($data->status_badge=='1'){
                          $status="Approved by Gembala Rayon";
                          $color="bg-green";
                         
                        }
                        else if($data->status_badge=='2'){
                          $status="Sudah Cetak";
                          $color="bg-green";
                        }
                        else{
                          $status="";
                          $color="";
                        }
                        if($data->status_order=='0'){
                          $statusa="Sedang Dalam Proses";
                          $colora="bg-maroon";
                         
                        }else if($data->status_order=='1'){
                          $statusa="Sudah Terbit";
                          $colora="bg-green";
                         
                        }
                        else{
                          $statusa="";
                          $colora="";
                        }
                      ?>
                      <td><span class="label {{$color}}">{{$status}}</span> </td>

                      <td><span class="label {{$colora}}">{{$statusa}}</span> </td>
                      <td>{{$data->keterangan}}</td>
                      <td>
                       
                        <a href="{{ url('mdpj/cetak_badge/detail',$data->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                          <button onclick="location.href='{{ url('mdpj/cetak_badge/order',$data->id)}}'" @if($status =='Waiting Approve') disabled @elseif($statusa == 'Sedang Dalam Proses') disabled @elseif($statusa == 'Sudah Terbit') disabled @endif class="btn btn-block-small bg-navy btn-xs ">Order</button>
                          <button onclick="location.href='{{ url('mdpj/cetak_badge/cetak',$data->id)}}'" @if($status =='Waiting Approve') disabled @elseif($statusa == '') disabled @elseif($statusa == 'Sedang Dalam Proses') disabled @endif class="btn btn-block-small bg-navy btn-xs ">Badge</button>
                       
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