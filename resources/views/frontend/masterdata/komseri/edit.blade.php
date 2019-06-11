@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Master Data
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
               <h3 class="box-title">Edit Data KOM Seri</h3>
              </div>
              <br>
              <form  action="{{route('komseri.update',$komseri->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="updated" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KOM Seri</label>
                    <input type="text" name="komseri" class="form-control" value="{{$komseri->kom_seri}}" placeholder="KOM Seri">
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