@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        BP2N
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
               <h3 class="box-title">Tambah Data Materi</h3>
              </div>
              <br>
              <form  action="{{route('bp2nmateri.store')}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kode Materi</label>
                    <input type="text" name="kode" class="form-control"  placeholder="Kode Materi">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Modul</label>
                    <input type="text" name="modul" class="form-control"  placeholder="Nama Modul">
                  </div>                  
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Materi</label>
                    <input type="text" name="materi" class="form-control"  placeholder="Nama Materi">
                  </div>                  
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                   <label>Pilih Kategori</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="Peserta" required="">Peserta
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="kategori" class="minimal" value="Guru" required="">
                    Guru
                    </label>
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