<?php

namespace Croustibat\FilamentJobsMonitor\Contracts;

use Illuminate\Contracts\Queue\Job as JobContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;

interface QueueMonitorContract
{
    public function status(): Attribute;
    public static function getJobId(JobContract $job): string|int;
    public function isFinished(): bool;
    public function hasFailed(): bool;
    public function hasSucceeded(): bool;
    public function prunable(): Builder|bool;
}
