@extends('layouts.app')
{{-- @section('title', '#' . $hashtag) --}}
@section('content')
    <div class="container">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            @component('social.components.tweets', ['tweets' => $tweets])
            @endcomponent
        </div>
    </div>
@endsection