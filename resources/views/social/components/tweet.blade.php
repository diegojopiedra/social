<div class="tweet">
    <div class="card">
        <div class="card-header">
            @component('social.components.user', ['user' => $tweet->user, 'time_ago' => $tweet->created_at])
            @endcomponent
        </div>
        <div>
            @component('social.components.images', ['photos' => $tweet->photos]) 
            @endcomponent
        </div>
        <div class="card-body">
            @component('social.components.special_text', ['text' => $tweet->text]) 
            @endcomponent
        </div>
        <div class="card-footer">
            
            @php
                $likeme = $tweet->likes->map( function($e) {
                    return $e->user_id;
                });
                $likeme = $likeme->contains(Auth::user()->id);
            @endphp
            <like-btn :num="{{ count($tweet->likes) }}" init="{{ $likeme }}" url="{{ route('like', ['id' => $tweet->id]) }}">
                <i class="fas fa-heart"></i>
            </like-btn>
            <a href="{{ route('tweet.show', ['id' => $tweet->id]) }}" class="card-link text-primary">
                {{ count($tweet->comments) }} <i class="fas fa-comments"></i>
            </a>
        </div>
    </div>
    
</div>