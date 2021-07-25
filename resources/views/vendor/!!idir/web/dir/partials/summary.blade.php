   @if (isset($value['title']) && $value['title'] !== null)
   <!----03:04:20--->
   <div class="card" style="max-width: max;">
       <h5 class="card-header">{{ trans('idir::dirs.title') }}:</h5>
       <div class="card-body">
           <h4 class="card-title">{{ $value['title'] }}</h4>
       </div>
       @endif


       @if (isset($value['content_html']) && $value['content_html'] !== null)
       <h5 class="card-header">{{ trans('idir::dirs.content') }}:</h5>
       <div class="card-body">
           <p class="card-text">
               {!! $group->hasEditorPrivilege() ?
               $value['content_html']
               : nl2br(e($value['content_html']))
               !!}
           </p>
       </div>
       @endif

       @if (isset($value['notes']) && $value['notes'] !== null)
       <h5 class="card-header">{{ trans('idir::dirs.notes') }}:</h5>
       <div class="card-body">
           <p class="card-text">
               {{ $value['notes'] }}
           </p>
       </div>
       @endif

       @if (isset($value['tags']) && $value['tags'] !== null)
       <h5 class="card-header">{{ trans('idir::dirs.tags.label') }}:</h5>
       <div class="card-body">
           <p class="card-text">
               {{ implode(', ', $value['tags']) }}
           </p>
       </div>
       @endif

       @if (isset($value['url']) && $value['url'] !== null)
       <h5 class="card-header">{{ trans('idir::dirs.url') }}:</h5>
       <div class="card-body">
           <p class="card-text">
               <a href="{{ $value['url'] }}" target="_blank" rel="noopener">
                   {{ $value['url'] }}
               </a>
           </p>
       </div>
       @endif

       @if ($categories->isNotEmpty())
       <h5 class="card-header">{{ trans('idir::dirs.categories') }}:</h5>
       <div class="card-body">
           <p class="card-text">
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
           </p>
       </div>
       @endif

       @if ($group->fields->isNotEmpty())
       @foreach ($group->fields as $field)
       @if (isset($value['field'][$field->id]) && !empty($value['field'][$field->id]))
       <h5 class="card-header">{{ $field->title }}:</h5>
       <div class="card-body">
           <p class="card-text">
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
                   <img class="img-fluid" src="{{ app('filesystem')->url($value['field'][$field->id]) }}">
                   @break
                   @endswitch
               </span>
           </p>
       </div>
       @endif
       @endforeach
   </div>
   @endif
