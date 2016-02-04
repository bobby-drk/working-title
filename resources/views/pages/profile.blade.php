@extends('layouts.default')
@section('content')

<h1>Profile</h1>

<div class='well'>
    {!! Form::open(array('url' => 'profile/save_data', 'class' => 'form-horizontal')) !!}
        <fieldset>
            <legend><i class='glyphicon glyphicon-user'></i> Your Data</legend>

            <div class="row">
                <div class="col-md-2">
                    {!! Form::label('first_name', 'First Name') !!}
                    {!!Form::text('first_name', $user['first_name'], ["class" => "form-control"]) !!}
                </div>

                <div class="col-md-2">
                    {!! Form::label('last_name', 'Last Name') !!}
                    {!!Form::text('last_name', $user['last_name'], ["class" => "form-control"]) !!}
                </div>

            </div>

            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!! Form::label('email', 'Email Address') !!}
                    {!!Form::email('email', $user['email'], ["class" => "form-control"]) !!}
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
    {!! Form::open(array('url' => 'profile/change_password', 'class' => 'form-horizontal')) !!}
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
                    {!! Form::label('new', 'New Password') !!}
                    {!!Form::password('new', ["class" => "form-control"]) !!}
                </div>
            </div>


            <div class="row vertical_offset_s">
                <div class="col-md-4">
                    {!! Form::label('confirm', 'Confirm Password') !!}
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