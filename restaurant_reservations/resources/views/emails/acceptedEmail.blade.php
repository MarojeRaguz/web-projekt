<div>
    Dear, {{ $user->name }} <br>
    Your reservation: {{ $reservation->startTime }} to {{ $reservation->endTime }} has been accepted.
    <br>
    Sincerely, <br>
    {{ $restaurant->name }}
</div>