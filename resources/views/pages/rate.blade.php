@extends('layouts.default')
@section('content')

<!--    {!! Form::open(array('url' => 'save_rating')) !!}
        {!! Form::label('movie', 'Movie Title') !!}
        {!! Form::text('Movie Title'); !!}
        {!! Form::submit('Add'); !!}
        
    {!! Form::close() !!}-->
    
<h1>Rate Movies</h1>

<div class='well'>
    {!! Form::open(array('url' => 'save_rating', 'class' => 'form-horizontal')) !!}
    <fieldset>
        <legend><i class='glyphicon glyphicon-film'></i> Movie Title</legend>
        <div class="row">
            <div class="col-md-6">

                <div>
                    {!!Form::text('title', '', ["class"=>"form-control", "placeholder" => "Start Typing Movie Title Here"]) !!}
                </div>
            </div>
        </div>
    </fieldset>
</div>

<div class='well'>
    <fieldset>
        <legend><i class='glyphicon glyphicon-barcode'></i> Rating Info</legend>

        <div class="row">
            <div class="col-md-3">
                {!! Form::label('score', 'Score') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!!Form::number('score', '', ["class"=>"form-control", "placeholder" => "Scale 1-100"]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('date', 'Date Watched') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!!Form::date('experience', '', ["class"=>"form-control"]) !!}
            </div>
        </div>


        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('experience', 'Experience') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!!Form::text('', '', ["class"=>"form-control", "placeholder" => "Home, Theater.... "]) !!}
            </div>
        </div>
        
        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('mood', 'Mood') !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('with', 'Watched With') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {!!Form::text('mood', '', ["class"=>"form-control", "placeholder" => "Happy, Sad.... "]) !!}
            </div>
            <div class="col-md-3">
                {!!Form::text('with', '', ["class"=>"form-control", "placeholder" => "SO, friend, Mom.... "]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!!Form::submit('Rate Movie', ["class"=>"btn btn-primary btn-sm"])!!}
            </div>
        </div>

        {!! Form::close() !!}
    </fieldset>
</div>

<div class='well'>
Put the Social Network stuff here
</div>


@stop