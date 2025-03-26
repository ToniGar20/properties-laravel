<?php

namespace Tests\Feature;

use App\Models\PropertyType;
use App\Models\Location;
use App\Models\Agent;
use App\Models\Property;
use App\Services\VisitCounterService;
use Tests\TestCase;

class VisitCounterServiceTest extends TestCase
{
    /** @test */
    public function registers_a_visit_and_updates_counters(): void
    {
        
        $property = Property::factory()->create([
            'visits' => 0, 
            'agent_id' => Agent::factory(),
            'location_id' => Location::factory(),
            'properties_type_id' => PropertyType::factory(),
        ]);
        $service = new VisitCounterService();
        $count = $service->register($property);

        $this->assertEquals(1, $count);
        $this->assertEquals(1, $property->fresh()->visits);

        $count = $service->register($property);
        $this->assertEquals(2, $count);
        $this->assertEquals(2, $property->fresh()->visits);
    }
}
