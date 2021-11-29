<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateAbout;
use Livewire\Livewire;
use Tests\TestCase;

class AboutTest extends TestCase
{
    
    public function test_current__about_is_available()
    {
        $this->actingAs($admin = Admin::factory()->create());

        $component = Livewire::test(UpdateAbout::class);

        $this->assertEquals($user->decs, $component->state['decs']);
        $this->assertEquals($user->monThu, $component->state['monThu']);
        $this->assertEquals($user->friday, $component->state['friday']);
        $this->assertEquals($user->saturday, $component->state['saturday']);
        $this->assertEquals($user->location, $component->state['location']);
        $this->assertEquals($user->phoneNo, $component->state['phoneNo']);
        $this->assertEquals($user->fax, $component->state['fax']);
    }

    public function test_about_can_be_updated()
    {
        $this->actingAs($admin = Admin::factory()->create());

        Livewire::test(UpdateAbout::class)
                ->set('state', ['decs' => 'Test Descrption', 'monThu' => 'Test Mon-Thu'], 'friday' => 'Test Friday', 'saturday' => 'Test Saturday', 'location' => 'Test Location', 'phoneNo' => 'Test Contact', 'fax' => 'Test Fax',)
                ->call('updateAbout');

        $this->assertEquals('Test Description', $admin->fresh()->decs);
        $this->assertEquals('Test Mon-Thu', $admin->fresh()->monThu);
        $this->assertEquals('Test Friday', $admin->fresh()->friday);
        $this->assertEquals('Test Saturday', $admin->fresh()->saturday);
        $this->assertEquals('Test Location', $admin->fresh()->location);
        $this->assertEquals('Test Contact', $admin->fresh()->phoneNo);
        $this->assertEquals('Test Fax', $admin->fresh()->fax);
    }
}
