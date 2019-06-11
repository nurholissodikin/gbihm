@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Kom Tugas Akhir
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
               <h3 class="box-title">Tambah Data Tugas Akhir Kom</h3>
              </div>
              <br>
              <form  action="{{route('tugas.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control select2" name="rayon" style="width: 100%;" >
                      <option value="">-- Pilih Rayon --</option>
                      @foreach($rayon as $data)
                      <option value="{{$data->idrayon}}">{{$data->namarayon}}</option>
                      @endforeach
                    </select>
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" placeholder="Angkatan">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tanggal" class="form-control pull-right" id="datepicker1" >
                    </div>
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