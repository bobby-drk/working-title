@extends('layouts.default')
@section('content')

<div class='well'>
    <div class="row border-between ">
        <div class="col-md-6">

            {!! Form::open(array('url' => '/login', 'class' => 'form-horizontal')) !!}
                <fieldset>
                    <legend><i class='glyphicon glyphicon-lock'></i> Login</legend>

                    <div class="row">
                        <div class="col-md-11">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', '', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('password', 'Password') !!}
                            {!!Form::password('password', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">

                            {!! Form::checkbox('remember', '', '', array('id'=>'remember_me')) !!}
                            {!! Form::label('remember_me', 'Remember Me') !!}

                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            <div><a href='{{ route("forgot_pw") }}'>Forgot Password</a></div>
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!!Form::submit('Login', ["class"=>"btn btn-primary btn-sm pull-right"])!!}
                        </div>
                    </div>
                </fieldset>
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">

            <fieldset>
                    <legend> Login using Social Media account</legend>

                <div class="row vertical_offset_s">
                    <div class="col-md-12">
                        <div><a href='{{ route("oauth.connect", ["facebook", "login"]) }}'><img src='/assets/images/social_media_icons/facebook68x68.png' /></a></div>
                    </div>
                </div>

                <div class='row'>
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row vertical_offset_s">
                    <div class="col-md-12">
                        <div><a href='{{ route("register") }}'>Need an account?  Click Here.</a></div>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>
</div>

@stop