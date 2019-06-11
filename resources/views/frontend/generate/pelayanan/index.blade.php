@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1 class="pull-left">
        Isi Data
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pelayan</h3>
        </div>
        <div class="box-body">
          <form action="{{url('verifikasi/pelayan')}}" method="post">
          <input type="hidden" name="user" value="{{Auth::user()->id}}">
          {{ csrf_field() }} 
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="namalengkap" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Nohp</label>
                <input type="number" name="nohp" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="message-text" class="form-control-label">Form</label>
                <select class="form-control select2" name="form" style="width: 100%">
                  <option value="PENGERJA">PENGERJA</option>
                  <option value="COOL">COOL</option>
                  <option value="TAMU">TAMU</option>
                </select>
              </div>
            </div>
            <div class="demo-button">
              <button type="submit" class="btn btn-block btn-primary  waves-effect" >Save</button>
            </div>
          </form>  
        </div>  
      </div>
    </section>
    
  </div>
@endsection



