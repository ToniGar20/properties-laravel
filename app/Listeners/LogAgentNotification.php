<?php

namespace App\Listeners;

use App\Events\PropertyFavorited;
use Illuminate\Support\Facades\Log;

class LogAgentNotification
{
    public function handle(PropertyFavorited $event): void
    {
        $agent = $event->property->agent;

        if ($agent) {
            Log::info("📬 Notification sent to Agent {$agent->email} - Property {$event->property->name} has been flagged as favorite.");
        }
    }
}
