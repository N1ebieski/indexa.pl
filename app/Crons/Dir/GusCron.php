<?php

namespace App\Crons\Dir;

use Carbon\Carbon;
use App\Models\DirGus;
use App\Jobs\Dir\CheckGusJob;
use Illuminate\Contracts\Config\Repository as Config;

class GusCron
{
    /**
     * [private description]
     * @var DirGus
     */
    protected $dirGus;

    /**
     * Undocumented variable
     *
     * @var Config
     */
    protected $config;

    /**
     * Undocumented variable
     *
     * @var Carbon
     */
    protected $carbon;

    /**
     * [private description]
     * @var CheckGusJob
     */
    protected $checkGusJob;

    /**
     * Undocumented variable
     *
     * @var Carbon
     */
    protected $delay;

    /**
     * Undocumented function
     *
     * @param DirGus $dirGus
     * @param Config $config
     * @param Carbon $carbon
     * @param CheckGusJob $checkGusJob
     */
    public function __construct(
        DirGus $dirGus,
        Config $config,
        Carbon $carbon,
        CheckGusJob $checkGusJob
    ) {
        $this->dirGus = $dirGus;

        $this->carbon = $carbon;
        $this->config = $config;

        $this->setDelay($this->carbon->now());

        $this->checkGusJob = $checkGusJob;
    }

    /**
     * Undocumented function
     *
     * @param Carbon $delay
     * @return self
     */
    protected function setDelay(Carbon $delay): self
    {
        $this->delay = $delay;

        return $this;
    }

    /**
     * [__invoke description]
     */
    public function __invoke(): void
    {
        if (!$this->isGusCheckerTurnOn()) {
            return;
        }

        $this->dirGus->makeRepo()->chunkAvailableHasNipByAttemptedAt(
            $this->config->get('indexa.gus.limit'),
            function ($items) {
                $items->each(function ($item) {
                    $this->addToQueue($item);
                });

                $this->setDelay(
                    $this->delay->addMinutes($this->config->get('indexa.gus.delay'))
                );
            },
            $this->checkTimestamp()
        );
    }

    /**
     * Adds new jobs to the queue or (if there are none), disables mailing.
     *
     * @param DirGus   $dirGus   [description]
     */
    protected function addToQueue(DirGus $dirGus): void
    {
        $this->checkGusJob->dispatch($dirGus)->delay($this->delay);
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    protected function isGusCheckerTurnOn(): bool
    {
        return $this->config->get('indexa.gus.check_days') > 0;
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    protected function checkTimestamp(): string
    {
        return $this->carbon->now()->subDays($this->config->get('indexa.gus.check_days'));
    }
}
