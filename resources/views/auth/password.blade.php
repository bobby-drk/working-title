@extends('layouts.default')
@section('content')

<div class="row ">
    <div class="col-md-6 ">
        <div class='well '>


            {!! Form::open(array('url' => '/register', 'class' => 'form-horizontal')) !!}
                <fieldset>
                    <legend><i class='glyphicon glyphicon-envelope'></i> Forgot Password</legend>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', old("email"), ["class" => "form-control"]) !!}
                        </div>
                    </div>


                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!!Form::submit('Send Password Reset Link', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                        </div>
                    </div>

                </fieldset>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@stop