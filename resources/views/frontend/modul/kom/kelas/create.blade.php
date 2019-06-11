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
               <h3 class="box-title">Tambah Angkatan KOM</h3>
              </div>
              <br>
              <form  action="{{route('kelaskom.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <input type="hidden" name="created" value="{{Auth::user()->id}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="rayon" style="width: 100%">
                      <option value="">== Pilih Rayon ==</option>
                      @foreach($rayon as $data)
                      <option value="{{$data->idrayon}}">{{$data->namarayon}}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label>KOM Seri</label>
                    <select class="form-control select2" name="kom_seri" style="width: 100%" >
                      <option value="">-- Pilih KOM Seri --</option>
                      <option value="100" >100</option>
                      <option value="200" >200</option>
                      <option value="300" >300</option>
                      <option value="400" >400</option>
                    </select>
                  </div>                  
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control"  placeholder="Angkatan" autocomplete="off">
                  </div>                  
                </div>
                 <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal Mulai Kelas</label>
                    <input type="text" name="tgl_mulai" class="form-control datepickerlight" autocomplete="off"  placeholder="Tanggal Mulai Kelas">
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Periode Mulai</label>
                    <input type="text" name="mulai" class="form-control datepickerlight" autocomplete="off"  placeholder="Mulai" >
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Sampai</label>
                    <input type="text" name="akhir" class="form-control datepickerlight" autocomplete="off"  placeholder="Sampai">
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