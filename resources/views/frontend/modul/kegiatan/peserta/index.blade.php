@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kegiatan - <b>{{$kegiatan->nama_kegiatan}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Peserta Kegiatan</h3>
               <a href="{{url('modul/kegiatan/peserta/create/'.$kegiatan->id)}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">        
                  <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Reg</th>
                        <th>ID Personal</th>
                        <th>Nama Lengkap</th>
                        <th>No. HP</th>
                        <th>Cabang</th>
                        <th>Email</th>
                        <th>Hadir</th>
                        <th>Sertifikat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $no = 1 @endphp
                      @foreach($peserta as $item)
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->personal['idpersonal']}}</td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>{{$item->personal['nohp']}}</td>
                        <td>{{$item->personal->kenaggotaan['cabang']}}</td>
                        <td>{{$item->personal['email']}}</td>
                        <td>{{$item->hadir}}</td>
                        <td>{{$item->sertifikat}}</td>
                        <td>
                          <a href="{{ url('kegiatan/detail/peserta',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs">Detail</a>
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
@push('script')
<script type="text/javascript">
</script>
@endpush