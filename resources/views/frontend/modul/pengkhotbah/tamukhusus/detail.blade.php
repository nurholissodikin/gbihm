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
               <h3 class="box-title">Detail Data Tamu Khusus</h3>
              </div>
              <br>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>No. ID</label>
                    <input type="text" readonly="" name="idpersonal" value="{{$tamukhusus->idpersonal}}" class="form-control">
                  </div>
                </div>
                <div class="col-md-3 pull-right">
                  <div class="avatar-upload">
                    <div class="avatar-preview">
                      <div id="imagePreview" style="background-image: url('{{asset('public/assets/modul/pengkhotbah/tamukhusus/'.$tamukhusus->foto.'')}}');"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama (Sesuai KTP)</label>
                    <input type="text" name="nama" class="form-control" value="{{$tamukhusus->namalengkap}}" readonly="">
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nama Panggilan</label>
                    <input type="text" name="namapa" value="{{$tamukhusus->namapanggilan}}" readonly="" class="form-control">
                  </div>
                </div>             
                 <div class="col-md-9">
                  <div class="form-group">
                    <label>NIK (No. KTP)</label><br><small>* Jika tidak ada NIK, No. ID lain (Pasport, K.Pelajar / dsb)</small>
                    <textarea class="form-control" name="nik" rows="3" readonly="">{{$tamukhusus->nik}}</textarea>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                     <label>Jenis Kelamin</label><br>
                      <input type="text" name="jk" class="form-control" value="{{$tamukhusus->jeniskelamin}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tala" class="form-control " readonly="" value="{{$tamukhusus->tanggallahir}}" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" name="email" class="form-control pull-right" value="{{$tamukhusus->email}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pilih Jabatan</label>
                    <input type="text" name="jabatan" class="form-control pull-right" value="{{$tamukhusus->jabatan}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Gereja / Organisasi</label>
                    <input type="text" name="gereja" class="form-control" value="{{$tamukhusus->gereja}}"  readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Mengetahui</label>
                    <select class="form-control select2" disabled="" name="mengetahui" style="width: 100%" readonly>
                      <option value="" readonly></option>
                      @foreach($gembala as $data)
                      <option value="{{$data->id}}" <?php echo($tamukhusus->mengetahui == $data->id) ? "selected" : "" ?>>{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Menyutujui</label>
                    <select class="form-control select2" disabled="" name="menyutujui" style="width: 100%" readonly>
                      <option value="" readonly></option>
                      @foreach($kadiv as $data)
                      <option value="{{$data->id}}" <?php echo($tamukhusus->menyutujui == $data->id) ? "selected" : "" ?>>{{$data->personal['idpersonal']}} || {{$data->personal['namalengkap']}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Jenis Badge</label>
                     <input type="text" name="mengetahui" class="form-control pull-right" value="{{$tamukhusus->jenisbadge}}" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                     <input type="text" name="mengetahui" class="form-control " value="{{$tamukhusus->status}}" readonly="">
                  </div>
                </div>
                <div class="demo-button">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect" value="BACK" onClick="history.go(-1)">Kembali</button>
                </div> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  