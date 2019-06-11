@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kom LKP
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
               <h3 class="box-title">Edit Data LKP Kom</h3>
              </div>
              <br>
              <form  action="{{route('komlkp.update',$komlkp->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{$komlkp->idkelaskom}}">
                <input type="hidden" name="updated" value="{{Auth::User()->id}}">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Materi</label>
                      <select class="form-control select2" name="materi" style="width: 100%;" >
                        <option value="">-- Pilih Materi --</option>
                        @foreach($materi as $data)
                        <option value="{{$data->id}}" <?php echo($data->id == $komlkp->idmateri) ? "selected" : "" ?>>{{$data->materi}}</option>
                        @endforeach
                      </select>
                    </div>                  
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control datepickerlight pull-right" value="{{$komlkp->tanggal}}"  >
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
