@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Anggota COOL - <b>{{$cool->personal['namalengkap']}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Tambah Data Anggota COOL</h3>
              </div>
              <br>
              <form  action="{{ url('anggota/store') }}" enctype="multipart/form-data" method="post">
              {{csrf_field()}}
                <input type="hidden" name="idcool" value="{{$cool->id}}">
                <input type="hidden" name="created" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select name="personal" class="form-control select2" style="width: 100%">
                      <option value="">=== Pilih Personal ===</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}">{{$data->idpersonal}} || {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan Anggota COOL</label>
                    <select name="jabatan" class="form-control select2" style="width: 100%">
                      <option value="">=== Pilih Jabatan Anggota COOL ===</option>
                      <option value="Istri/Suami Ka. Dept. COOL">Istri/Suami Ka. Dept. COOL</option>
                      <option value="Istri/Suami Ka. Bid. COOL">Istri/Suami Ka. Bid. COOL</option>
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Anggota COOL</label>
                    <br>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="Non GBI"> Non GBI
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="GBI"> GBI
                    </label>
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
              <h3 class="box-title">List Anggota COOL</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Anggota</th>
                      <th>Jabatan Anggota</th>
                      <th>Kategori Anggota</th>
                      <th>Tanggal Lahir</th>
                      <th>No.HP</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($anggota as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->idpersonal}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->jabatan_anggota}}</td>
                      <td>{{$item->kategori}}</td>
                      <td>{{$item->personal['tanggallahir']}}</td>
                      <td>{{$item->personal['nohp']}}</td>
                      <td>{{$item->personal['email']}}</td>
                      <td>
                        <!--  -->
                        <a href="{{ url('cool/anggota/edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="{{ url('cool/anggota/detail',$item->id)}}" type="submit" class="btn btn-block-small btn-info btn-xs"><i class="fa fa-eye"></i></a>
                        <button class="btn btn-xs btn-danger" onclick="del_anggota({{$item->id}})">
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
  function del_anggota(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Data COOL ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('anggota/delete')}}"+"/"+id,function(){
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