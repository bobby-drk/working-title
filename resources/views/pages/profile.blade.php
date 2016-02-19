@extends('layouts.default')
@section('content')

<script type="text/javascript">
$(document).ready(function(){
    alert("Working");
    $(".tip-top").tooltip({placement : 'top'});
    $(".tip-right").tooltip({placement : 'right'});
    $(".tip-bottom").tooltip({placement : 'bottom'});
    $(".tip-left").tooltip({ placement : 'left'});
});
</script>


<h1>Profile</h1>

<div class='well'>
    {!! Form::open(array('url' => 'profile/save_data', 'class' => 'form-horizontal')) !!}
        <fieldset>
            <legend><i class='glyphicon glyphicon-user'></i> Your Data</legend>

            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('first_name', 'First Name') !!}
                    {!! Form::text('first_name', $user->first_name, ["class" => "form-control"]) !!}
                </div>

                <div class="col-md-2">
                    {!! Form::label('last_name', 'Last Name') !!}
                    {!! Form::text('last_name', $user->last_name, ["class" => "form-control"]) !!}
                </div>

            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!! Form::label('email', 'Email Address') !!}
                    {!!Form::email('email', $user->email, ["class" => "form-control"]) !!}
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!!Form::submit('Save', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                </div>
            </div>

        </fieldset>
    {!! Form::close() !!}
</div>

<div class='well'>
    {!! Form::open(array('url' => 'change_password', 'class' => 'form-horizontal')) !!}
        <fieldset>
            <legend><i class='glyphicon glyphicon-lock'></i> Change Password</legend>

            <div class="row">
                <div class="col-md-4">
                    {!! Form::label('current', 'Current Password') !!}
                    {!!Form::password('current', ["class" => "form-control"]) !!}
                </div>
            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!! Form::label('password', 'New Password') !!}
                    {!!Form::password('password', ["class" => "form-control"]) !!}
                </div>
            </div>


            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!!Form::password('password_confirmation', ["class" => "form-control"]) !!}
                </div>
            </div>


            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!!Form::submit('Change', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                </div>
            </div>
        </fieldset>
    {!! Form::close() !!}

</div>

<div class='well'>
    <legend><i class='glyphicon glyphicon-dashboard'></i> Social Networks</legend>

    <div class="row vertical_offset_s">

        @foreach($providers as $i => $provider_data)
            <div class="col-md-1">
                <a href="#" data-toggle="tooltip" data-placement="left" title="Tooltip on left"><img src='/assets/images/social_media_icons/{{ $provider_data->provider_safe_name }}68x68{{ $provider_data->owned ? '' : '_gray' }}.png'></a>
            </div>
        @endforeach

    </div>


</div>


@stop