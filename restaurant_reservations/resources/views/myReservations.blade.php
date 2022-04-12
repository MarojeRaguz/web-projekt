@extends('layouts.app')

@section('content')
   <h1 class="text-center">My reservations</h1>
   <div class="vh-100">
      @include('includes.myReservationInclude')
   </div>
   
@endsection

@section('footer')
   @include('includes.footerInclude')
@endsection