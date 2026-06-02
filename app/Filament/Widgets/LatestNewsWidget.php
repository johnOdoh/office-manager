<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use Filament\Widgets\Widget;

class LatestNewsWidget extends Widget
{
    protected string $view = 'filament.widgets.latest-news-widget';

    protected string|array|int $columnSpan = 'full';

    protected function getViewData(): array
    {
        return [
            'news' => Announcement::latest()->take(3)->get(),
            'complaints' => $this->complaints,
        ];
    }

    public array $complaints = [
        [
            'title' => 'Air Conditioning Not Working',
            'department' => 'Facilities',
            'status' => 'Reviewed',
            'color' => 'blue',
        ],
        [
            'title' => 'Network Connectivity Issues',
            'department' => 'IT',
            'status' => 'In Progress',
            'color' => 'indigo',
        ],
    ];
}
