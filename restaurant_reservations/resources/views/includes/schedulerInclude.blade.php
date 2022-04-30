<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make a reservation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Make Reservation</button>
        </div>
      </div>
    </div>
  </div>



    <div class="container" id="makeReservation">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">Napravi rezervaciju za restoran (ime restorana)</h1>
                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#calendar').fullCalendar({
              contentHeight: 'auto',
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: [
                    {
                    title  : 'reservation1',
                    start  : '2022-04-01'
                    },
                    {
                    title  : 'reservation2',
                    start  : '2022-04-05',
                    end    : '2022-04-05'
                    },
                    {
                    title  : 'reservation3',
                    start  : '2022-04-09T12:30:00',
                    allDay : false // will make the time show
                    }
                ],
                defaultView: 'agendaWeek',
                allDaySlot: false,
                minTime:"08:00:00",
               
                selectable: true,
                selectHelper:true,
                select: function(start,end,allDays){
                    $('#reservationModal').modal('toggle');
                }
                                
            })
        });
    </script>