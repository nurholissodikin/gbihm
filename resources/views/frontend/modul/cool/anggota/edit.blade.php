@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Edit Anggota COOL - <b>{{$anggota->personal['namalengkap']}}</b>
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
               <h3 class="box-title">Edit Anggota COOL</h3>
              </div>
              <br>
              <form  action="{{ url('anggota/update',$anggota->id) }}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idcool" value="{{$anggota->idcool}}">
                 <input type="hidden" name="updated" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Personal</label>
                    <select name="personal" class="form-control select2" style="width: 100%">
                      <option value="">=== Pilih Personal ===</option>
                      @foreach($personal as $data)
                      <option value="{{$data->idpersonal}}" <?php echo ($anggota->idpersonal == $data->idpersonal) ? "selected" : "" ?>>{{$data->idpersonal}} || {{$data->namalengkap}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jabatan Anggota COOL</label>
                    <select name="jabatan" class="form-control select2" style="width: 100%">
                      <option value="">=== Pilih Jabatan Anggota COOL ===</option>
                      <option value="Istri/Suami Ka. Dept. COOL" <?php echo ($anggota->jabatan_anggota == "Istri/Suami Ka. Dept. COOL") ? "selected" : "" ?>>Istri/Suami Ka. Dept. COOL</option>
                      <option value="Istri/Suami Ka. Bid. COOL" <?php echo ($anggota->jabatan_anggota == "Istri/Suami Ka. Bid. COOL") ? "selected" : "" ?>>Istri/Suami Ka. Bid. COOL</option>
                    </select>
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Anggota COOL</label>
                    <br>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="Non GBI"  <?php echo ($anggota->kategori == "Non GBI") ? "checked": "" ?>> Non GBI
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="GBI" <?php echo ($anggota->kategori == "GBI") ? "checked": "" ?>> GBI
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="demo-button"><br>
                    <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                  </div>
                </div>
              </form>    
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 