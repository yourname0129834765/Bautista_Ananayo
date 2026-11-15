<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_root_renders_the_patient_list(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Patient Records');
    }
}
