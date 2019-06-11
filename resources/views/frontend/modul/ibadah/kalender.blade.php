@extends('layouts.master')

@section('content')
 <div class="content-wrapper">
    <section class="content-header pull-left">
      <h1>
        Modul Ibadah Raya Kalender
      </h1>
    </section>
    <br><br>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Kalender</h3>
              <a href="{{url('modul/ibadahraya')}}" class="btn btn-primary pull-right" >Tampilkan List</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendara"></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /. box -->
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

 var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendara').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
     events : [
                @foreach($ibadahraya as $task)
                {
                    title : '{{ $task->nama_ibadah }}',
                    start : '{{ $task->tanggal }}',
                    end : '',
                    url : '{{ route('kegiatan.edit', $task->id) }}'
                },
                @endforeach
            ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendara').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })
   

</script>
@endpush
