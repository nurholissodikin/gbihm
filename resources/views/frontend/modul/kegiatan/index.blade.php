@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Kegiatan
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Data Kegiatan</h3>
               <a href="{{url('modul/kegiatan/create')}}" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i></a>
               <a href="{{url('modul/kegiatan/calender')}}" class="btn btn-primary pull-right" ><i class="fa fa-calendar"> Tampilkan Kalender</i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                 <table border="0" cellspacing="5" cellpadding="5">
                    <tbody>
                      <tr>
                        <td>Range :</td>
                        <td><input name="min" id="min" class="form-control" type="text"></td><td>-</td>
                        <td><input name="max" id="max" class="form-control" type="text"></td>
                      </tr>
                    </tbody>
                  </table>          
                  <table width="100%" class="table table-bordered table-hover" id="datadate" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Kegiatan</th>
                        <th>Kategori Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th>Tempat/Ruangan</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Pic</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="kom_data">
                      @php $no = 1 @endphp
                      @foreach($kegiatan as $item)
                      <tr class="item{{$item->id}}">
                        <td>{{$no}}</td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->nama_kegiatan}}</td>
                        <td>{{$item->tempat}}</td>
                        <td>{{$item->tgl_mulai}}</td>
                        <td>{{$item->waktu_mulai}}</td>
                        <td>{{$item->personal['namalengkap']}}</td>
                        <td>
                          <a href="{{ route('kegiatan.edit',$item->id)}}" type="submit" class="btn btn-block-small btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                          <a href="{{ url('kegiatan/pelayan',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Pelayanan</a>
                          <a href="{{ url('kegiatan/peserta',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Peserta</a>
                          <a href="{{ url('kegiatan/kehadiran',$item->id)}}" type="submit" class="btn btn-block-small bg-navy btn-xs">Kehadiran</a>
                        </td>
                      </tr>
                      @php $no++ @endphp
                      @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
@endsection
@push('script')
<script type="text/javascript">

   $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            var min = $('#min').datepicker("getDate");
            var max = $('#max').datepicker("getDate");
            var startDate = new Date(data[4]);
            if (min == null && max == null) { return true; }
            if (min == null && startDate <= max) { return true;}
            if(max == null && startDate >= min) {return true;}
            if (startDate <= max && startDate >= min) { return true; }
            return false;
        }
        );

       
            $("#min").datepicker({ onSelect: function () { table.draw(); }, format: 'yyyy-mm-dd', autoclose: true,
    todayHighlight: true, changeMonth: true, changeYear: true });
            $("#max").datepicker({ onSelect: function () { table.draw(); }, format: 'yyyy-mm-dd', autoclose: true,
    todayHighlight: true, changeMonth: true, changeYear: true });
             var table = $('#datadate').DataTable( {
              "scrollX": true

    
             }
    //          {
    //     "bProcessing": true,
    //     "bDeferRender": true,
    //     "serverSide": false,
    //     orderCellsTop: true,
    //     "responsive": true,
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //     "responsive": {
    //         "breakpoints": [
    //         { name: 'desktop', width: Infinity },
    //         { name: 'tablet', width: 1024 },
    //         { name: 'fablet', width: 768 },
    //         { name: 'phone', width: 480 }
    //         ]
    //     },
    //    "scrollX": true,
    //    dom: 'Blfrtip',
    //     buttons: [
    //         {
    //             extend:    'print',
    //             text:      '<i class="fa fa-print"></i>',
    //             titleAttr: 'Print',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'copyHtml5',
    //             text:      '<i class="fa fa-files-o"></i>',
    //             titleAttr: 'Copy',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'excelHtml5',
    //             text:      '<i class="fa fa-file-excel-o"></i>',
    //             titleAttr: 'Excel',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'csvHtml5',
    //             text:      '<i class="fa fa-file-text-o"></i>',
    //             titleAttr: 'CSV',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         },
    //         {
    //             extend:    'pdfHtml5',
    //             text:      '<i class="fa fa-file-pdf-o"></i>',
    //             titleAttr: 'PDF',
    //             tag: "button",
    //             className: "active btn btn-info"
    //         }
    //     ],
    //    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    // } 
    );

            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').change(function () {
                table.draw();
            });
        });
</script>
@endpush