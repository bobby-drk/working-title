<?php

namespace App\Services;


use App\Models\UserProvider;
use App\User;


class SocialNetwork
{
    static function process_network($user, $local_user)
    {

        if(count($local_user)) {
            $local_user = $local_user->user()->first();
        } else {

            $local_user = User::where('email', $user['email'])->first();

            //not found by email either
            if(!count($local_user)) {

                //create user
                $local_user = User::create([
                    'first_name' => $user['name'],
                    'email'=> $user['email']
                ]);

                UserProvider::create([
                    'provider_id' => 1,  //FB is first provider
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);

            } else {
                //update user with
                UserProvider::create([
                    'provider_id' => 1,
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);
            }

        }

        return $local_user;

    }
}