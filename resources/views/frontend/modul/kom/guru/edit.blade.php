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
               <h3 class="box-title">Edit Data Guru</h3>
              </div>
              <br>
              <form  action="{{route('guru.update',$guru->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control select2" name="idpersonal" style="width: 100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo($guru->idpersonal == $data->idpersonal) ? "selected": "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                 <div class="form-group">
                    <label>Status</label>
                    <td>
                      <br>
                      <input type="checkbox" name="status" class="minimal" value="Pengerja" <?php echo($guru->status == 'Pengerja') ? "checked": "" ?>> Pengerja
                    </td>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="idrayon" style="width: 100%;" >
                      <option value="">-- Pilih Rayon --</option>
                      @foreach($rayon as $data)
                      <option value="{{$data->idrayon}}" <?php echo($guru->idrayon == $data->idrayon) ? "selected": "" ?>>{{$data->namarayon}}</option>
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