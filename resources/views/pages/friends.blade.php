@extends('layouts.default')

@section('page-title')
Connect With Friends
@stop

@push('page-css')
    {{-- start: CSS REQUIRED FOR THIS PAGE ONLY --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/css/friends.css') }}">
    {{-- end: CSS REQUIRED FOR THIS PAGE ONLY --}}
@endpush()

@push('page-js')
    {{-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
    <script src="{{ URL::asset('assets/js/jquery.autocomplete.js') }}"></script>
    <script src="{{ URL::asset('assets/js/friends.js') }}"></script>
    {{-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY --}}
@endpush()

@section('content')
<h1>Friends and Such</h1>

<div class='well'>
    <div class="row">
        <div class="col-sm-6">
            <fieldset>
                <legend><i class='glyphicon glyphicon-envelope'></i> Find Friends by Email</legend>

                {!! Form::label('friends_emails', 'Friends Email') !!}

                <div class="input-group">
                    @include('snippets.input_loader', [
                        'il_input_name'=>'friends_emails',
                        'il_class'=> 'get_friends',
                        'il_span_class'=> 'friend_email_loader',
                    ])
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