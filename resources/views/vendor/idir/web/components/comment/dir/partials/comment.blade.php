<div class="mb-3 p-3">
    <h4 class="h6 border-bottom pb-2"><i class="fa fa-angle-double-right"></i>
        <a 
            href="{{ route('web.dir.show', [$comment->morph->slug, '#comments']) }}"
            title="{{ $comment->morph->title }}"
        >
            {{ $comment->morph->title }}
        </a>
    </h4>

    <div class="d-flex mb-2">
        <small class="mr-auto"><i class="far fa-clock"></i> Dodano 
            {{ $comment->created_at_diff }}
        </small>
        @if ($comment->user)
        <small class="ml-auto text-right"><i class="far fa-user"></i>
            {{ $comment->user->name }}
        </small>
        @endif
    </div>
    <div>
        {{ $comment->content }}
    </div>
</div>
