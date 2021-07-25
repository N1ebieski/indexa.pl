10:29:00

<div class="card border-primary mb-3" style="max-width: 100%;">
  <div class="card-header">Header</div>
  <div class="card-body text-primary">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
<div class="card-header">Header</div>
  <div class="card-body text-primary">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>






<div>
    @if (isset($value['title']) && $value['title'] !== null)
    <p>
        <span class="summary">{{ trans('idir::dirs.title') }}:</span><br>
        <span><h3>{{ $value['title'] }}</h3></span>
		<hr>
    </p>
    @endif
    @if (isset($value['content_html']) && $value['content_html'] !== null)
    <p>
        <span class="summary">{{ trans('idir::dirs.content') }}:</span><br>
        <span>
            {!! $group->hasEditorPrivilege() ? 
                $value['content_html'] 
                : nl2br(e($value['content_html'])) 
            !!}
        </span>
    </p>
    @endif
    @if (isset($value['notes']) && $value['notes'] !== null)
    <p>
        <span class="summary">{{ trans('idir::dirs.notes') }}:</span><br>
        <span>{{ $value['notes'] }}</span>
    </p>
    @endif
    @if (isset($value['tags']) && $value['tags'] !== null)
    <p>
        <span class="summary">{{ trans('idir::dirs.tags.label') }}:</span><br>
        <span>{{ implode(', ', $value['tags']) }}</span>
    </p>
    @endif
    @if (isset($value['url']) && $value['url'] !== null)
    <p>
        <span class="summary">{{ trans('idir::dirs.url') }}:</span><br>
        <span>
            <a 
                href="{{ $value['url'] }}" 
                target="_blank"
                rel="noopener"
            >
                {{ $value['url'] }}
            </a>
        </span>
    </p>
    @endif
    @if ($categories->isNotEmpty())
    <div>
        <span class="summary">{{ trans('idir::dirs.categories') }}:</span><br>
        <ul class="pl-3">
        @foreach ($categories as $category)
            <li>
                @if ($category->ancestors->count() > 0)
                @foreach ($category->ancestors as $ancestor)
                <span>{{ $ancestor->name }} &raquo;</span>
                @endforeach
                @endif
                <strong>{{ $category->name }}</strong>
            </li>
        @endforeach
        </ul>
    </div>
    @endif
    @if ($group->fields->isNotEmpty())
    <div>
    @foreach ($group->fields as $field)
        @if (isset($value['field'][$field->id]) && !empty($value['field'][$field->id]))
            <p>
                <span class="summary">{{ $field->title }}:</span><br>
                <span>
                @switch($field->type)
                    @case('input')
                    @case('textarea')
                    @case('select')
                        {{ $value['field'][$field->id] }}
                        @break;

                    @case('multiselect')
                    @case('checkbox')
                        {{ implode(', ', $value['field'][$field->id]) }}
                        @break;

                    @case('regions')
                        {{ implode(', ', $regions->whereIn('id', $value['field'][$field->id])->pluck('name')->toArray()) }}
                        @break;

                    @case('map')
                        @render('idir::map.dir.mapComponent', [
                            'coords_marker' => [
                                [$value['field'][$field->id][0]['lat'], $value['field'][$field->id][0]['long']]
                            ]
                        ])
                        @break;                        

                    @case('image')                    
                        <img 
                            class="img-fluid" 
                            src="{{ app('filesystem')->url($value['field'][$field->id]) }}"
                        >
                        @break
                @endswitch
                </span>
            </p>
        @endif
    @endforeach
    </div>
    @endif
</div>
	