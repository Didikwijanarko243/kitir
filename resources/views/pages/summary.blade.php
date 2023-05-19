@extends('layout.main')
@section('content')
    @livewire('page-heading', ['link' => 'Summary Data', 'sidebar' => 'summary'], key(time()))
    @livewire('summary', key($user->id))
    
@endsection
