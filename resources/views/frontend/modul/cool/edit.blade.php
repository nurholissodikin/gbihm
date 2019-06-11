@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       COOl
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data COOl</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('cool.update',$cool->id)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" value="{{Auth::user()->id}}" name="updated">
                <div class="col-md-12"> 
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tipe COOl</label>
                      <select class="form-control select2" name="tipecool" style="width: 100%;">
                        <option value="" >=== Pilih Tipe COOl ===</option>
                        @foreach ($tipecool as $key => $value)
                        <option value="{{$value->id}}" <?php echo ($cool->idtipecool == $value->id) ? "selected" : "" ?>>{{ $value->tipecool }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Gembala</label>
                      <select class="form-control select2" name="gembala" style="width: 100%;">
                        <option value="" >=== Pilih Personal ===</option>
                        @foreach ($personal as $key => $value)
                        <option value="{{$value->idpersonal}}" <?php echo ($cool->gembala == $value->idpersonal) ? "selected" : "" ?>>{{$value->idpersonal}} || {{ $value->namalengkap }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Pengerja</label><br>
                      <input type="checkbox" name="pengerja" class="minimal" value="Pengerja" <?php echo ($cool->pengerja == 'Pengerja') ? "checked" : "" ?>> Pengerja
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jabatan Gembala COOl</label>
                      <select class="form-control select2" name="jabatan" style="width: 100%;">
                        <option value="" >=== Pilih Jabatan Gembala COOl ===</option>
                        <option value="Ka. Dept. COOL" <?php echo ($cool->jabatan == 'Ka. Dept. COOL') ? "selected" : "" ?>>Ka. Dept. COOL</option>
                        <option value="Tim Penggerak COOL" <?php echo ($cool->jabatan == 'Tim Penggerak COOL') ? "selected" : "" ?>>Tim Penggerak COOL</option>
                        <option value="Ka. Bid. COOL" <?php echo ($cool->jabatan == 'Ka. Bid. COOL') ? "selected" : "" ?>>Ka. Bid. COOL</option>
                        <option value="Koord. Wilayah COOL" <?php echo ($cool->jabatan == 'Koord. Wilayah COOL') ? "selected" : "" ?>>Koord. Wilayah COOL</option>
                        <option value="Pemilik COOL" <?php echo ($cool->jabatan == 'Pemilik COOL') ? "selected" : "" ?>>Pemilik COOL</option>
                        <option value="Gembala COOL (d/h COOLer)" <?php echo ($cool->jabatan == 'Gembala COOL (d/h COOLer)') ? "selected" : "" ?>>Gembala COOL (d/h COOLer)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Provinsi</label>
                      <select class="form-control select2" name="provinsi" id="provinces" style="width: 100%;">
                        <option value="" >=== Pilih Provinsi ===</option>
                        @foreach ($provinsi as $key => $value)
                        <option value="{{$value->id}}" <?php echo ($cool->provinsi == $value->id) ? "selected" : "" ?>>{{ $value->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kabupaten/Kota</label>
                      <select class="form-control select2" name="kabkota" id="regencies" style="width: 100%;">
                        <option value="" disable="true">=== Pilih Kabupaten/Kota ===</option>
                        @php
                          $kabupaten = app()->make('App\Http\Controllers\CountryController')->fill_kabupaten($cool->provinsi);
                        @endphp
                        @foreach($kabupaten as $data)
                         <option value="{{$data->id}}" @if($data->id == $cool->kabkota) selected  @endif> {{ $data->name }}</option>
                            
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value="{{$cool->lokasi}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Kode Pos</label>
                      <input type="number" maxlength="5" name="kodepos" class="form-control" placeholder="Kode Pos" value="{{$cool->kodepos}}">
                    </div>
                  </div>
                </div>  
                <div class="demo-button">
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
