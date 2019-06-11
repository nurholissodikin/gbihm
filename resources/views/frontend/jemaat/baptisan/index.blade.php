<br>

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Data Baptisan Air</h3>
  </div>
  <div class="box-body">
    <section>
      <div class="wizard">
        <div class="wizard-inner">
          <div class="connecting-line"></div>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Baptisan Air">
                <span class="round-tab">
                  <i class="glyphicon glyphicon-user"></i>
                </span>
              </a>
            </li>
            <li role="presentation" class="disabled">
              <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Dokumen Baptisan Air">
                <span class="round-tab">
                  <i class="glyphicon glyphicon-folder-open"></i>
                </span>
                </a>
            </li>
            <li role="presentation" class="disabled">
              <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Berita Acara">
                <span class="round-tab">
                  <i class="fa fa-file-text-o"></i>
                </span>
              </a>
            </li>
            <li role="presentation" class="disabled">
              <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Catatan / Keterangan">
                <span class="round-tab">
                  <i class="glyphicon glyphicon-pencil"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
          
        <form role="form" action="{{route('baptisan.store')}}" enctype="multipart/form-data" method="post" id="formba">
           {{csrf_field()}}
        <input type="hidden" name="method_type">  
          <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="step1">
              @include('frontend.jemaat.baptisan.personal')
            </div>
            <div class="tab-pane" role="tabpanel" id="step2">         
              @include('frontend.jemaat.baptisan.dokumen')
            </div>
            <div class="tab-pane" role="tabpanel" id="step3">
              @include('frontend.jemaat.baptisan.berita')
            </div>
            <div class="tab-pane" role="tabpanel" id="complete">
              @include('frontend.jemaat.baptisan.keterangan')
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
</div>
