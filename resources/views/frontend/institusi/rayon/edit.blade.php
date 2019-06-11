@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Institusi Struktural
      </h1>
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
              <h3 class="box-title">Data Rayon</h3>
            </div>
            <div class="box-body">
              <form action="{{route('rayon.update',$rayon->idrayon)}}" method="POST" >
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation" class="active"><a href="#rayon" data-toggle="tab">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>
                 <li role="presentation"><a href="{{route('cabang.index')}}">Rayon</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="rayon"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Edit Data Rayon</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wilayah</label>
                            <select class="form-control select2" name="wilayahr" style="width: 100%;">
                              <option value="">-- Pilih Wilayah --</option>
                              <option value="PUSAT" <?php echo ($rayon->wilayah == 'PUSAT') ? "selected": "" ?>>PUSAT</option>
                              <option value="DKI" <?php echo ($rayon->wilayah == 'DKI') ? "selected": "" ?>>DKI</option>
                              <option value="BODETABEK" <?php echo ($rayon->wilayah == 'BODETABEK') ? "selected": "" ?>>BODETABEK</option>
                              <option value="NON JABODETABEK" <?php echo ($rayon->wilayah == 'NON JABODETABEK') ? "selected": "" ?>>NON JABODETABEK</option>
                              <option value="LUAR NEGERI" <?php echo ($rayon->wilayah == 'LUAR NEGERI') ? "selected": "" ?>>LUAR NEGERI</option>
                              <option value="CK" <?php echo ($rayon->wilayah == 'CK') ? "selected": "" ?>>CK</option>
                              <option value="TRANSISI" <?php echo ($rayon->wilayah == 'TRANSISI') ? "selected": "" ?>>TRANSISI</option>
                              <option value="SISTER CHURCH" <?php echo ($rayon->wilayah == 'SISTER CHURCH') ? "selected": "" ?>>SISTER CHURCH</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Rayon</label>
                            <input type="text" name="koder" class="form-control" placeholder="Kode Rayon" value="{{$rayon->koderayon}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Rayon</label>
                            <input type="text" name="namar" class="form-control" placeholder="Nama Rayon" value="{{$rayon->namarayon}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Pemimpin</label>
                            <select class="form-control select2" name="pemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $data)
                              <option value="{{$data->idpersonal}}" <?php echo ($rayon->pemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wakil Pemimpin</label>
                            <select class="form-control select2" name="wakilpemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $data)
                              <option value="{{$data->idpersonal}}" <?php echo ($rayon->wakilpemimpin == $data->idpersonal) ? "selected": "" ?>>{{ $data->idpersonal }} | {{ $data->namalengkap }}</option>
                             @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Ref</label>
                            <input type="text" name="noref" class="form-control" placeholder="No. Ref" value="{{$rayon->noref}}" >
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="ketr" class="form-control" placeholder="Keterangan" value="{{$rayon->keterangan}}">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="statusr" style="width: 100%;" value="{{$rayon->active}}">
                              <option value="" >-- Pilih Status --</option>
                              <option value="Aktif" <?php echo ($rayon->active == 'Aktif') ? "selected":"" ?>>Aktif</option>
                            </select>
                          </div>
                        </div>
                        <div class="demo-button">
                          <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                        </div>
                    </div>
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
