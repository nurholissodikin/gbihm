@extends('layouts.master')

@section('content')
  <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        MDPJ
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pengerja</a></li>
              <li><a href="#tab_2" data-toggle="tab">COOL</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tamu</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                @include('frontend.approve.cabang.pengerja')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                @include('frontend.approve.cabang.cool')
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                @include('frontend.approve.cabang.tamu')
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </section>
  </div>
@endsection
@push('script')
<script type="text/javascript">
$(function(){
     $("#but_approve").removeAttr("href");
  })  
</script>
@endpush