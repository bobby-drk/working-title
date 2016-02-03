@extends('layouts.default')
@section('content')

<!--    {!! Form::open(array('url' => 'save_rating')) !!}
        {!! Form::label('movie', 'Movie Title') !!}
        {!! Form::text('Movie Title'); !!}
        {!! Form::submit('Add'); !!}
        
    {!! Form::close() !!}-->


// With JQuery
$("#ex6").slider();
$("#ex6").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
});
    
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
                {!!Form::number('score', '', ["class"=>"form-control", "placeholder" => "Scale 1-100"]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('date', 'Date Watched') !!}
                {!!Form::date('date', '', ["class"=>"form-control"]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('experience', 'Experience') !!}
                {!!Form::text('experience', '', ["class"=>"form-control", "placeholder" => "Home, Theater.... "]) !!}
            </div>
        </div>
        
        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('mood', 'Mood') !!}
                {!!Form::text('mood', '', ["class"=>"form-control", "placeholder" => "Happy, Sad.... "]) !!}
            </div>
        </div>
        
        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!! Form::label('with', 'Watched With') !!}
                {!!Form::text('with', '', ["class"=>"form-control", "placeholder" => "SO, friend, Mom.... "]) !!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                {!!Form::submit('Rate Movie', ["class"=>"btn btn-primary btn-sm"])!!}
            </div>
        </div>

        <div class="row vertical_offset_s">
            <div class="col-md-3">
                <input id="ex6" type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="3">
                <span id="ex6CurrentSliderValLabel">Current Slider Value: <span id="ex6SliderVal">3</span></span>

            </div>
        </div>
        
    </fieldset>
</div>


@stop