@extends('layouts.app')

@section('content')
   <h1 class="text-center">{{ $restaurant->name }}</h1>
   @include('includes.menuInclude')
   @include('includes.schedulerInclude')
@endsection

@section('footer')
   @include('includes.footerInclude')
@endsection
