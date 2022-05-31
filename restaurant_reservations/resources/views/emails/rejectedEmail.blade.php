<div>
    Dear, {{ $user->name }} <br>
    Your reservation: {{ $reservation->startTime }} to {{ $reservation->endTime }} has been rejected.
    <br>
    Sincerely, <br>
    {{ $restaurant->name }}
</div>