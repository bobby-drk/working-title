<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FriendController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Friend connection, seperation, display controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the connection of friends, as well as display a
    |    list of current friends. Controller contains multiple API functions
    |    that allow for autocomplete, connecting, and removing simple friends.
    |
    */



    /**
     * Loads a simple page that displays a function to add friends, and a list of current friends
     *
     * @return view
     */
    public function index()
    {
        $my_id = Auth::id();
        $data = [];
        $data['friends'] = User::find($my_id)->friends;
        // return  User::with('friends')->find($user->id);

        return view('pages.friends', $data);
    }


    /**
     * A function that will accept part of an email string and return an array of potential friends
     *
     * @return json array
     */
    public function find()
    {
        $response = [];
        $email = Input::get('email');
        $my_id = Auth::id();

        //do some error checking, strlen, strip spaces and quotes
        $email = preg_replace ( '/[^\\w@.-]/' , "" , $email);

        if(strlen($email) > 2) {

            // SELECT users.id, first_name, email
            // FROM users
            // LEFT JOIN simple_friends on users.id = my_friend AND user_id = 1
            // WHERE my_friend is null
            // AND users.id != 1
            // AND email like '%exam%'

            $matched_users = User::leftJoin('simple_friends', function ($join) use ($my_id) {
                $join->on('users.id', '=', 'my_friend')
                ->where('user_id', '=', $my_id);
                })
                ->whereNull('my_friend')
                ->where('users.id', '<>', $my_id)
                ->where('email', 'like', '%'. $email .'%')
                ->orderBy('first_name', 'desc')
                ->take(10)
                ->get();

            if (!empty($matched_users)) {
                $match_counter = 0;
                foreach($matched_users as $user) {
                    $response[$match_counter]['value'] = $user->first_name . " ". $user->last_name;
                    $response[$match_counter]['data'] =  $user->email;
                    $match_counter++;
                }
            }
        }

        return ["suggestions" => $response];
    }


    /**
     * validate friend request and connect user to logged in account
     *
     * @return json array
     */
    public function connect()
    {
        $data = [];

        $email = Input::get('email');
        //get auth user
        $my_id = Auth::id();
        //get user by email
        $friend = User::where('email', '=', $email)->first();

        if (count($friend)) {

            $current_friends = User::find($my_id)->friends;

            if (!$current_friends->contains($friend->id)) {

                //save friendship
                $new_friend = new Friend ();
                $new_friend->user_id = $my_id;
                $new_friend->my_friend = $friend->id;
                $new_friend->save();

            }
            $data['status']         = 1;
            $data['friends']        = User::find($my_id)->friends;
            $data['most_recent']    = $friend->id;

        } else {
            $data['status'] = 0;
            $data['message'] = "Error: Email not found";
        }

        return $data;

    }


    /**
     * A function that will accept a friend ID and removed them from user friend list
     *
     * @return json array
     */
    public function delete()
    {
        $my_id = Auth::id();
        $my_friend = Input::get('id');

        $friend = Friend::where('user_id', $my_id)->where('my_friend', $my_friend)->delete();

        $data['status'] = 1;
        $data['friend'] = $friend;

        return $data;
    }
}
