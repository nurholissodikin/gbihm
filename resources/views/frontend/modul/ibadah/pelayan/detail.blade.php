@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Ibadah Raya Detail Pelayan- <b>{{$peke->ibadahraya['nama_ibadah']}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data {{$peke->ibadahraya['nama_ibadah']}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">             
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Hari/Tanggal</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$peke->ibadahraya['tgl_mulai']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tempat/Rauangan</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$peke->ibadahraya['tempat']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Kordinator</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$peke->ibadahraya->personal['namalengkap']}}</span></b></label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Pelayan {{$peke->ibadahraya['nama_ibadah']}}</h3>
                <button type="submit" class="btn btn-primary btn-block-small pull-right btn-xs" VALUE="Back" onClick="history.go(-1);">Kembali</button>
                </center>

              </div>
              <!-- /.box-header -->
              <div class="box-body">  
                <div class="row">
                  <form  action="{{url('ibadahrayapelayan/update',$peke->id)}}" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-12">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>NO. ID</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                          <label>: &nbsp; <b><span class="pero">{{$peke->personal['idpersonal']}}</span></b></label> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Nama Lengkap</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                          <label>: &nbsp; <b><span class="pero">{{$peke->personal['namalengkap']}}</span></b></label> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>No. HP</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                          <label>: &nbsp; <b><span class="pero">{{$peke->personal['nohp']}}</span></b></label> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Melayani Sebagai</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                          <label>: &nbsp; <b><span class="pero">{{$peke->melayani}}</span></b></label> 
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Kehadiran</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                          <select class="form-control select2" name="hadir" id="alasan" style="width: 100%">
                            <option value="Hadir" <?php echo($peke->hadir == 'Hadir') ? "selected" : "" ?>>Hadir</option>
                            <option value="Ijin" <?php echo($peke->hadir == 'Ijin') ? "selected" : "" ?>>Ijin</option>
                            <option value="Alpha" <?php echo($peke->hadir == 'Alpha') ? "selected" : "" ?>>Alpha</option>
                            <option value="Terlambat" <?php echo($peke->hadir == 'Terlambat') ? "selected" : "" ?>>Terlambat</option>
                            <option value="Sakit" <?php echo($peke->hadir == 'Sakit') ? "selected" : "" ?>>Sakit</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Alasan Ijin</label>  
                        </div>
                      </div>
                      <div class="col-md-9"> 
                        <div class="form-group">
                         <textarea class="form-control alasan" disabled="" name="alasan">{{$peke->alasan}}</textarea>
                        </div>
                      </div>
                      <div class="demo-button">
                        <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>  
            </div>
        </div>
      </div>
    </section>
  </div>
  
@endsection
