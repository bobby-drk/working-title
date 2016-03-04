@extends('layouts.default')
@section('content')

<h1>Friends and Such</h1>

<div class='well'>
    <div class="row">
        <div class="col-sm-6">
            <fieldset>
                <legend><i class='glyphicon glyphicon-envelope'></i> Find Friends by Email</legend>

                {!! Form::label('friends_emails', 'Friends Email') !!}

                <div class="input-group">
                    <div class='form-control attach_loader'>
                        {!! Form::text('friends_emails', "", ["class" => "get_friends"]) !!}
                        <span class='friend_email_loader'><img src='/assets/images/bounce_ball_red.gif' /></span>
                    </div>
                    <span class="input-group-btn">
                        <button id='connect_friend' class="btn btn-default" type="button">Connect</button>
                    </span>
                </div>

            </fieldset>
        </div>
        <div class="col-sm-6">
            <fieldset class=''>
                <legend><i class='glyphicon glyphicon-user'></i> Current Friend List</legend>

                <div id='friend_connect_loader'><img src='/assets/images/large_loader_red.gif' /></div>

                <div id='message_controler_friends' class="alert alert-warning"></div>


                <ul class="list-group zebra" id='friend_list'>
                    @foreach ($friends as $friend)
                        <li class="list-group-item">
                            <span class='element_delete text-danger pull-right' data-id="{{$friend->id}}"><i class='glyphicon glyphicon-remove-sign'></i></span>
                            {{ $friend->first_name }} {{$friend->last_name}}
                        </li>

                    @endforeach
                </ul>
            </fieldset>

        </div>
    </div>
</div>


@stop