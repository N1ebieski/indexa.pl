@if ($links->isNotEmpty())
    @foreach ($links as $link)
        {!! $link->link_as_html !!} |
    @endforeach
@endif
