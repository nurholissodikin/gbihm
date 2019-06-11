@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Histori COOL - <b>{{$cool->personal['namalengkap']}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Data COOL</h3>
              </center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">             
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tipe COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <input type="hidden" name="idpersonal" value="{{$cool->id}}">
                      <label>: &nbsp; <b><span>{{$cool->tipecool['tipecool']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Gembala COOl</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->personal['namalengkap']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Pengerja</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->pengerja}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Jabatan Gembala COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->jabatan}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Lokasi COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->lokasi}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kabupaten / Kota</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->kabkotaa['name']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Provinsi</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->provinsia['name']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Kode Pos</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <label>: &nbsp; <b><span>{{$cool->kodepos}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Histori Data COOL Create / Update</h3>
              </center>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example3" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tipe COOL</th>
                      <th>Gembala COOL</th>
                      <th>Lokasi COOL</th>
                      <th>Kabupaten / Kota</th>
                      <th>Provinsi</th>
                      <th>Kodepos</th>
                      <th>User Create </th>
                      <th>User Update</th>
                      <th>Date Create</th>
                      <th>Date Update</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$cool->tipecool['tipecool']}}</td>
                      <td>{{$cool->personal['namalengkap']}}</td>
                      <td>{{$cool->lokasi}}</td>
                      <td>{{$cool->kabkotaa['name']}}</td>
                      <td>{{$cool->provinsia['name']}}</td>
                      <td>{{$cool->kodepos}}</td>
                      <td>{{$cool->user_created['name']}} </td>
                      <td>{{$cool->user_updated['name']}}</td>
                      <td>
                        @php
                        $a = $cool->created_at;   
                        $tanggal = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggal}}</td>
                      <td>
                        @php
                        $a = $cool->updated_at;   
                        $tanggala = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggala}}</td>
                    @php $no++ @endphp
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Histori Data Anggota Create / Update</h3>
              </center>
            </div>
            <div class="box-body">
              <div class="table-responsive">       
                <table width="100%" class="table table-bordered table-hover" id="example2" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Personal</th>
                      <th>Nama Anggota</th>
                      <th>Jabatan Anggota</th>
                      <th>Kategori Anggota</th>
                      <th>Tanggal Lahir</th>
                      <th>No.HP</th>
                      <th>User Create </th>
                      <th>User Update</th>
                      <th>Date Create</th>
                      <th>Date Update</th>
                    </tr>
                  </thead>
                  <tbody id="kom_data">
                    @php $no = 1 @endphp
                    @foreach($anggota as $item)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$item->idpersonal}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->jabatan_anggota}}</td>
                      <td>{{$item->kategori}}</td>
                      <td>{{$item->personal['tanggallahir']}}</td>
                      <td>{{$item->personal['nohp']}}</td>
                      <td>{{$item->anggota_create['name']}} </td>
                      <td>{{$item->anggota_update['name']}}</td>
                      <td>
                        @php
                        $a = $item->created_at;   
                        $tanggal = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggal}}</td>
                      <td>
                        @php
                        $a = $item->updated_at;   
                        $tanggala = date('d F Y, h:i:s', strtotime($a));
                        @endphp
                        {{$tanggala}}</td>
                    </tr> 
                    @php $no++ @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection 