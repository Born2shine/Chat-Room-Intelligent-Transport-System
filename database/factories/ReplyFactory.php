<?php

use Faker\Generator as Faker;
use App\User;
use App\MOdel\Question;

$factory->define(App\MOdel\Reply::class, function (Faker $faker) {
    return [
        'body'=> $faker->text,
        'question_id' => function(){
            return Question::all()->random();
        },
        'user_id' => function(){
            return User::all()->random();
        }
    ];
});
