<div class="card border-0">
    <div class="card-body">
        @component('social.components.user', ['user' => $comment->user, 'time_ago' => $comment->created_at])
        @endcomponent
        <p class="mb-0">
            @component('social.components.special_text', ['text' => $comment->text]) 
            @endcomponent
        </p>
    </div>
</div>