<br>
<form action="{{url('personal/pen')}}" enctype="multipart/form-data" method="post" id="formpen">
    {{csrf_field()}}
  <input type="hidden" name="idper" id="id_pen" value="{{$personal->idpersonal}}">
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="form-group">
        <label>Status Pekerjaan</label>
          <input type="text" name="spek" class="form-control" value="{{$personal->statuspekerjaan}}" readonly="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Pilih Profesi</label>
        <input type="text" name="z" class="form-control" value="{{$personal->profesi['profesi']}}" readonly="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Pilih Jenis Pekerjaan</label>
        <input type="text" name="za" class="form-control" value="{{$personal->jenispekerjaan['jenispekerjaan']}}" readonly="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Pilih Bidang Pekerjaan</label>
        <input type="text" name="zb" class="form-control" value="{{$personal->bidangpekerjaan['bidangpekerjaan']}}" readonly="">
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Hobi</label>
        <input type="text" name="hobi" class="form-control" readonly="" value="{{$personal->hobi}}">
      </div>
    </div>
  </div> 
.
</form>  
<br>
<br>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List Pendidikan</h3>
     <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <table  class="table table-bordered table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Pendidikan</th>
          <th>Nama Sekolah/Institusi</th>
          <th>Lokasi/Kota</th>
          <th>Jurusan</th>
          <th>Tahun</th>
        </tr>
      </thead>
      <tbody id="pen_data">
        @php $no = 1 @endphp
        @foreach($pendi as $item)
        <tr class="item{{$item->idpendidikan}}">
          <td>{{$no}}</td>
          <td>{{$item->tingkatpendidikan}}</td>
          <td>{{$item->institusi}}</td>
          <td>{{$item->lokasi}}</td>
          <td>{{$item->jurusan}}</td>
          <td>{{$item->tahun}}</td>
        </tr>
        @php $no++ @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>