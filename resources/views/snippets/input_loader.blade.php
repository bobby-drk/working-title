<?php
/**
 * il_input_name(Required)    => INPUT NAME - name attribute of the input
 * il_class(Optional)         => INPUT CLASS - potentially used to initiate autocomplte
 * il_span_class(Optional)      => SPAN CLASS - Needed to hide/show gif
 * il_gif_src(Optional)       => IMAGE URL  - used to change the loading gif (red ball by default)
 *
 */
?>
<div class='form-control attach_loader'>
    {!! Form::text($il_input_name, "", ["class" => "il_input_snippet ". @$il_class]) !!}
    <span class='il_span_snippet {{ @$il_span_class }}'><img src={{ isset($il_gif_src) ? $il_gif_src : '/assets/images/bounce_ball_red.gif'}} /></span>
</div>