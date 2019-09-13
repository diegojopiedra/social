<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\HashTag;
use App\Like;
use App\Comment;
use App\Photo;

class TweetController extends Controller
{
    public function index(){
        $tw = Tweet::all();
        foreach ($tw as $t) {
            $t->hashTags;
        }
        return response()->json($tw);
    }

    public function store(Request $request){

        $tweet = new Tweet();
        $tweet->text = $request->text;
        $tweet->user_id = Auth::user()->id;
        $tweet->save();

        if($request->has('images')){
            $urls = array();
            $imgs = $request->file('images');
            foreach ($imgs as $img) {
                array_push($urls, new Photo(['url' => $img->store('public')]) );
            }
            $tweet->photos()->saveMany($urls);
        }

        preg_match_all('/\B(\#[a-zA-Z0-9]+\b)(?!;)/', $request->text, $output_array);

        $hashtags = $output_array[0];


        foreach ($hashtags as $h) {
            $h = substr($h, 1);
            $hashtag = HashTag::find($h);

            if($hashtag == null){
                $hashtag = new HashTag();
                $hashtag->tag = $h;
                $hashtag->save();
            }
            $tweet->hashTags()->save($hashtag);
            
        }
        $tweet->hashTags;

        // return response()->json($tweet);
        return redirect(route('wall'));
    }

    public function like(Request $request, $id){
        $user = Auth::user();
        $tweet = Tweet::find($id);

        if(isset($user) && isset($tweet)){
            $like = Like::where('tweet_id', $id)->where('user_id', $user->id)->first();

            if(isset($like)){
                $like->delete();
            }else{
                $like = new Like();
                $like->user_id = $user->id;
                $like->tweet_id = $id;
                $like->save();
            }
        }

        return back();
    }

    public function show(Request $request, $id){
        $tweet = Tweet::find($id);

        if(isset($tweet)){
            return view('social.tweet', ['tweet' => $tweet]);
        }

        return back();
    }

    public function comment(Request $request, $id){
        $user = Auth::user();
        $tweet = Tweet::find($id);

        if(isset($tweet)){
            $text = $request->text;
            if(isset($text) && trim($text) != ''){
                $comment = new Comment();
                $comment->text = $text;
                $comment->tweet_id = $tweet->id;
                $comment->user_id = $user->id;
                $comment->save();
            }
        }

        return back();
    }
}
