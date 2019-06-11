  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Tamu
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
               <h3 class="box-title">Detail Data Tamu</h3>
              </div>
              <br>
          
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. ID</label>
                    <input type="text" readonly="" name="idpersonal" value="{{$ptamu->idtamu}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-3 pull-right">
                  <div class="avatar-upload">
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url('{{asset('public/assets/modul/pengkhotbah/tamu/'.$ptamu->foto.'')}}');"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama (Sesuai KTP)</label>
                    <input type="text" name="nama" class="form-control" value="{{$ptamu->namalengkap}}" readonly="" required="">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="namapa" value="{{$ptamu->namapanggilan}}" readonly="" class="form-control">
                  </div>
                </div>             
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tala" class="form-control pull-right" readonly="" value="{{$ptamu->tanggallahir}}" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                     <label>Jenis Kelamin</label>
                      <input type="text" name="tala" class="form-control pull-right" readonly="" value="{{$ptamu->jeniskelamin}}" required="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" value="{{$ptamu->email}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Demonisasi</label>
                      <input type="text" name="demonisasi" class="form-control pull-right" value="{{$ptamu->demonisasi}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Institusi</label>
                    <input type="text" name="institusi" class="form-control" value="{{$ptamu->institusi}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" name="notelp" class="form-control" value="{{$ptamu->notelp}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3" readonly><?php echo($ptamu->alamat) ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control " name="keterangan" rows="3" readonly=""><?php echo($ptamu->keterangan) ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                     <input type="text" name="tala" class="form-control" readonly="" value="{{$ptamu->status}}">
                  </div>
                </div>
                 <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  