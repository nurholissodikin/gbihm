<br>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List Pertemuan</h3>
  </div>
  <div class="box-body">
    <table  class="table table-bordered table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Pertemuan</th>
          <th>Tanggal</th>
          <th>Nama Pertemuan</th>
          <th>Tempat</th>
        </tr>
      </thead>
      <tbody id="kom_data">
        @php $no = 1 @endphp
        @foreach($pertemuan as $data)
        <tr class="data{{$data->id}}">
          <td>{{$no}}</td>
            <td>{{$data->kode}}</td>
            <td>{{$data->tanggal}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->tempat}}p</td>
        </tr>
        @php $no++ @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
