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
               <h3 class="box-title">Edit Data Jabatan</h3>
              </div>
              <br>
              <form  action="{{route('jabatan.update',$jabatan->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Jabatan</label>
                    <input type="text" name="kode" class="form-control" value="{{$jabatan->kode_jabatan}}" placeholder="Nama Tipe Cool">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{$jabatan->jabatan}}" placeholder="Nama Tipe Cool">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;" required="">
                      <option value="">-- Pilih Status --</option>
                      <option value="Aktif" <?php echo($jabatan->active == 'Aktif') ? "selected": "" ?>>Aktif</option>
                      <option value="Non Aktif" <?php echo($jabatan->active == 'Non Aktif') ? "selected": "" ?>>Non Aktif</option>
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