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
               <h3 class="box-title">Edit Konseling BP2N</h3>
              </div>
              <br>
              <form  action="{{url('bp2npeserta/konseling/update',$konseling->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="peserta" value="{{$konseling->idpeserta}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" value="{{$konseling->tanggal}}" placeholder="Tanggal" class="form-control datepickerlight">
                    </div>
                  </div>                   
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" name="tempat" value="{{$konseling->tempat}}" class="form-control" placeholder="Tempat">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pejabat</label>
                    <input type="text" name="pejabat" value="{{$konseling->pejabat}}"class="form-control" placeholder="Pejabat">
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