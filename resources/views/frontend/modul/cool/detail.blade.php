@extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        COOL
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header bg-info">
              <center>
                <h3 class="box-title ">Detail COOL</h3>
                <div class="demo-button pull-right">
                <button type="submit" class="btn btn-block btn-primary btn-xs waves-effect" VALUE="Back" onClick="history.go(-1);">Kembali</button>
              </div>
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
                      <input type="hidden" name="id" value="{{$cool->id}}">
                      <label>: &nbsp; <b><span>{{$cool->tipecool['tipecool']}}</span></b></label> 
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Gembala</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                      <input type="hidden" name="id" value="{{$cool->id}}">
                      <label>: &nbsp; <b><span>{{$cool->personal['idpersonal']}} - {{$cool->personal['namalengkap']}}</span></b></label> 
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
                      <label>Kabupaten/Kota</label>  
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
                      <label>Jumlah Anggota COOL</label>  
                    </div>
                  </div>
                  <div class="col-md-9"> 
                    <div class="form-group">
                       @php
                        $aa= \App\Anggotacool::where('idcool',$cool->id)->count();
                      @endphp
                      <label>: &nbsp; <b><span>{{$aa}}</span></b></label> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">List Anggota COOL</h3>
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
                      <th>Email</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1 @endphp
                    @foreach($anggota as $item)
                    <tr class="item{{$item->id}}">
                      <td>{{$no}}</td>
                      <td>{{$item->idpersonal}}</td>
                      <td>{{$item->personal['namalengkap']}}</td>
                      <td>{{$item->jabatan_anggota}}</td>
                      <td>{{$item->kategori}}</td>
                      <td>{{$item->personal['tanggallahir']}}</td>
                      <td>{{$item->personal['nohp']}}</td>
                      <td>{{$item->personal['email']}}</td>
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