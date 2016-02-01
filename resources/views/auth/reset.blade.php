@extends('layouts.default')
@section('content')

<?php /*
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
*/?>


<div class="row ">
    <div class="col-md-6 ">
        <div class='well '>
            {!! Form::open(array('url' => '/password/reset', 'class' => 'form-horizontal')) !!}

                {!! Form::hidden('token', $token) !!}

                <fieldset>
                    <legend><i class='glyphicon glyphicon-lock'></i> New Password</legend>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', old("email"), ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                            {!! Form::password('password_confirmation', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!!Form::submit('Reset Password', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                        </div>
                    </div>

                </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@stop