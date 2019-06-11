@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Guru KOM</h3>
              <button class="btn btn-primary pull-right" data-toggle="collapse" data-target="#demo"><i class="fa fa-plus"></i></button>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Rayon</th>
                      <th>ID Personal</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Status</th>
                      <th>Status Guru</th>
                      <th>Photo</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($guru as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->rayon['namarayon']}}</td>
                      <td>{{$item->idpersonal}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->personal['jeniskelamin']}}</td>
                      <td>{{$item->status}}</td>
                      <td>{{$item->status}}</td>
                       <td><a href="{{asset('public/assets/foto/'.$item->personal['urlphoto'].'')}}" class="btn bg-navy btn-xs" target="_blank">{{$item->personal['urlphoto']}}</a></td>
                      <td>
                        <a href="{{ url('guru/materi',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Materi</a>
                        <a href="{{ route('guru.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ route('guru.show',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                       <!--  <button class="btn btn-xs btn-danger" onclick="del_guru({{$item->id}})">
                          <span class="glyphicon glyphicon-trash"></span> 
                        </button> -->
                      </td>
                    </tr>
                    @php $no++ @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="demo" class="collapse box box-info">
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Guru</h3>
              </div>
              <br>
              <form  action="{{route('guru.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="created" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control select2" name="idpersonal" style="width:100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="idrayon" style="width:100%;" >
                      <option value="">-- Pilih Rayon --</option>
                      @foreach($rayon as $data)
                      <option value="{{$data->idrayon}}">{{$data->namarayon}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <td>
                      <br>
                      <input type="checkbox" name="status" class="minimal" value="Pengerja"> Pengerja
                    </td>
                  </div>                   
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                </div>
              </form>    
            </div>
          </div>  
        </div>
      </div>
    </section>
  </div>
 @endsection 
 @push('scriptz')
<script type="text/javascript">
  function del_guru(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Guru ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('guru/delete')}}"+"/"+id,function(){
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