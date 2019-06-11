<br>
<br>
<!-- <form  action="{{route('jabatanpelayanan.store')}}" enctype="multipart/form-data" method="post" id="formjabpel"> -->
<form  id="formjabpel" method="post">
  {{csrf_field()}}
  <input type="hidden" name="idpejab" id="id_pejab" value="{{$personal->idpersonal}}">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Data Pelayanan Rohani</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          @foreach($pelayanana as $pls)
            <div class="col-md-8">
              <div class="form-group">
                <label>No. Sertifikat SOM/KOM Terakhir</label>
                <input type="hidden" name="idpelayanan" id="pel_jpl" class="form-control" value="{{$pls->id}}" readonly="">
                <input type="text" name="noser" class="form-control" value="{{$pls->nosertifikat}}" readonly="">  
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Tanggal</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="aa" class="form-control pull-right" value="{{$pls->tanggal}}" readonly="">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Melayani Sejak</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="Melayani" value="{{$pls->tanggal}}" readonly="" class="form-control pull-right">
                </div>  
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Dokumen</label>
                <a  href="{{asset('public/assets/rohani/pelayanan/dokumen/'.$pls->dokumen.'')}}" class="btn bg-navy" target="_blank">{{$pls->dokumen}}</a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Jenis Badge</label>
                <input type="text" class="form-control" name="jenis" value="{{$pls->jenisbadge}}" readonly="">
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Jabatan Pelayanan</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label>No. Referensi</label>
              <input type="text" name="noref" id="noref_jpl" class="form-control" placeholder="No. Referensi">  
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Pilih Jabatan</label>
              <select class="form-control select2" id="jab_jpl" name="jabatan" style="width: 100%">
                <option value="">== Pilih Pilih Jabatan ==</option>
                <option value="Pdt.">Pdt.</option>
                <option value="Pdm.">Pdm.</option>
                <option value="Pdp.">Pdp.</option>
                <option value="Ka. Divisi">Ka. Divisi</option>
                <option value="Istri Ka. Divisi">Istri Ka. Divisi</option>
                <option value="Wkl. Ka. Divisi">Wkl. Ka. Divisi</option>
                <option value="Istri/Suami Wkl. Ka. Divisi">Istri/Suami Wkl. Ka. Divisi</option>
                <option value="Ka. Sub Divisi">Ka. Sub Divisi</option>
                <option value="Istri/Suami Ka. Sub Divisi">Istri/Suami Ka. Sub Divisi</option>
                <option value="Staf Ahli Penggembalaan">Staf Ahli Penggembalaan</option>
                <option value="Istri/Suami Staf Ahli Penggembalaan">Istri/Suami Staf Ahli Penggembalaan</option>
                <option value="Wkl. Ka. Sub Divisi">Wkl. Ka. Sub Divisi</option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
             <label>
              <input type="checkbox" class="minimal" name="jabut" id="jabut_jpl" value="Jabatan Utama"> Tandai Sebagai Jabatan Utama
            </label>
            </div>
          </div>
          <!-- <div class="col-md-12">
            <div class="form-group">
              <label>Tempat (Pusat/Rayon/Cabang/Ranting)</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-search"></i>
                </div>
                <input type="text" class=" form-control" name="tempat" id="autocomplete" placeholder="Cari Pusat/Rayon/Cabang/Ranting">
              </div>
               <div id="autocomplete_list">
                </div>
            </div>
          </div> -->
          <div class="col-md-4">
            <div class="form-group">
              <label>Tempat</label>
              <select name="rayon" class="form-control select2 sub_tem cab_tem" id="rayon2"  style="width: 100%">
                <option value="">== Pilih Rayon ==</option>
                @foreach ($raper as $data)
                <option value="{{$data->idrayon}}"> {{$data->namarayon}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label><br></label>
              <select name="subrayon" class="form-control select2 ray_tem cab_tem" id="subrayon2" style="width: 100%">
                <option value="">== Pilih Sub Rayon ==</option>
                @foreach ($subray as $data)
                <option value="{{$data->idsubrayon}}"> {{$data->namasubrayon}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label><br></label>
              <select name="cabang" class="form-control select2 ray_tem sub_tem" id="cabang2" style="width: 100%">
                <option value="">== Pilih Cabang ==</option>
                @foreach ($cabran as $data)
                <option value="{{$data->idcabangranting}}"> {{$data->namacabang}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Sejak</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input id="tgl_mulai" placeholder="Sejak" type="text" class="form-control datepicker" name="tgl_awal">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <label>Sampai Dengan</label>
             <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input id="tgl_akhir" placeholder="Sampai" type="text" class="form-control datepicker" name="tgl_akhir">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
             <label>Tanggal Lantik</label>
             <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input placeholder="Tanggal Lantik" type="text" class="form-control datepicker" id="tgl_jpl" name="lantik">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Rekomendasi</label>
              <select name="pengerja" class="form-control select2" required="" id="pej_jpl" style="width: 100%">
                <option value="">== Pilih Nama Penegerja ==</option>
                @foreach ($perso as $data)
                <option value="{{$data->idpersonal}}">{{$data->idpersonal}} | {{$data->namalengkap}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <label>Hadir Di Pertemuan</label>
            <div class="form-group">
              <label>
              <input type="checkbox" id="hdr_jpl" name="hp[]" value="Menara Doa Pelayan Jemaat (MDPJ)"> Menara Doa Pelayan Jemaat (MDPJ)
              </label>
            </div>
            <div class="form-group">
              <label>
              <input type="checkbox" id="hdr1_jpl" name="hp[]" value="DPPJ"> DPPJ
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>No. Sertifikat</label>
              <input type="text" name="noser" id="noser_jpl" class="form-control" placeholder="No. Sertifikat">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Dokumen</label>
              <input type="file" name="dok"  class="form-control">
            </div>
          </div>
           <div class="col-md-12">
            <div class="form-group">
              <label>Status</label>
              <select name="status" id="status_jpl" class="form-control select2" style="width: 100%">
                <option value="">== Pilih Status ==</option>
                <option value="Aktif">Aktif</option>
                <option value="Non Aktif">Non Aktif</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="demo-button">
              <button type="button" onclick="save_jabpel()" id="btn-submit-jabpel" class="btn btn-primary form-control">Save</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="demo-button">
               <button type="button" onclick="confirm_renew()" id="btn-submit-jabpel" class="btn btn-primary form-control">Renew</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="demo-button">
              <button type="button" onclick="save_jabpel_badge()" id="btn-submit-jabpel" class="btn btn-primary form-control">Badge Hilang</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<br>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Jabatan Pelayanan</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table  class="table table-bordered table-striped" >
        <thead>
          <tr>
            <th>No</th>
            <th>No. Ref.</th>
            <th>Jabatan</th>
            <th>Tempat</th>
            <th>Masa Jabatan</th>
            <th>Tanggal Lantik</th>
            <th>Rekomendasi</th>
            <th>No. Sertifikat</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="jabpel_data">
          @php $no = 1 @endphp
          @foreach($jabpel as $item)
          <tr class="item{{$item->iddiserahkan}}">
            <td>{{$no}}</td>
            <td>{{$item->noreferensi}}</td>
            <td>{{$item->jabatan}}</td>
            <td>{{$item->tempat}}</td>
            <td> 
              @php
                $a = $item->sejak;   
                $b = $item->sampai;   
                $sejak = date('d F Y', strtotime($a));
                $sampai = date('d F Y', strtotime($b));
              @endphp
              {{$sejak}} Sampai {{$sampai}}</td>
            <td>{{$item->tgl}}</td>
            <td>{{$item->pengerjaa['namalengkap']}}</td>
            <td>{{$item->nosertifikat}}</td>
            <td>{{$item->status}}</td>
            <td>
             <button class="btn btn-xs btn-warning" onclick="edit_jabpel({{$item->id}})">
                <span class="glyphicon glyphicon-edit"></span> 
              </button>     
              <button class="btn btn-xs btn-danger" onclick="del_jabpel({{$item->id}})">
                <span class="glyphicon glyphicon-trash"></span> 
              </button>
            </td>
          </tr>
          @php $no++ @endphp
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
