@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        MAster Data
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
               <h3 class="box-title">Edit Data Jenis Pekerjaan</h3>
              </div>
              <br>
              <form  action="{{route('jenispekerjaan.update',$jenispekerjaan->idjenispekerjaan)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis Pekerjaan</label>
                    <input type="text" name="nama" class="form-control" value="{{$jenispekerjaan->jenispekerjaan}}" placeholder="Nama bidang pekerjaan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;" required="">
                      <option value="">-- Pilih Status --</option>
                      <option value="Aktif" <?php echo($jenispekerjaan->active == 'Aktif') ? "selected": "" ?>>Aktif</option>
                      <option value="Non Aktif" <?php echo($jenispekerjaan->active == 'Non Aktif') ? "selected": "" ?>>Non Aktif</option>
                    </select>
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