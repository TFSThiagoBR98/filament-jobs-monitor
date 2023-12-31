<?php

return [
    'resources' => [
        'enabled' => true,
        'label' => 'Job',
        'plural_label' => 'Jobs',
        'navigation_group' => 'Settings',
        'navigation_icon' => 'heroicon-o-cpu-chip',
        'navigation_sort' => null,
        'navigation_count_badge' => false,
        'resource' => Croustibat\FilamentJobsMonitor\Resources\QueueMonitorResource::class,
    ],
    'pruning' => [
        'enabled' => true,
        'retention_days' => 7,
    ],
    'model' => \Croustibat\FilamentJobsMonitor\Models\QueueMonitor::class,
];
