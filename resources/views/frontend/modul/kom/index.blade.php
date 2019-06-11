@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        KOM
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <a href="{{url('#')}}" class="btn btn-primary">Sertifikat</a>
          <a href="{{url('#')}}" class="btn btn-primary">Tes HDR</a>
          <a href="{{url('#')}}" class="btn btn-primary">Tes Interview</a>
          <a href="{{url('#')}}" class="btn btn-primary">Diklat</a>
          <a href="{{url('#')}}" class="btn btn-primary">Audisi</a>
        </div>
      </div>
    </section>
  </div>
@endsection