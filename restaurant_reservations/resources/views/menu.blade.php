@extends('layouts.app')

@section('content')
   <h1 class="text-center">Restaurant x</h1>
   <div class="vh-100">
   @include('includes.menuInclude')
</div>
@endsection

@section('footer')
   @include('includes.footerInclude')
@endsection