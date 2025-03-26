<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class ExportUnvisitedProperties extends Command
{
    protected $signature = 'properties:export-unvisited';
    protected $description = 'Export properties not visited in the last 2 weeks';

    public function handle()
    {
        $twoWeeksAgo = Carbon::now()->subWeeks(2);

        $unvisited = Property::where('visits', 0)
        ->orWhere(function ($query) {
            $query->whereNotNull('visits')->where('updated_at', '<', now()->subWeeks(2));
        })->get();
        
        $timestamp = now()->format('Ymd_His');
        $filename = "properties_not_visited_{$timestamp}.json";

        Storage::put($filename, $unvisited->toJson(JSON_PRETTY_PRINT));

        $this->info("Archivo generado: $filename");
    }
}
