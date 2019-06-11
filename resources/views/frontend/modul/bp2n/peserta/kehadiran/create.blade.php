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
               <h3 class="box-title">Tambah Kehadiran Peserta BP2N</h3>
              </div>
              <br>
              <form  action="{{url('bp2npeserta/kehadiran/store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="peserta" value="{{$peserta->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" placeholder="Tanggal" class="form-control datepickerlight">
                    </div>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Materi</label>
                    <select class="form-control select2" name="materi" style="width: 100%">
                      <option value=""> Pilih Materi</option>
                      @foreach($materi as $data)
                      <option value="{{$data->id}}">{{$data->materi}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Guru</label>
                    <select class="form-control select2" name="guru" required="" style="width: 100%">
                      <option value=""> Pilih Guru</option>
                      @foreach($guru as $data)
                      <option value="{{$data->id}}">{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
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