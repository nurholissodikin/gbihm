  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        BP2N
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header bg-info">
                <h3 class="box-title ">Detail Data Peserta kehadiran</h3>
                 <div class="pull-right">
                  <button type="submit" class="btn btn-block btn-primary  waves-effect" value="BACK" onCLick="history.go(-1);">Kembali</button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">             
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>ID Personal</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$kehadiran->guru->personal['idpersonal']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nama Lengkap</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$kehadiran->guru->personal['namalengkap']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Jenis kelamin</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span> 
                          @php
                            $a=$kehadiran->guru->personal['jeniskelamin'];
                            if($a == 'L')
                            {
                             $b="Laki-Laki";
                            }else if($a == 'P')
                            {
                             $b="Perempuan";
                            }else{}
                            @endphp
                        {{$b}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Materi</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$kehadiran->materi['materi']}}</span></b></label> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tanggal</label>  
                      </div>
                    </div>
                    <div class="col-md-9"> 
                      <div class="form-group">
                        <label>: &nbsp; <b><span>{{$kehadiran->tanggal}}</span></b></label> 
                      </div>
                    </div>                  
                  </div>
                </div>
              </div>
            </div>
          
        </div>
      </div>
    </section>
  </div>
 @endsection  