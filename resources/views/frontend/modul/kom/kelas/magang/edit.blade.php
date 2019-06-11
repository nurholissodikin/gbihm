@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kom Magang
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
               <h3 class="box-title">Edit Data Magang Kom</h3>
              </div>
              <br>
              <form  action="{{route('magang.update',$magang->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="rayon" style="width: 100%;" >
                      <option value="">-- Pilih Rayon --</option>
                      @foreach($rayon as $data)
                      <option value="{{$data->idrayon}}" <?php echo ($magang->idrayon == $data->idrayon) ? "selected" :"" ?>>{{$data->namarayon}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KOM Seri</label>
                    <select class="form-control select2" name="kom" style="width: 100%;" >
                      <option value="">-- Pilih KOM Seri --</option>
                      <option value="100" <?php echo($magang->kom_seri == '100') ? "selected": "" ?>>100</option>
                      <option value="200" <?php echo($magang->kom_seri == '200') ? "selected": "" ?>>200</option>
                      <option value="300" <?php echo($magang->kom_seri == '300') ? "selected": "" ?>>300</option>
                      <option value="400" <?php echo($magang->kom_seri == '400') ? "selected": "" ?>>400</option>
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" value="{{$magang->angkatan}}">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control cobad pull-right" value="{{$magang->tanggal}}"  >
                    </div>
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
 @push('script')
<script type="text/javascript">
 $(function () {
$( ".cobad" ).datepicker({
todayHighlight: true,
autoclose: true,
});
 });
</script>
 @endpush