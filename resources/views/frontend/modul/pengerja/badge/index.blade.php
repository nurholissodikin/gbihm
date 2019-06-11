@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Pengerja
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Histori Badge</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>ID Personal</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Approver</th>
                      <th>Status</th>
                      <th>Jenis Badge</th>
                      <th>Renew/Badge Hilang</th>
                      <th>Aksi</th>
                    </tr>

                  </thead>
                  <tbody>
                   <?php $no = 0;?>
                   @foreach($saldo as $data)
                   <?php $no++ ;?>
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$data->idtransaksi}}</td>
                      <td>{{$data->idpersonal}}{{$data->idtamukhusus}}</td>
                      <td>{{$data->namalengkap}} {{$data->namalengkap_tamu}}</td>
                      <td>{{$data->tanggal}}</td>
                      <td>{{$data->jeniskelamin_tamu}}</td>
                      <td>{{$data->status}}</td>
                      <td>{{$data->jenisbadge_tamu}}{{$data->jenisbadge_personal}}</td>
                      <td>{{$data->jenis_transaksi}}</td> 
                      <td>
                        <a href="{{ url('modul/pengerja/historibadge',$data->idtransaksi)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
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
@push('scriptz')
<script type="text/javascript">
  function del_person(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Personal ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('personal/destroy/')}}"+"/"+id,function(){
          swal({
            title: "Berhasil Dihapus",
            icon: "success",

          });
          location.reload();
        }).fail(function() {
          alert( "error" );
        });
      }
    });
  }
</script>
@endpush