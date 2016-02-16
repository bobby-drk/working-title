@extends('layouts.default')
@section('content')

<!--    {!! Form::open(array('url' => 'save_rating')) !!}
        {!! Form::label('movie', 'Movie Title') !!}
        {!! Form::text('Movie Title'); !!}
        {!! Form::submit('Add'); !!}
        
    {!! Form::close() !!}-->


<script>
    $(function() {
    // Handler for .ready() called.

        $(".slider").slider();
        $("#ex6").on("slide", function(slideEvt) {
            $("#ex6SliderVal").text(slideEvt.value);
        });
    });
</script>

<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
<style> 
#panel, #flip {
    /*padding: 5px;*/
}

#panel {
    /*padding: 50px;*/
    display: none;
}
</style>

        
<div id='flip' class='well'>
    <fieldset>
        <legend><i class='glyphicon glyphicon-film'></i> Advanced Rating</legend>
    </fieldset>
</div>


<div id='panel'>
    <fieldset>
        <div class='well'>
            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('directing', 'Rate the Directing') !!}
                    <div>
                        {!!Form::text('directing', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('lead_actors', 'Rate the Leading Actors') !!}
                    <div>
                        {!!Form::text('lead_actors', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('supporting_cast', 'Rate the Supporting Cast') !!}
                    <div>
                        {!!Form::text('supporting_cast', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('other', 'Rate the Other Stuff') !!}
                    <div>
                        {!!Form::text('other', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('experience', 'Experience') !!}
                    <div>
                        {!!Form::text('experience', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-3">
                    {!! Form::label('mood', 'Mood') !!}
                    <div>
                        {!!Form::text('mood', '', ["class"=>"slider new_line", "data-slider-min"=>"0", "data-slider-max"=>"100", "data-slider-step"=>"1", "data-slider-value"=>"0"]) !!}
                    </div>
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
        </div>    
    </fieldset>
</div>


@stop