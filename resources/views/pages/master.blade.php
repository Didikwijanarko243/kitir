@extends('layout.main')
@section('content')
    @livewire('page-heading', ['link' => 'Import Data', 'sidebar' => 'master'], key(time()))

    <div class="row">

        <!-- Area Chart -->

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            @livewire('form-upload', key(time()))
        </div>
        <div class="col-xl-8 col-lg-7">
            @livewire('histori-upload', key(time()))
        </div>
    </div>
@endsection
