@extends('layouts.default')
@section('content')
@section('page-title')
Movie Example
@stop

@push('page-css')
    {{-- start: CSS REQUIRED FOR THIS PAGE ONLY --}}
    {{-- end: CSS REQUIRED FOR THIS PAGE ONLY --}}
@endpush()

@push('page-js')
    {{-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
    <script src="{{ URL::asset('assets/js/plugins/themoviedb.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/movie_example.js') }}"></script>
    {{-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
@endpush()


@section('content')

@include('smidgen.input_loader', ['key'=>'value'])
@include('smidgen.input_loader', ['key'=>'value2'])
@include('smidgen.input_loader', ['key'=>'value3'])




@stop