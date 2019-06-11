@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Pengajar KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Edit Pengajar KOM</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <form  action="{{url('materipengajar/update',$materiguru->id)}}" enctype="multipart/form-data" method="post">
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="updated" value="{{Auth::user()->id}}">
                  <input type="hidden" name="idmateri" value="{{$materiguru->idmateri}}">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pengajar</label>
                      <select name="guru" class="form-control select2" style="width: 100%"> 
                        <option value="">=== Pilih Pengajar ===</option>
                        @foreach($guru as $data)
                        <option value="{{$data->id}}" <?php echo ($materiguru->idguru == $data->id) ? "selected" : "" ?>>{{$data->personal['namalengkap']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                    </div>
                  </div>
                </form>  
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
  function del_mape(id){
    swal({
      title: "Apakah Anda Ingin Menghapus Pengajar ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((oke) => {
      if (oke) {
        $.get("{{url('materipengajar/delete')}}"+"/"+id,function(){
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