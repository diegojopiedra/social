@foreach ($tweets as $tweet)
    <div class="mb-3">
        @component('social.components.tweet', ['tweet' => $tweet])
        @endcomponent
    </div>
@endforeach