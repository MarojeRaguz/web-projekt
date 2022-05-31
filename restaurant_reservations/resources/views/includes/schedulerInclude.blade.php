
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make a reservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p style="font-size: 20px" id="question">?</p>
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
              <h1 class="text-center mt-5">Napravi rezervaciju za {{ $restaurant->name }}</h1>
              <div class="col-md-11 offset-1 mt-5 mb-5">

                  <div id="calendar">

                  </div>

              </div>
          </div>
      </div>
  </div>

  <script>
      $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var reservations = @json($events)
       

          $('#calendar').fullCalendar({
            contentHeight: 'auto',
              header: {
                  left: 'prev, next today',
                  center: 'title',
                  right: 'month, agendaWeek, agendaDay',
              },
              events: reservations,
              defaultView: 'agendaWeek',
              allDaySlot: false,
              minTime:"08:00:00",
             
              selectable: true,
              selectHelper:true,
              select: function(start,end,allDays){

                  $('#reservationModal').modal('toggle');
                  var element = document.getElementById("question");
                    element.innerHTML = "Do you want to make reservation from " + moment(start).format('YYYY-MM-DD hh:mm') + " to " + moment(end).format('YYYY-MM-DD hh:mm') +"?" ;
                  $('#saveBtn').click(function(){
                    var startTime = moment(start).format('YYYY-MM-DD hh:mm');
                    var endTime = moment(end).format('YYYY-MM-DD hh:mm');
                    var restaurant_id={{ $restaurant->id }};
                    var status='pending';
                    var user_id = {{ Auth::user()->id }}
                    console.log(startTime)
                    $.ajax({
                      url:"{{ route('reservation.store') }}",
                      type:"POST",
                      dataType:'json',
                      data:{startTime,endTime,status,restaurant_id,user_id},
                      success:function(response){
                        $('#reservationModal').modal('hide')
                        $('#calendar').fullCalendar('renderEvent', {
                            'title': "{{Auth::user()->name  }}",
                            'start' : response.startTime,
                            'end'  : response.endTime,
                        });
                      },
                      error:function(error){
                        console.log(error)
                      }
                    });
                  })
              },
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                }
                              
          })
      });
  </script>