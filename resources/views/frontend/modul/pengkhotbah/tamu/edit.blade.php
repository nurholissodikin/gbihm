  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Tamu Khusus
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
               <h3 class="box-title">Tambah Data Tamu Khusus</h3>
              </div>
              <br>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form  action="{{url('tamu/update',$ptamu->idtamu)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. ID</label>
                    <input type="text" readonly="" name="idpersonal" value="{{$ptamu->idtamu}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-3 pull-right">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="urlphoto" />
                      <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url('{{asset('public/assets/modul/pengkhotbah/tamu/'.$ptamu->foto.'')}}');"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama (Sesuai KTP)</label>
                    <input type="text" name="nama" class="form-control" value="{{$ptamu->namalengkap}}" placeholder="Nama (Sesuai KTP)" required="">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="namapa" value="{{$ptamu->namapanggilan}}" placeholder="Nama Panggilan" class="form-control">
                  </div>
                </div>             
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tala" class="form-control datepicker pull-right" placeholder="Tanggal Lahir" value="{{$ptamu->tanggallahir}}" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                     <label>Jenis Kelamin</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="L" required="" <?php echo($ptamu->jeniskelamin == 'L') ? "checked" : "" ?>>Laki-Laki
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="P" required="" <?php echo($ptamu->jeniskelamin== 'P') ? "checked" : "" ?>>
                      Perempuan
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" value="{{$ptamu->email}}" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Demonisasi</label>
                      <input type="text" name="demonisasi" class="form-control pull-right" value="{{$ptamu->demonisasi}}" placeholder="Demonisasi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Institusi</label>
                    <input type="text" name="institusi" class="form-control" value="{{$ptamu->institusi}}" placeholder="Nama Institusi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" name="notelp" class="form-control" value="{{$ptamu->notelp}}" placeholder="No. Telp">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="3"><?php echo($ptamu->alamat) ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control " name="keterangan" rows="3"><?php echo($ptamu->keterangan) ?></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;">
                      <option value="">== Pilih Status ==</option>
                      <option value="Aktif" <?php echo($ptamu->status == 'Aktif') ? "selected" : "" ?>>Aktif</option>
                      <option value="Non Aktif" <?php echo($ptamu->status == 'Non Aktif') ? "selected" : "" ?>>Non Aktif</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="jenis" class="form-control" value="Tamu">
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