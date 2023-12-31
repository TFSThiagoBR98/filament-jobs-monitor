<?php

namespace Croustibat\FilamentJobsMonitor\Traits;

use Croustibat\FilamentJobsMonitor\Contracts\QueueMonitorContract;
use Croustibat\FilamentJobsMonitor\QueueMonitorProvider;

trait QueueProgress
{
    /**
     * Update progress.
     */
    public function setProgress(int $progress): void
    {
        $progress = min(100, max(0, $progress));

        if (! $monitor = $this->getQueueMonitor()) {
            return;
        }

        $monitor->update([
            'progress' => $progress,
        ]);

        $this->progressLastUpdated = time();
    }

    /**
     * Return Queue Monitor Model.
     */
    protected function getQueueMonitor(): ?QueueMonitorContract
    {
        if (! property_exists($this, 'job')) {
            return null;
        }

        if (! $this->job) {
            return null;
        }

        if (! $jobId = (QueueMonitorProvider::getQueueModel())::getJobId($this->job)) {
            return null;
        }

        $model = QueueMonitorProvider::getQueueModel();

        return $model::whereJobId($jobId)
            ->orderBy('started_at', 'desc')
            ->first();
    }
}
