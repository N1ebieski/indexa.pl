<?php

namespace App\Seeds\CSV\Jobs;

use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\Dir;
use Illuminate\Bus\Queueable;
use N1ebieski\IDir\Models\User;
use N1ebieski\IDir\Models\Group;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use N1ebieski\ICore\Models\Tag\Tag;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\LazyCollection;
use Illuminate\Queue\InteractsWithQueue;
use N1ebieski\IDir\Models\Region\Region;
use N1ebieski\IDir\Models\Field\Dir\Field;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use N1ebieski\IDir\Models\Category\Dir\Category;
use N1ebieski\IDir\Services\User\AutoUserFactory;

class DirsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Undocumented variable
     *
     * @var int
     */
    protected const MAX_TAGS = 50000;

    /**
     * Undocumented variable
     *
     * @var Collection
     */
    protected $items;

    /**
     * Undocumented variable
     *
     * @var Dir
     */
    protected $dir;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 10;

    /**
     * Undocumented function
     *
     * @param LazyCollection $items
     */
    public function __construct(LazyCollection $items)
    {
        $this->items = $items;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function handle() : void
    {
        $defaultRegions = Region::all();
        $defaultFields = [];
        $defaultFields['regions'] = Field::where('type', 'regions')->first(['id']);
        $countTags = Tag::count();

        $this->items->each(function ($item) use ($defaultRegions, $defaultFields, $countTags) {
            if (!$this->verify($item)) {
                return;
            }

            DB::transaction(function () use ($item, $defaultRegions, $defaultFields, $countTags) {
                $dir = Dir::make();

                $dir->title = $item['title'];
                $dir->content_html = $dir->content = static::description($item['description']);
                $dir->url = static::url($item['url']);
                $dir->status = Dir::INACTIVE;
                $dir->created_at = $dir->updated_at = static::date();

                $dir->group()->associate(Group::DEFAULT);

                $dir->user()->associate(
                    !empty(static::email($item['email'])) ?
                        (
                            User::firstWhere('email', static::email($item['email']))
                            ?? App::make(AutoUserFactory::class, ['email' => static::email($item['email'])])->makeUser()
                        )
                        : null
                );

                $dir->save();

                if (!empty($item['keywords']) && $countTags < static::MAX_TAGS) {
                    $dir->tag(
                        collect(explode(',', static::keywords($item['keywords'])))
                            ->filter(function ($item) {
                                return !is_null($item) && strlen($item) <= 30;
                            })
                    );
                }

                if (!empty($item['url'])) {
                    $dir->status()->create([
                        'attempted_at' => Carbon::now()->subDays(rand(1, 45))
                    ]);
                }

                if (!empty($item['nip'])) {
                    $dir->gus()->create([
                        'attempted_at' => null
                    ]);
                }

                $ids = array();

                foreach (Config::get('idir.field.gus') as $name => $id) {
                    if (is_integer($id) && !empty($item[$name])) {
                        switch ($name) {
                            case 'regions':
                                $value = $defaultRegions->whereIn(
                                    'name',
                                    collect(explode(',', $item[$name]))
                                        ->map(function ($item) {
                                            return ucfirst($item);
                                        })
                                        ->toArray()
                                )
                                ->pluck('id')->toArray();

                                $id = $defaultFields['regions']->id;
                                $dir->regions()->sync($value);
                                break;

                            default:
                                $value = $item[$name];
                        }

                        $ids[$id] = [
                            'value' => json_encode($value)
                        ];
                    }
                }

                $dir->fields()->attach($ids ?? []);

                $dir->categories()->attach(
                    Category::firstWhere('name', $item['category'])
                );
            });
        });
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        //
    }

    /**
     * Undocumented function
     *
     * @param string $description
     * @return string
     */
    protected static function description(string $description = null) : string
    {
        return !empty($description) ? $description : " ";
    }

    /**
     * Undocumented function
     *
     * @param string $keywords
     * @return string|null
     */
    protected static function keywords(string $keywords = null) : ?string
    {
        if (!empty($keywords)) {
            return Config::get('icore.tag.normalizer') !== null ?
                Config::get('icore.tag.normalizer')($keywords)
                : $keywords;
        }

        return null;
    }

    /**
     * Undocumented function
     *
     * @param string $url
     * @return string|null
     */
    protected static function url(string $url = null) : ?string
    {
        return !empty($url) ? mb_strtolower($url) : null;
    }

    /**
     * Undocumented function
     *
     * @param string $email
     * @return string|null
     */
    protected static function email(string $email = null) : ?string
    {
        return !empty($email) ? mb_strtolower(trim($email)) : null;
    }

    /**
     * Undocumented function
     *
     * @return DateTime
     */
    protected static function date() : DateTime
    {
        return Carbon::now()->subDays(rand(0, 365*2));
    }

    /**
     * Undocumented function
     *
     * @param array $item
     * @return boolean
     */
    protected static function verify(array $item) : bool
    {
        $dir = Dir::where('title', $item['title'])
            ->when(!empty($item['url']), function ($query) use ($item) {
                $query->orWhere('url', mb_strtolower($item['url']));
            })
            ->first();

        $nip = null;

        if ($dir === null && !empty($item['nip'])) {
            $nip = DB::table('fields_values')
                ->whereJsonContains('value', $item['nip'])
                ->where('field_id', '=', Config::get('idir.field.gus.nip'))
                ->where('model_type', '=', Dir::make()->getMorphClass())
                ->first();
        }

        return $dir === null && $nip === null;
    }
}
