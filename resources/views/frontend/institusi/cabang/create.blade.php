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
              <h3 class="box-title">Data Cabang</h3>
            </div>
            <div class="box-body">
              <form  action="{{route('cabang.store')}}" enctype="multipart/form-data" method="post" id="formcab">
                {{csrf_field()}}
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation"><a href="{{route('rayon.index')}}">Rayon</a></li>
                 <li role="presentation"><a href="{{route('subrayon.index')}}">Sub Rayon</a></li>            
                 <li role="presentation" class="active"><a href="cabang" data-toggle="tab" >Cabang</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="cabang"> 
                    <br>
                    <div class="box-header with-border">
                     <h3 class="box-title">Tambah Data Cabang</h3>
                    </div>
                    <br>
                    <div class="col-md-12"> 
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wilayah</label>
                            <select class="form-control select2" name="wilayah" style="width: 100%;">
                              <option value="">-- Pilih Wilayah --</option>
                              <option value="PUSAT">PUSAT</option>
                              <option value="DKI">DKI</option>
                              <option value="BODETABEK">BODETABEK</option>
                              <option value="NON JABODETABEK">NON JABODETABEK</option>
                              <option value="LUAR NEGERI">LUAR NEGERI</option>
                              <option value="CK">CK</option>
                              <option value="TRANSISI">TRANSISI</option>
                              <option value="SISTER CHURCH">SISTER CHURCH</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Rayon</label>
                             <select class="form-control select2" name="idrayon" id="rayon2" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Rayon ===</option>
                                @foreach ($rayon as $key => $value)
                              <option value="{{$value->idrayon}}">{{ $value->namarayon }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Sub Rayon</label>
                             <select class="form-control select2" name="idsubrayon" id="subrayon2" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Subrayon ===</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Cabang</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode Cabang" required="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Nama Cabang</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Cabang" required="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Pemimpin</label>
                            <select class="form-control select2" name="pemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $key => $value)
                              <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Wakil Pemimpin</label>
                            <select class="form-control select2" name="wakilpemimpin" style="width: 100%;">
                              <option value="">-- Pilih Pemimpin --</option>
                              @foreach ($personal as $key => $value)
                              <option value="{{$value->idpersonal}}" >{{ $value->idpersonal }} | {{ $value->namalengkap }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                         <div class="form-group">
                           <label>Jenis Cabang</label>
                           <select class="form-control select2" name="jeniscabang" style="width: 100%;">
                            <option value="">-- Jenis Cabang --</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Cabang Otonom">Cabang Otonom</option>
                            <option value="Cabang Otonom DKI">Cabang Otonom DKI</option>
                            <option value="Gereja Induk">Gereja Induk</option>
                            <option value="Gereja Induk Rayon">Gereja Induk Rayon</option>
                            <option value="Gereja Induk Sub Rayon">Gereja Induk Sub Rayon</option>
                            <option value="Jemaat Induk">Jemaat Induk</option>
                            <option value="Pra Ranting">Pra Ranting</option>
                            <option value="Ranting">Ranting</option>
                            <option value="Rayon">Rayon</option>
                            <option value="Sekretariat Cabang Otonom">Sekretariat Cabang Otonom</option>
                            <option value="Sekretariat Misi">Sekretariat Misi</option>
                            <option value="Sekretariat Pemuda Remaja">Sekretariat Pemuda Remaja</option>
                            <option value="Sekretariat Pengajaran">Sekretariat Pengajaran</option>
                            <option value="Sekretariat Pusat">Sekretariat Pusat</option>
                            <option value="Sekretariat Rayon">Sekretariat Rayon</option>
                           </select>
                         </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat Sekretariat</label>
                            <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat"></textarea>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rt</label>
                            <input type="number" name="rtrw[]" class="form-control" placeholder="Rt">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rw</label>
                            <input type="number" name="rtrw[]" class="form-control" placeholder="Rw">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Provinsi</label>
                            <select class="form-control select2" name="provinces" id="provinces" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Provinsi ===</option>
                               @foreach ($provinces as $key => $value)
                              <option value="{{$value->id}}">{{ $value->name }}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kabupaten/Kota</label>
                            <select class="form-control select2" name="regencies" id="regencies" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Kabupaten/Kota ===</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kecamatan</label>
                            <select class="form-control select2" name="districts" id="districts" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Kecamatan ===</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kelurahan</label>
                            <select class="form-control select2" name="villages" id="villages" style="width: 100%;">
                              <option value="" disable="true" selected="true">=== Pilih Kelurahan ===</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Negara</label>
                            <input type="text" name="negara" class="form-control" placeholder="Negara">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Google Map Address</label>
                            <input type="text" name="google" class="form-control" placeholder="Google Map Address">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="Longitude">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="number" name="notelp" class="form-control" placeholder="No. Telepon">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Fax</label>
                            <input type="text" name="fax" class="form-control" placeholder="Fax">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>No. Ref</label>
                            <input type="text" name="noref" class="form-control" placeholder="No. Ref">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="status" style="width: 100%;">
                              <option value="">-- Pilih Status --</option>
                              <option value="Aktif">Aktif</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Perjamuan Kudus</label>
                            <select class="form-control select2" name="perjamuan" style="width: 100%;">
                              <option value="">-- Pilih Perjamuan Kudus --</option>
                              <option value="Minggu Ke-1">Minggu Ke-1</option>
                              <option value="Minggu Ke-2">Minggu Ke-2</option>
                              <option value="Minggu Ke-3">Minggu Ke-3</option>
                              <option value="Minggu Ke-4">Minggu Ke-4</option>
                            </select>
                          </div>
                        </div>
                        <div class="demo-button">
                          <button type="submit" class="btn btn-block btn-primary  waves-effect" id="cab">Save</button>
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
@push('script')
<script type="text/javascript">
 
   $("#formcab").on("submit",function(e) {
     e.preventDefault();
        var form = e.target;
        var formdata = new FormData(form);
        $.ajax({
            type: form.method,
            url: form.action,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
        success: function(data){
          console.log(data);
          swal({
            title: "PILIH HALAMAN",
            icon: "info",
            buttons: ["+ Kebaktian", "INDEX"],
            // dangerMode: true,
          })
          .then((index) => {
            if (index) {
              window.location.href = "{{url('cabang')}}";
            } else {
              window.location.href = "{{url('cabang/kebaktian')}}/"+data.idcabangranting;
            }
          });
        },
        error: function(){
          alert('Ada Kesalahan saat Input!');
        }
      })
    })

</script>
@endpush