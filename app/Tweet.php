<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('id', 'DESC');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function hashTags() {
        return $this->belongsToMany('App\HashTag', 'hash_tags_tweets', 'tweet_id', 'tag');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
