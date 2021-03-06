@extends('layouts.default')
@section('content')

<div class="row ">
    <div class="col-md-6 ">
        <div class='well '>



            {!! Form::open(array('url' => '/register', 'class' => 'form-horizontal')) !!}
                <fieldset>
                    <legend><i class='glyphicon glyphicon-user'></i> Register</legend>


                    <div class="row ">
                        <div class="col-md-11">
                            {!! Form::label('first_name', 'First Name') !!}
                            {!! Form::text('first_name', old("first_name"), ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('last_name', 'Last Name') !!}
                            {!! Form::text('last_name', old("last_name"), ["class" => "form-control"]) !!}
                        </div>
                    </div>

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
                            {!!Form::submit('Register', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                        </div>
                    </div>

                </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@stop