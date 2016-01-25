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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11">
                            {!! Form::text('email', '', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row vertical_offset_s">
                        <div class="col-md-11">
                            {!! Form::label('password', 'Password') !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11">
                            {!!Form::password('password', ["class" => "form-control"]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-11">

                            {!! Form::checkbox('remember', '', '', array('id'=>'remember_me')) !!}
                            {!! Form::label('remember_me', 'Remember Me') !!}

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
            <h3>Login using Social Media account</h3>
            <div><a href='{{ route("fb_login") }}'><img src='/assets/images/social_media_icons/facebook.png' /></a></div>
        </div>
    </div>
</div>

@stop