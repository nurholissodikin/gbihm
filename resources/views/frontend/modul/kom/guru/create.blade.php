  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kom
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
               <h3 class="box-title">Tambah Data Guru</h3>
              </div>
              <br>
              <form  action="{{route('guru.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control select2" name="idpersonal" style="width:100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <td>
                      <br>
                      <input type="radio" name="status" class="minimal" value="Pengerja"> Pengerja
                    </td>
                    <td>
                      <input type="radio" name="status" class="minimal" value="Personal"> Personal
                    </td>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Materi</label>
                    <input type="text" name="materi" class="form-control"  placeholder="Nama Materi">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KOM Seri</label>
                    <select class="form-control select2" name="kom" style="width: 100%;" >
                      <option value="">-- Pilih KOM Seri --</option>
                      <option value="100" >100</option>
                      <option value="200" >200</option>
                      <option value="300" >300</option>
                      <option value="400" >400</option>
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