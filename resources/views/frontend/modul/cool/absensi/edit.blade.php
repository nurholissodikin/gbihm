@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Edit Absensi COOL
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Edit Data Absensi COOL</h3>
              </div>
              <br>
              <form  action="{{ url('data/absensi/update',$absensi->id) }}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idcool" value="{{$absensi->idcool}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                      <input type="text" name="tanggal" class="form-control datepickerlight" value="{{$absensi->tanggal}}">
                    </div>
                  </div>
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Gemabala</label>
                    <select class="form-control select2" required="" id="idcool" name="idcool" style="width: 100%">
                      <option value="">== Pilih Gembala ==</option>
                      @foreach($cool as $data)
                      <option value="{{$data->id}}" <?php echo ($absensi->idcool == $data->id) ? "selected" : "" ?>>{{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" readonly="" id="lokasi" class="form-control" placeholder="Lokasi">
                  </div>                  
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis COOL</label>
                    <input type="text" name="aa" readonly="" id="tipecool" class="form-control" placeholder="Jenis COOL">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kubu Doa</label>
                    <input type="number" name="kubu_doa" class="form-control" value="{{$absensi->kubu_doa}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jemaat Yang Hadir</label>
                    <input type="number" name="jemaat" class="form-control" value="{{$absensi->jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Non Jemaat Yang Hadir</label>
                    <input type="number" name="non_jemaat" class="form-control" value="{{$absensi->non_jemaat}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="number" name="persembahan" class="form-control" value="{{$absensi->persembahan}}">
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
        </div>
      </div>
    </section>
  </div>
 @endsection 
 @push('scriptz')
<script type="text/javascript">
  $(document).ready(function(){
    $("#idcool").select2().on("change", function (e) {
      var id = e.currentTarget.value;
      if (id != null) {
      $.get("{{url('get/cool')}}"+"/"+id,function(value){
        $('#lokasi').val(value.lokasi);
        $('#tipecool').val(value.tipecool);
      });
    }else if(id == null){
        $('#lokasi').val(null);
        $('#tipecool').val(null);
    }
    });
  });
</script>
@endpush 
