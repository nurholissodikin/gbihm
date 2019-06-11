<br>

<div class="col-md-12">
  <div id="tab" class="btn-group btn-group-justified" data-toggle="buttons">
    <a href="#pl" class="btn btn-primary active" data-toggle="tab">
      <input type="radio">Pelayanan List
    </a>
    <a href="#tjp" class="btn btn-primary btn-rohani" data-toggle="tab" id="tjp_f">
      <input type="radio">Tambah Jabatan Pelayan
    </a>
    <a href="#rn" class="btn btn-primary btn-rohani" data-toggle="tab">
      <input type="radio">Renew
    </a>
    <a href="#bah" class="btn btn-primary btn-rohani" data-toggle="tab">
      <input type="radio">Badge Hilang
    </a>
    <a href="#mpp" class="btn btn-primary btn-rohani" data-toggle="tab">
      <input type="radio">Mutasi Pelayan/Pengerja
    </a>
    <a href="#pm" class="btn btn-primary btn-rohani" data-toggle="tab">
      <input type="radio">Pertermuan
    </a>
  </div>

  <div class="tab-content">
    <div class="tab-pane active" id="pl">
      @include('frontend.rohani.pelayananlist')
    </div>
    <div class="tab-pane" id="tjp">
      @include('frontend.rohani.jabatan.tambah')
    </div>
    <div class="tab-pane" id="rn">
      @include('frontend.rohani.jabatan.tambah')
      </div>
    <div class="tab-pane" id="bah">
      @include('frontend.rohani.jabatan.tambah')
    </div>
    <div class="tab-pane" id="mpp">
     
    </div>
    <div class="tab-pane" id="pm">
      @include('frontend.pertemuan.index')
    </div>
  </div>
</div>
