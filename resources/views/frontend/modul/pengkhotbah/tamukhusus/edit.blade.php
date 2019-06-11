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
               <h3 class="box-title">Edit Data Tamu Khusus</h3>
              </div>
              <br>
              <form  action="{{url('tamukhusus/update',$tamukhusus->idtamukhusus)}}" enctype="multipart/form-data" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. ID</label>
                    <input type="text" readonly="" name="idpersonal" value="{{$tamukhusus->idpersonal}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-3 pull-right">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="urlphoto" />
                      <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url('{{asset('public/assets/modul/pengkhotbah/tamukhusus/'.$tamukhusus->foto.'')}}');"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama (Sesuai KTP)</label>
                    <input type="text" name="nama" class="form-control" value="{{$tamukhusus->namalengkap}}" placeholder="Nama (Sesuai KTP)" required="">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="namapa" value="{{$tamukhusus->namapanggilan}}" placeholder="Nama Panggilan" class="form-control">
                  </div>
                </div>             
                 <div class="col-md-9">
                  <div class="form-group">
                    <label>NIK (No. KTP)</label><br><small>* Jika tidak ada NIK, No. ID lain (Pasport, K.Pelajar / dsb)</small>
                    <textarea class="form-control" name="nik" rows="3">{{$tamukhusus->nik}}</textarea>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                     <label>Jenis Kelamin</label><br>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="L" required="" <?php echo($tamukhusus->jeniskelamin == 'L') ? "checked" : "" ?>>Laki-Laki
                    </label>
                    <label class="col-sm-3">
                      <input type="radio" name="jk" class="minimal" value="P" required="" <?php echo($tamukhusus->jeniskelamin == 'P') ? "checked" : "" ?>>
                      Perempuan
                    </label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tala" class="form-control datepicker pull-right" placeholder="Tanggal Lahir" value="{{$tamukhusus->tanggallahir}}" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" value="{{$tamukhusus->email}}" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pilih Jabatan</label>
                    <select class="form-control select2" name="jabatan" style="width: 100%">
                      <option value="">== Pilih Jabatan ==</option>
                      <option value="Pdt." <?php echo($tamukhusus->jabatan == 'Pdt.') ? "selected" : "" ?>>Pdt.</option>
                      <option value="Pdm." <?php echo($tamukhusus->jabatan == 'Pdm.') ? "selected" : "" ?>>Pdm.</option>
                      <option value="Pdp." <?php echo($tamukhusus->jabatan == 'Pdp.') ? "selected" : "" ?>>Pdp.</option>
                      <option value="Ka. Divisi" <?php echo($tamukhusus->jabatan == 'Ka. Divisi') ? "selected" : "" ?>>Ka. Divisi</option>
                      <option value="Istri Ka. Divisi" <?php echo($tamukhusus->jabatan == 'Istri Ka. Divisi') ? "selected" : "" ?>>Istri Ka. Divisi</option>
                      <option value="Wkl. Ka. Divisi" <?php echo($tamukhusus->jabatan == 'Wkl. Ka. Divisi') ? "selected" : "" ?>>Wkl. Ka. Divisi</option>
                      <option value="Istri/Suami Wkl. Ka. Divisi" <?php echo($tamukhusus->jabatan == 'Istri/Suami Wkl. Ka. Divisi') ? "selected" : "" ?>>Istri/Suami Wkl. Ka. Divisi</option>
                      <option value="Ka. Sub Divisi" <?php echo($tamukhusus->jabatan== 'Ka. Sub Divisi') ? "selected" : "" ?>>Ka. Sub Divisi</option>
                      <option value="Istri/Suami Ka. Sub Divisi" <?php echo($tamukhusus->jabatan == 'Istri/Suami Ka. Sub Divisi') ? "selected" : "" ?>>Istri/Suami Ka. Sub Divisi</option>
                      <option value="Staf Ahli Penggembalaan" <?php echo($tamukhusus->jabatan == 'Staf Ahli Penggembalaan') ? "selected" : "" ?>>Staf Ahli Penggembalaan</option>
                      <option value="Istri/Suami Staf Ahli Penggembalaan" <?php echo($tamukhusus->jabatan == 'Istri/Suami Staf Ahli Penggembalaan') ? "selected" : "" ?>>Istri/Suami Staf Ahli Penggembalaan</option>
                      <option value="Wkl. Ka. Sub Divisi" <?php echo($tamukhusus->jabatan == 'Wkl. Ka. Sub Divisi') ? "selected" : "" ?>>Wkl. Ka. Sub Divisi</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gereja / Organisasi</label>
                    <input type="text" name="gereja" class="form-control" value="{{$tamukhusus->gereja}}"  placeholder="Gereja / Organisasi">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mengetahui</label>
                    <select class="form-control select2" name="mengetahui" style="width: 100%">
                      <option value="">== Pilih Pemimpin / Gembala ==</option>
                      @foreach($gembala as $data)
                      <option value="{{$data->id}}" <?php echo($tamukhusus->mengetahui == $data->id) ? "selected" : "" ?>>{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Menyutujui</label>
                    <select class="form-control select2" name="menyutujui" style="width: 100%">
                      <option value="">== Pilih Ka Divisi. ==</option>
                      @foreach($kadiv as $data)
                      <option value="{{$data->id}}" <?php echo($tamukhusus->menyutujui == $data->id) ? "selected" : "" ?>>{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis Badge</label>
                    <select class="form-control select2" name="jenis" style="width: 100%;">
                      <option value="">== Pilih Jenis Badge ==</option>
                      <option value="Hitam" <?php echo($tamukhusus->jenisbadge == 'Hitam') ? "selected" : "" ?>>Hitam</option>
                      <option value="Kuning" <?php echo($tamukhusus->jenisbadge == 'Kuning') ? "selected" : "" ?>>Kuning</option>
                      <option value="Tamu" <?php echo($tamukhusus->jenisbadge == 'Tamu') ? "selected" : "" ?>>Tamu</option>
                      <option value="Tamu Khusus" <?php echo($tamukhusus->jenisbadge == 'Tamu Khusus') ? "selected" : "" ?>>Tamu Khusus</option>
                      <option value="Anak Anggota CT 20" <?php echo($tamukhusus->jenisbadge == 'Anak Anggota CT 20') ? "selected" : "" ?>>Anak Anggota CT 20</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2" name="status" style="width: 100%;">
                      <option value="">== Pilih Status ==</option>
                      <option value="Aktif" <?php echo($tamukhusus->status == 'Aktif') ? "selected" : "" ?>>Aktif</option>
                      <option value="Non Aktif" <?php echo($tamukhusus->status == 'Non Aktif') ? "selected" : "" ?>>Non Aktif</option>
                      <option value="Belum Disetujui" <?php echo($tamukhusus->status == 'Belum Disetujui') ? "selected" : "" ?>>Belum Disetujui</option>
                    </select>
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