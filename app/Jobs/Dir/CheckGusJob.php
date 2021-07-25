<?php

namespace App\Jobs\Dir;

use Exception;
use GusApi\GusApi;
use App\Models\DirGus;
use GusApi\ReportTypes;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use GusApi\SearchReport as GusReport;
use App\Services\Factories\NipFactory;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs\Dir\Interfaces\GusReportInterface;
use Illuminate\Contracts\Config\Repository as Config;
use N1ebieski\IDir\Http\Responses\Data\Field\Value\ValueFactory;

class CheckGusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Delete the job if its models no longer exist.
     *
     * @var bool
     */
    public $deleteWhenMissingModels = true;

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $retryAfter = 5;

    /**
     * [protected description]
     * @var GusApi
     */
    protected $gusApi;

    /**
     * Undocumented variable
     *
     * @var GusReport
     */
    protected $gusReport;

    /**
     * [protected description]
     * @var DirGus
     */
    protected $dirGus;

    /**
     * Undocumented variable
     *
     * @var Carbon
     */
    protected $carbon;

    /**
     * Undocumented variable
     *
     * @var Config
     */
    protected $config;

    /**
     * Undocumented variable
     *
     * @var ValueFactory
     */
    protected $valueFactory;

    /**
     * Undocumented variable
     *
     * @var NipFactory
     */
    protected $nipFactory;

    /**
     * Create a new job instance.
     *
     * @param DirGus $dirGus
     * @return void
     */
    public function __construct(DirGus $dirGus)
    {
        $this->dirGus = $dirGus;
    }

    /**
     * [isAttempt description]
     * @return bool [description]
     */
    protected function isAttempt() : bool
    {
        return is_string($this->makeNip()) && (
            $this->dirGus->attempted_at === null ||
            $this->carbon->parse($this->dirGus->attempted_at)->lessThanOrEqualTo(
                $this->carbon->now()->subDays($this->config->get('indexa.gus.check_days'))
            )
        );
    }

    /**
     * Undocumented function
     *
     * @param GusApi $gusApi
     * @param NipFactory $nipFactory
     * @param ValueFactory $valueFactory
     * @param Carbon $carbon
     * @param Config $config
     * @return void
     */
    public function handle(
        GusApi $gusApi,
        NipFactory $nipFactory,
        ValueFactory $valueFactory,
        Carbon $carbon,
        Config $config
    ) : void {
        $this->gusApi = $gusApi;
        $this->carbon = $carbon;
        $this->config = $config;

        $this->nipFactory = $nipFactory;
        $this->valueFactory = $valueFactory;

        if ($this->isAttempt()) {
            $this->dirGus->makeRepo()->attemptedNow();

            $this->gusApi->login();
            $this->gusReport = $this->gusApi->getByNip($this->makeNip())[0];

            $this->updateFields();
            $this->updateTitle();
            $this->updateCreatedAt();
        }
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
     * @return void
     */
    protected function updateFields() : void
    {
        $data = [];

        foreach ($this->config->get('idir.field.gus') as $key => $value) {
            $id = $this->id($value);

            if ($id === null) {
                continue;
            }

            $gusValue = $this->makeValue($key);

            if (empty($gusValue)) {
                continue;
            }

            if (!isset($data[$id])) {
                $data[$id] = '';
            }

            if ($key === 'regions') {
                $data[$id] = (array)$gusValue;
            } else {
                $data[$id] .= $this->separator($value) . $gusValue;
            }
        }

        if (count($data) > 0) {
            $this->dirGus->dir->fields()->make()
                ->setRelations(['morph' => $this->dirGus->dir])
                ->makeService()
                ->updateValues($data);
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function updateTitle() : void
    {
        if (!empty($title = $this->makeValue('name'))) {
            $this->dirGus->dir->title = $title;
            $this->dirGus->dir->save();
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function updateCreatedAt() : void
    {
        if ($this->makeValue('type') === GusReportInterface::ORGANIZATION) {
            $fullReport = $this->gusApi->getFullReport($this->gusReport, ReportTypes::REPORT_ORGANIZATION)[0];

            if (!empty($fullReport[GusReportInterface::DATE_START])) {
                $this->dirGus->dir->created_at = $this->carbon->parse($fullReport[GusReportInterface::DATE_START])
                    ->format('Y-m-d H:i:s');
                $this->dirGus->dir->save();
            }
        }
    }

    /**
     * Undocumented function
     *
     * @param mixed $value
     * @return integer|null
     */
    protected function id($value) : ?int
    {
        if (is_int($value)) {
            return $value;
        }

        return $value['id'] ?? null;
    }

    /**
     * Undocumented function
     *
     * @param mixed $value
     * @return string|null
     */
    protected function separator($value) : ?string
    {
        return $value['separator'] ?? null;
    }

    /**
     * Undocumented function
     *
     * @return string|null
     */
    protected function makeNip() : ?string
    {
        return $this->nipFactory->setDir($this->dirGus->dir)->makeNip()->decode_value ?? null;
    }

    /**
     * Undocumented function
     *
     * @param string $type
     * @return string|null
     */
    protected function makeValue(string $type) : ?string
    {
        return $this->valueFactory->makeValue($type, $this->gusReport)();
    }
}
