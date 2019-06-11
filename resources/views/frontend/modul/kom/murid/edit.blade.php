@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        KOm
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
               <h3 class="box-title">Edit Data Murid</h3>
              </div>
              <br>
              <form  action="{{route('murid.update',$murid->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Peserta</label>
                    <td>
                      <br>
                      <input type="checkbox" name="kategori[]" class="minimal" value="Pra Nikah" 
                      <?php If (in_array("Pra Nikah", $murid->kategori_peserta))
                            { echo "checked"; } 
                      ?> > Pra Nikah
                    </td>
                    <td>
                      <input type="checkbox" name="kategori[]" class="minimal" value="Pasca Nikah" 
                      <?php If (in_array("Pasca Nikah", $murid->kategori_peserta))
                            { echo "checked"; } 
                      ?>> Pasca Nikah
                    </td>
                  </div>                   
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select class="form-control select2" name="idpersonal" style="width: 100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo($murid->idpersonal == $data->idpersonal) ? "selected": "" ?>>{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control select2" name="kkmta" style="width: 100%;" >
                      <option value="">-- Pilih Personal --</option>
                      @foreach($kkmta as $data)
                      <option value="{{$data->id}}" <?php echo($murid->id == $data->id) ? "selected": "" ?>>{{$data->id}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" value="{{$murid->angkatan}}">
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