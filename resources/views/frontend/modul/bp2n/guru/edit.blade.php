@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        BP2N
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
               <h3 class="box-title">Edit Data Guru</h3>
              </div>
              <br>
              <form  action="{{route('bp2ncalonguru.update',$guru->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control select2" name="personal" style="width: 100%">
                      <option value="">=== Pilih Personal ===</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo($guru->idpersonal == $data->idpersonal) ? 'selected' : '' ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                   <label>Jenis Jebatan</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="jenis" class="minimal" value="Guru" required="" <?php echo($guru->jenis_jabatan == 'Guru') ? 'checked' : '' ?>>Guru
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="jenis" class="minimal" value="Konselor" required="" <?php echo($guru->jenis_jabatan == 'Konselor') ? 'checked' : '' ?>>Konselor
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. Sertifikat KOM 100</label>
                    <input type="hidden" name="noser" value="100">
                  </div>                  
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" name="angkatan" class="form-control" value="{{$guru->angkatan}}"  placeholder="Angkatan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{$guru->keterangan}}"  placeholder="Keterangan">
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