<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store(){

        $attr = request()->validate(['title' => 'required', 'description' => 'required']);

        Project::create($attr);

        return redirect('/project');
    }
}
