<?php

namespace Croustibat\FilamentJobsMonitor\Contracts;

use Illuminate\Database\Eloquent\Casts\Attribute;
interface QueueMonitorContract
{
    public function status(): Attribute;
    public static function getJobId(JobContract $job): string|int;
    public function isFinished(): bool;
    public function hasFailed(): bool;
    public function hasSucceeded(): bool;
    public function prunable(): Builder|bool;
}
