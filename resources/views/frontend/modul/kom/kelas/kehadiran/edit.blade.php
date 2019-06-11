@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kom Kehadiran
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
               <h3 class="box-title">Edit Data Kehadiran Kom</h3>
              </div>
              <br>
              <form  action="{{route('komkehadiran.update',$komke->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="{{$komke->idkelaskom}}">
                <input type="hidden" name="updated" value="{{Auth::User()->id}}">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control datepickerlight pull-right" value="{{$komke->tgl}}"  >
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jam</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" name="jam" class="form-control timepicker pull-right" value="{{$komke->jam}}">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Materi</label>
                    <select class="form-control select2" name="materi" style="width: 100%;" >
                      <option value="">-- Pilih Materi --</option>
                      @foreach($materi as $data)
                      <option value="{{$data->id}}" <?php echo ($komke->idmateri == $data->id) ? "selected" :"" ?>>{{$data->materi}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Guru</label>
                    <select class="form-control select2" name="guru" style="width: 100%;" >
                      <option value="">-- Pilih Guru --</option>
                      @foreach($guru as $data)
                      <option value="{{$data->id}}" <?php echo ($komke->idguru == $data->id) ? "selected" :"" ?>>{{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Persembahan</label>
                    <input type="text" name="persembahan" class="form-control" value="{{$komke->persembahan}}">
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