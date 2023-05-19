 @extends('layout.main')
 @section('content')
     <!-- Page Heading -->
     @livewire('page-heading', ['link' => 'Home', 'sidebar' => 'home'], key(time()))

     
 @endsection
