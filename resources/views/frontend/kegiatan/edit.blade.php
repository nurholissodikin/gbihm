@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Edit Kegiatan Pelayan- <b>{{$peke->kegiatan['nama_kegiatan']}}</b>
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form action="{{route('kegiatanpelayan.update',$peke->id)}}" enctype="multipart/form-data" method="post">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Data {{$peke->kegiatan['nama_kegiatan']}}</h3>
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
                        <input type="hidden" name="idkegiatan" value="{{$peke->id}}">
                        <label>: &nbsp; <b><span class="pero">{{$peke->kegiatan['tgl_mulai']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tempat/Rauangan</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$peke->kegiatan['tempat']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Kordinator</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span class="pero">{{$peke->personal['namalengkap']}}</span></b></label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box box-info">
              <div class="box-header bg-info">
                <center>
                <h3 class="box-title ">Pelayan {{$peke->kegiatan['nama_kegiatan']}}</h3>
                </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                          <input type="text" class="form-control" value="{{$peke->personal['namalengkap']}}" readonly="">
                          <input type="hidden" name="idpersonal" class="form-control" value="{{$peke->idpersonal}}"  readonly="">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Melayani Sebagai</label>
                        <select class="form-control select2" name="melayani" style="width: 100%">
                          <option value="">== Pilih Jenis Pelayan ==</option>
                          <option value="MC" <?php echo ($peke->melayani == 'MC') ? "selected": "" ?>>MC</option>
                          <option value="Singer" <?php echo ($peke->melayani == 'Singer') ? "selected": "" ?>>Singer</option>  
                          <option value="Kolektan" <?php echo ($peke->melayani == 'Kolektan') ? "selected": "" ?>>Kolektan</option>
                          <option value="Usher" <?php echo ($peke->melayani == 'Usher') ? "selected": "" ?>>Usher</option>
                          <option value="Music" <?php echo ($peke->melayani == 'Music') ? "selected": "" ?>>Music</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Kehadiran</label>
                        <select class="form-control select2" name="hadir" style="width: 100%">
                          <option value="Hadir" <?php echo ($peke->hadir == 'Hadir') ? "selected": "" ?>>Hadir</option>
                          <option value="Ijin" <?php echo ($peke->hadir == 'Ijin') ? "selected": "" ?>>Ijin</option>  
                          <option value="Alpha" <?php echo ($peke->hadir == 'Alpha') ? "selected": "" ?>>Alpha</option>
                          <option value="Terlambat" <?php echo ($peke->hadir == 'Terlambat') ? "selected": "" ?>>Terlambat</option>
                          <option value="Sakit" <?php echo ($peke->hadir == 'Sakit') ? "selected": "" ?>>Sakit</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alasan</label>
                        <textarea class="form-control" name="alasan" rows="3">{{$peke->alasan}}</textarea>
                      </div>
                    </div>
                    <div class="demo-button">
                      <button type="submit" class="btn btn-block btn-primary  waves-effect">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>
      </div>
    </section>
  </div>
  
@endsection
