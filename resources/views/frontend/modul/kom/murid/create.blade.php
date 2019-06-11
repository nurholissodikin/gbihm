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
               <h3 class="box-title">Create Data Murid</h3>
              </div>
              <br>
              <form  action="{{route('murid.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Peserta</label>
                    <td>
                      <br>
                    <input type="checkbox" name="kategori[]" class="minimal" value="Pra Nikah"> Pra Nikah
                    </td>
                    <td>
                     
                    <input type="checkbox" name="kategori[]" class="minimal" value="Pasca Nikah"> Pasca Nikah
                    </td>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <div class="input-group date">
                      <select class="form-control select2" name="idpersonal" style="width: 100%;" >
                        <option value="">-- Pilih Personal --</option>
                        @foreach($personal as $data)
                        <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                        @endforeach
                      </select>
                      <div class="input-group-addon">
                        <a href="{{url('/create')}}" target="_blank" class="btn btn-primary pull-right btn-xs" ><i class="fa fa-plus"> Personal</i></a>
                      </div>
                      
                    </div>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control select2" name="kkmta" style="width: 100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($kkmta as $data)
                      <option value="{{$data->id}}">{{$data->id}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control">
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