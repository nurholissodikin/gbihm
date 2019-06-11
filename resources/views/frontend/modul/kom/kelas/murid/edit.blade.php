@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Murid KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          
          <div class="box box-default">
             <div class="box-body">
              <div class="box-header with-border">
               <h3 class="box-title">Edit Murid KOM</h3>
              </div>
              <br>
               <form  action="{{url('kelaskommurid/update',$murid->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="updated" value="{{Auth::user()->id}}">
                <input type="hidden" name="idkelaskom" value="{{$murid->idkelaskom}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                      <select class="form-control select2" name="idpersonal" style="width: 100%;" >
                        <option value="">-- Pilih Personal --</option>
                        @foreach($personal as $data)
                        <option value="{{$data->idpersonal}}" <?php echo($murid->idpersonal == $data->idpersonal ) ? "selected" : "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                        @endforeach
                      </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                     <label>Status</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="status" class="minimal" value="Aktif" <?php echo ($murid->status == "Aktif") ? "checked": "" ?>>Aktif
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status" class="minimal" value="Non Aktif"  <?php echo ($murid->status == "Non Aktif") ? "checked": "" ?>>
                      Non Aktif
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                     <label>Status Baptis</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Selam"  <?php echo ($murid->status_baptisan == "Selam") ? "checked": "" ?>>Selam
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Percik"  <?php echo ($murid->status_baptisan == "Percik") ? "checked": "" ?>>
                      Percik
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="status_baptisan" class="minimal" value="Belum Baptis"  <?php echo ($murid->status_baptisan == "Belum Baptis") ? "checked": "" ?>>
                      Belum Baptis
                      <br>
                    </label>
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