{{$key}}

    <div class='form-control attach_loader'>
        {!! Form::text('tmdb_movie', "", ["class" => "tmdb_autocomplete"]) !!}
        <span class='tmdb_autocomplete_loader'><img src='/assets/images/bounce_ball_red.gif' /></span>
    </div>