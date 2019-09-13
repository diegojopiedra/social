<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    protected $primaryKey = 'tag';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function tweets() {
        return $this->belongsToMany('App\Tweet', 'hash_tags_tweets', 'tag', 'tweet_id')->orderBy('id', 'DESC');
    }
}
