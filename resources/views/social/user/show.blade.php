@extends('layouts.app')
{{-- @section('title', $user->name . ' ' . $user->lastname) --}}
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                @component('social.components.user_card', [
                    'user' => $user,
                ])
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                @component('social.components.tweets', ['tweets' => $user->tweets])
                @endcomponent
            </div>
        </div>
    </div>
@endsection