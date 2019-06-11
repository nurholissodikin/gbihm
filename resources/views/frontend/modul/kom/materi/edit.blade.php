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
          <div class="box box-default">
            <!-- /.box-header -->
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Edit Data Materi</h3>
              </div>
              <br>
              <form  action="{{route('materi.update',$materi->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="updated" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Materi</label>
                    <input type="text" name="kode" class="form-control" value="{{$materi->kode_materi}}"  placeholder="Kode Materi">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Materi</label>
                    <input type="text" name="materi" class="form-control" value="{{$materi->materi}}"  placeholder="Nama Materi">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KOM Seri</label>
                    <select class="form-control select2" name="kom" style="width: 100%;" >
                      <option value="">-- Pilih KOM Seri --</option>
                      <option value="100" <?php echo($materi->kom_seri == '100') ? "selected": "" ?>>100</option>
                      <option value="200" <?php echo($materi->kom_seri == '200') ? "selected": "" ?>>200</option>
                      <option value="300" <?php echo($materi->kom_seri == '300') ? "selected": "" ?>>300</option>
                      <option value="400" <?php echo($materi->kom_seri == '400') ? "selected": "" ?>>400</option>
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