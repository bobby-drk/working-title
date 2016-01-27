@extends('layouts.default')
@section('content')
    {!! Form::open(array('url' => 'save_rating')) !!}
        {!! Form::label('movie', 'Movie Title') !!}
        {!! Form::text('Movie Title'); !!}
        {!! Form::submit('Add'); !!}
        
    {!! Form::close() !!}
    
<h1>Profile</h1>

<div class='well'>
    {!! Form::open(array('url' => 'save_rating', 'class' => 'form-horizontal')) !!}
    <fieldset>
        <legend><i class='glyphicon glyphicon-film'></i>Movie Title</legend>

        <div class="row">
            <div class="col-md-4">
            {!! Form::label('Movie', 'Movie Title') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div>
                    {!!Form::text('title', '', ["class"=>"form-control", "placeholder" => "Start Typing Title Here"]) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </fieldset>
</div>

<div class='well'>
    {!! Form::open(array('url' => 'profile/change_password', 'class' => 'form-horizontal')) !!}
    <fieldset>
        <legend><i class='glyphicon glyphicon-lock'></i> Change Password</legend>

        <div class="row">
            <div class="col-md-4">
                {!! Form::label('current', 'Current Password') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {!!Form::password('current', ["class" => "form-control"]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-4">
                {!! Form::label('new', 'New Password') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {!!Form::password('new', ["class" => "form-control"]) !!}
            </div>
        </div>


        <div class="row vertical_offset_s">
            <div class="col-md-4">
                {!! Form::label('confirm', 'Confirm Password') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                {!!Form::password('confirm', ["class" => "form-control"]) !!}
            </div>
        </div>


        <div class="row vertical_offset_s">
            <div class="col-md-4">
                {!!Form::submit('Change', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
            </div>
        </div>

        {!! Form::close() !!}
    </fieldset>
</div>

<div class='well'>
Put the Social Network stuff here
</div>


@stop