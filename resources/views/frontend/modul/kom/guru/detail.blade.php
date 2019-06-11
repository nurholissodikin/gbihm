  @extends('layouts.master')
@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
      Guru Kom
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
               <h3 class="box-title">Detail Data Guru</h3>
              </div>
              <br>
             
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>ID Personal</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->idpersonal}}</label>
                  </div>
                  <div class="col-md-4 pull-right">
                    <a href="{{route('guru.create')}}" class="form-control btn btn-primary pull-right" >Tes HDR</a>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Nama Lengkap</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->personal['namalengkap']}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                    <a href="{{route('guru.create')}}" class="form-control btn btn-primary pull-right" >Tes Interview</a>
                  </div>
              </div>
               <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="col-md-6">
                    @php
                    $a=$guru->personal['jeniskelamin'];
                    if($a == 'L')
                    {
                     $b="Laki-Laki";
                    }else if($a == 'P')
                    {
                     $b="Perempuan";
                    }else{}
                    @endphp
                    <label>: {{$b}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="{{route('guru.create')}}" class="form-control btn btn-primary pull-right" >Diklat</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Rayon</label>
                  </div>
                  <div class="col-md-6">
                    <label>: {{$guru->rayon['namarayon']}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                    <a href="{{route('guru.create')}}" class="form-control btn btn-primary pull-right" >Audisi</a>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-md-2">
                    <label>Status</label>
                  </div>
                  <div class="col-md-6">
                    
                    <label>: {{$guru->status}}</label>
                  </div>
                </div>
                <div class="col-md-4 pull-right">
                  <a href="{{route('guru.create')}}" class="form-control btn btn-primary pull-right" >Sertifikat</a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
 @endsection  