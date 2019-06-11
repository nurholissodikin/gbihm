@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Absensi COOL - <b>{{$cool->personal['namalengkap']}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Data COOL</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tipe COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <input type="hidden" name="idpersonal" value="{{$cool->id}}">
                      <label>: &nbsp; <b><span>{{$cool->tipecool['tipecool']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Gembala COOl</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->personal['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pengerja</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->pengerja}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Jabatan Gembala COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->jabatan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Lokasi COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->lokasi}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kabupaten / Kota</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->kabkotaa['name']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Provinsi</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->provinsia['name']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kode Pos</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->kodepos}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-default">
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Absensi COOL</h3>
              </div>
              <br>
              <form  action="{{ url('absensi/store') }}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <input type="hidden" name="idcool" value="{{$cool->id}}">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" name="tanggal" class="form-control datepickerlight" autocomplete="off" placeholder="Tanggal">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kubu Doa</label>
                    <input type="number" name="kubu_doa" class="form-control">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jemaat Yang Hadir</label>
                    <input type="number" name="jemaat" class="form-control">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Non Jemaat Yang Hadir</label>
                    <input type="number" name="non_jemaat" class="form-control">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="text" name="persembahan" class="form-control">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="demo-button"><br>
                    <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                  </div>
                </div>
              </form>    
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Absensi COOL</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                      <th>Kubu Doa</th>
                      <th>Jemaat Yang Hadir</th>
                      <th>Non Jemaat Yang Hadir</th>
                      <th>Persembahan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($absensi as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->lokasi}}</td>
                      <td>{{$item->kubu_doa}}</td>
                      <td>{{$item->jemaat}}</td>
                      <td>{{$item->non_jemaat}}</td>
                      <td>{{$item->persembahan}}</td>
                      <td>
                        <a href="{{ url('cool/absensi/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ url('cool/absensi/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-danger" onclick="del_absensi({{$item->id}})">
                          <span class="glyphicon glyphicon-trash"></span> 
                        </button>
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
 @push('scriptz')
<script type="text/javascript">
  function del_absensi(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Data Absensi COOL ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('absensi/delete')}}"+"/"+id,function(){
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