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

        $this->post('/project', $attr)->assertRedirect('/project');

        $this->assertDatabaseHas('projects', $attr);

        $this->get('/project')->assertSee($attr['title']);
    }

    /** @test */
    public function a_project_require_a_title(){

//        create create and save it db
//        make create factory and return obj, does not save in db
//        raw create factory and return array, does not save in db

        $attr = factory('App\Project')->raw(['title' => '']);

        $this->post('/project', $attr)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_require_a_description(){

        $attr = factory('App\Project')->raw(['description' => '']);

        $this->post('/project', $attr)->assertSessionHasErrors('description');
    }

}
