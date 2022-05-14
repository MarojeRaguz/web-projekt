<table class="table w-75 p-3 text-center m-auto">
  <thead class="table-dark">
    <th>#</th>
    @if (Auth::user()->role=="user")
      <th>Restaurant Name</th>
    @else
    <th>User Name</th>
    @endif
    <th>Date</th>
    <th>Options</th>
  </thead>
  <tbody>
  @if (Auth::user()->role=="user")
      @foreach ($reservations as $reservation)
        @if ($reservation->status=="accepted")
          <tr class="table-success">
        @elseif($reservation->status=="pending")
        <tr class="table-warning">
        @else
        <tr class="table-danger">
        @endif
        <td>{{ $reservation->id }}</td>
        <td>{{ $reservation->restaurant_id }}</td>
        <td>{{ $reservation->startTime }}</td>
        <td><button class="btn btn-danger" >cancel</button></td>
        </tr> 
      @endforeach
  @else
      @foreach ($reservations as $reservation)
        @if ($reservation->status=="accepted")
            <tr class="table-success">
            <td>{{ $reservation->id }}</td>
            <td>{{ $reservation->restaurant_id }}</td>
            <td>{{ $reservation->startTime }}</td>
            <td><button class="btn btn-danger invisible ">accept</button> <button class="btn btn-danger">cancel</button></td>
            </tr> 
        @elseif($reservation->status=="pending")
          <tr >
          <td>{{ $reservation->id }}</td>
          <td>{{ $reservation->restaurant_id }}</td>
          <td>{{ $reservation->startTime }}</td>
          <td><button class="btn btn-success " >accept</button> <button class="btn btn-danger" >cancel</button></td>
          </tr> 
        @else
          <tr class="table-danger">
          <td>{{ $reservation->id }}</td>
          <td>{{ $reservation->restaurant_id }}</td>
          <td>{{ $reservation->startTime }}</td>
          <td><button  class="btn btn-success" >accept</button> <button  class="btn btn-danger" >delete</button></td>
          </tr> 
        @endif
      
    @endforeach
  @endif
</tbody>
</table>