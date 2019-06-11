@extends('layouts.master')

@section('content')
  <input type="hidden" id="kkj_aw" value="{{$personal->nokkj}}">
  <input type="hidden" id="gereja_aw" value="{{$personal->gerejaasal}}">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
       Detail Data Personal
      </h1>
      <br>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Detail Data - &nbsp;{{$personal->namalengkap}}</h3>
              <a href="{{route('personal.index')}}" class="btn btn-primary pull-right" >Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                 <li role="presentation" class="active"><a href="#informasi" data-toggle="tab">Informasi Umum</a></li>
                 <li role="presentation"><a href="#kontak" data-toggle="tab">Kontak</a></li>            
                 <li role="presentation"><a href="#pendidikan" data-toggle="tab" disable >Pendidikan Pekerjaan</a></li>
                </ul>
                <div class="tab-content">           
                  <div role="tabpanel" class="tab-pane fade in active" id="informasi">   
                    @include('frontend.personal.detailform') 
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="kontak">  
                    @include('frontend.personal.detailkontak')    
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="pendidikan">
                    @include('frontend.personal.detailpendidikan') 
                  </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection


