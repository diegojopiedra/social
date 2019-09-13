<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\HashTag;

class WallController extends Controller
{
    public function index() {
        $user = Auth::user();
        $tweets = $user->follow_tweets()->paginate(20, ['*'], 'pagina');

        return view('social.wall', [
            'user' => $user,
            'tweets' => $tweets
        ]);
    }

    public function hashtag($hashtag){
        $hash = HashTag::find($hashtag);
        if(isset($hash) && $hash->count()){
            return view('social.hashtag', [
                'tweets' => $hash->tweets,
                'hashtag' => $hashtag
            ]);
        }else{
            return redirect(route('wall'));
        }
        
    }
}
