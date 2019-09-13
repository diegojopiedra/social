<div class="list-group">
    @foreach ($comments as $comment)
    <div class="list-group-item  p-0">
        @component('social.components.comment', ['comment' => $comment])
            {{ $comment->text }}
        @endcomponent
    </div>
    @endforeach
</div>