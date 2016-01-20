@extends('layouts.default')
@section('content')
    {!! Form::open(array('url' => 'foo/bar')) !!}
        {!! Form::label('email', 'E-Mail Address') !!}
    {!! Form::close() !!}
@stop