<?php

namespace App\Filament\Pages;

use App\Filament\Pages\Auth\EditProfile;
use Filament\Actions\Action;
use Filament\Pages\Dashboard as BaseDashboard;
use Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1DocumentProcessingConfigChunkingConfigLayoutBasedChunkingConfig;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\WelcomeWidget::class,
            \App\Filament\Widgets\LatestNewsWidget::class
        ];
    }

    protected function getHeaderActions(): array
    {
        if (!request()->user()->profile()->exists()) {
            return [
                Action::make('addAnnouncement')
                    ->label('Complete Profile')
                    ->icon('heroicon-o-user-circle')
                    ->color('warning')
                    ->url(fn(): string => EditProfile::getUrl()),
            ];
        }
        return [];
    }
}
