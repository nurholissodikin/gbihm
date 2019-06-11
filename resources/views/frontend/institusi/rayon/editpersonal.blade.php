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
              <h3 class="box-title">Data Subrayon Personal</h3>
            </div>
            <div class="box-body">
              <form  action="{{url('rayon/personal/upd/'.$personal->idpersonal)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @foreach($anggota as $data)
                <input type="hidden" name="idrayon" value="{{$data->idrayon}}">
                @endforeach
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation" class="active"><a href="#rayon" data-toggle="tab">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>
                 <li role="presentation"><a href="{{route('cabang.index')}}">Rayon</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="subrayon"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Edit Data Subrayon Personal</h3>
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="{{$personal->namalengkap}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="jk" value="L" required="" <?php echo ($personal->jeniskelamin == "L") ? "checked": "" ?>>
                            </span>
                              <input type="text" class="form-control" placeholder="Laki-Laki" disabled="">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label><br></label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <input type="radio" name="jk" value="P" required="" <?php echo ($personal->jeniskelamin == "P") ? "checked": "" ?>>
                          </span>
                          <input type="text" class="form-control" placeholder="Perempuan" disabled="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="number" name="nohp" class="form-control" placeholder="No. HP" value="{{$personal->nohp}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat">
                           <?php echo ($personal->alamattinggal); ?>
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Gereja Asal</label>
                          <input type="text" name="gereja" class="form-control" placeholder="Gereja Asal" value="{{$personal->gerejaasal}}">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Email" value="{{$personal->email}}">
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
