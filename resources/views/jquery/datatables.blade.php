<script>
  // $(document).ready(function() {
  //   var table = $('#example2').DataTable( {
  //     responsive: true
  //   } );
  // } );
  $(document).ready(function() {
    var table = $('#example3').DataTable( {
      responsive: true
    } );
  } );
  $(document).ready(function() {
    var table = $('.data-table').DataTable( {
      responsive: true
    } );
  } );
  
  $(function () {
 
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    
    
  })
  // $(document).ready(function() {
  //   // Setup - add a text input to each footer cell
  //   $('#example2 thead tr').clone(true).appendTo( '#example2 thead' );
  //   $('#example2 thead tr:eq(1) th').each( function (i) {
  //     var title = $(this).text();
  //     $(this).html( '<input type="text" class="form-control" placeholder=" Search '+title+'" />' );

  //     $( 'input', this ).on( 'keyup change', function () {
  //       if ( table.column(i).search() !== this.value ) {
  //         table
  //         .column(i)
  //         .search( this.value )
  //         .draw();
  //       }
  //     } );
  //   } );

  //   var table = $('#example2').DataTable( {
  //     orderCellsTop: true,
  //     fixedHeader: true,
  //     responsive: true,
  //     "scrollX": true,
  //     dom: 'Blfrtip',
  //       buttons: [
  //           {
  //               extend:    'print',
  //               text:      '<i class="fa fa-print"></i>',
  //               titleAttr: 'Print',
  //               tag: "button",
  //               className: "active btn btn-info"
  //           },
  //           {
  //               extend:    'copyHtml5',
  //               text:      '<i class="fa fa-files-o"></i>',
  //               titleAttr: 'Copy',
  //               tag: "button",
  //               className: "active btn btn-info"
  //           },
  //           {
  //               extend:    'excelHtml5',
  //               text:      '<i class="fa fa-file-excel-o"></i>',
  //               titleAttr: 'Excel',
  //               tag: "button",
  //               className: "active btn btn-info"
  //           },
  //           {
  //               extend:    'csvHtml5',
  //               text:      '<i class="fa fa-file-text-o"></i>',
  //               titleAttr: 'CSV',
  //               tag: "button",
  //               className: "active btn btn-info"
  //           },
  //           {
  //               extend:    'pdfHtml5',
  //               text:      '<i class="fa fa-file-pdf-o"></i>',
  //               titleAttr: 'PDF',
  //               tag: "button",
  //               className: "active btn btn-info"
  //           }
  //       ]
  //   } );
  //    table.buttons().container().appendTo('#example_wrapper .col-sm-6:eq(0)');
  //   $('#example5 thead tr').clone(true).appendTo( '#example5 thead' );
  //   $('#example5 thead tr:eq(1) th').each( function (i) {
  //     var title = $(this).text();
  //     $(this).html( '<input type="text" class="form-control" placeholder=" Search '+title+'" />' );
      
  //     $( 'input', this ).on( 'keyup change', function () {
  //       if ( table.column(i).search() !== this.value ) {
  //         table
  //         .column(i)
  //         .search( this.value )
  //         .draw();
  //       }
  //     } );
  //   } );
    
  //   var table = $('#example5').DataTable( {
  //     orderCellsTop: true,
  //     fixedHeader: true,
  //     responsive: true,
  //     "scrollX": true
  //   } );
  // } );
  $(document).ready(function() {
   
    $('#example2 thead tr').clone(true).appendTo( '#example2 thead' );
    $('#example2 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#example2').DataTable( {
        "bProcessing": true,
        "bDeferRender": true,
        "serverSide": false,
        orderCellsTop: true,
        
        "responsive": true,
        "responsive": {
            "breakpoints": [
            { name: 'desktop', width: Infinity },
            { name: 'tablet', width: 1024 },
            { name: 'fablet', width: 768 },
            { name: 'phone', width: 480 }
            ]
        },
        "responsive": {
            "breakpoints": [
            { name: 'desktop', width: Infinity },
            { name: 'tablet', width: 1024 },
            { name: 'fablet', width: 768 },
            { name: 'phone', width: 480 }
            ]
        },
       "scrollX": true,
       dom: 'Blfrtip',
        buttons: [
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                tag: "button",
                className: "active btn btn-info"
            }
        ],
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    } );
} );
  $(document).ready(function() {
   
    $('.data-table2 thead tr').clone(true).appendTo( '.data-table2 thead' );
    $('.data-table2 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('.data-table2').DataTable( {
        "bProcessing": true,
        "bDeferRender": true,
        "serverSide": false,
        orderCellsTop: true,
        "responsive": true,
        "responsive": {
            "breakpoints": [
            { name: 'desktop', width: Infinity },
            { name: 'tablet', width: 1024 },
            { name: 'fablet', width: 768 },
            { name: 'phone', width: 480 }
            ]
        },
        "responsive": {
            "breakpoints": [
            { name: 'desktop', width: Infinity },
            { name: 'tablet', width: 1024 },
            { name: 'fablet', width: 768 },
            { name: 'phone', width: 480 }
            ]
        },
       "scrollX": true,
       dom: 'Blfrtip',
        buttons: [
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                tag: "button",
                className: "active btn btn-info"
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                tag: "button",
                className: "active btn btn-info"
            }
        ],
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    } );
  } );
  $(document).ready(function() {

    $('.data-table1 thead tr').clone(true).appendTo( '.data-table1 thead' );
    $('.data-table1 thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

      $( 'input', this ).on( 'keyup change', function () {
        if ( table.column(i).search() !== this.value ) {
          table
          .column(i)
          .search( this.value )
          .draw();
        }
      } );
    } );

    var table = $('.data-table1').DataTable( {
      "bProcessing": true,
      "bDeferRender": true,
      "serverSide": false,
      orderCellsTop: true,
      "responsive": true,
      "responsive": {
        "breakpoints": [
        { name: 'desktop', width: Infinity },
        { name: 'tablet', width: 1024 },
        { name: 'fablet', width: 768 },
        { name: 'phone', width: 480 }
        ]
      },
      "responsive": {
        "breakpoints": [
        { name: 'desktop', width: Infinity },
        { name: 'tablet', width: 1024 },
        { name: 'fablet', width: 768 },
        { name: 'phone', width: 480 }
        ]
      },
      "scrollX": true,
      dom: 'Blfrtip',
      buttons: [
      {
        extend:    'print',
        text:      '<i class="fa fa-print"></i>',
        titleAttr: 'Print',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'copyHtml5',
        text:      '<i class="fa fa-files-o"></i>',
        titleAttr: 'Copy',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'excelHtml5',
        text:      '<i class="fa fa-file-excel-o"></i>',
        titleAttr: 'Excel',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'csvHtml5',
        text:      '<i class="fa fa-file-text-o"></i>',
        titleAttr: 'CSV',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="fa fa-file-pdf-o"></i>',
        titleAttr: 'PDF',
        tag: "button",
        className: "active btn btn-info"
      }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    } );

    $('.data-table11 thead tr').clone(true).appendTo( '.data-table11 thead' );
    $('.data-table11 thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );

      $( 'input', this ).on( 'keyup change', function () {
        if ( table.column(i).search() !== this.value ) {
          table
          .column(i)
          .search( this.value )
          .draw();
        }
      } );
    } );

    var table = $('.data-table11').DataTable( {
      "bProcessing": true,
      "bDeferRender": true,
      "serverSide": false,
      orderCellsTop: true,
      "responsive": {
        "breakpoints": [
        { name: 'desktop', width: Infinity },
        { name: 'tablet', width: 1024 },
        { name: 'fablet', width: 768 },
        { name: 'phone', width: 480 }
        ]
      },
      "responsive": {
        "breakpoints": [
        { name: 'desktop', width: Infinity },
        { name: 'tablet', width: 1024 },
        { name: 'fablet', width: 768 },
        { name: 'phone', width: 480 }
        ]
      },
      "scrollX": true,
      dom: 'Blfrtip',
      buttons: [
      {
        extend:    'print',
        text:      '<i class="fa fa-print"></i>',
        titleAttr: 'Print',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'copyHtml5',
        text:      '<i class="fa fa-files-o"></i>',
        titleAttr: 'Copy',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'excelHtml5',
        text:      '<i class="fa fa-file-excel-o"></i>',
        titleAttr: 'Excel',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'csvHtml5',
        text:      '<i class="fa fa-file-text-o"></i>',
        titleAttr: 'CSV',
        tag: "button",
        className: "active btn btn-info"
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="fa fa-file-pdf-o"></i>',
        titleAttr: 'PDF',
        tag: "button",
        className: "active btn btn-info"
      }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]] 

    } );
  } );
    
    //     // Setup - add a text input to each cell in the filterRow
    // $('#example thead tr#filterRow th').each(function () {
    //     $(this).html('<input type="text" placeholder="Filter..." style="width:100%;border:none;"/>');
    // });

    // // Apply the search
    // table.columns().every(function () {
    //     var that = this;

    //     $('input', this.header()).on('change', function () {
    //         alert();
    //         if (that.search() !== this.value) {
    //             that
    //                 .search(this.value)
    //                 .draw();
    //         }
    //     });
    // });

</script>