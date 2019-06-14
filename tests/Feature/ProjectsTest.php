<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project(){

        $this->withoutExceptionHandling();

        $attr = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/project', $attr);

        $this->assertDatabaseHas('projects', $attr);

        $this->get('/project')->assertSee($attr['title']);
    }
}
