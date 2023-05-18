@extends('layout.main')
@section('content')
    @livewire('page-heading', ['link' => 'Summary Data', 'sidebar' => 'summary'], key(time()))
@endsection
