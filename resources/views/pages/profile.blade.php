@extends('layouts.default')
@section('content')

<h1>Profile</h1>

<div class='well'>
    {!! Form::open(array('url' => 'profile/save_email', 'class' => 'form-horizontal')) !!}
        <fieldset>
            <legend><i class='glyphicon glyphicon-envelope'></i> Change Email</legend>

            <div class="row">
                <div class="col-md-4">
                {!! Form::label('email', 'Email Address') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">

                    <div class="input-group">
                        {!!Form::email('email', 'set_email@here.com', ["class"=>"form-control"]) !!}
                        <span class="input-group-btn">
                        {!!Form::submit('Save', ["class"=>"btn btn-default "]) !!}
                        </span>
                    </div>
                </div>
            </div>
        </fieldset>
    {!! Form::close() !!}
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
        </fieldset>
    {!! Form::close() !!}

</div>

<div class='well'>
Put the Social Network stuff here
</div>


@stop