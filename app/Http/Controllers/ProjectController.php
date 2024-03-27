<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index(){
        // Récupérer toutes les Projets
        $projects = Project::all();
        return view("admin.projects.index",compact('projects'));
    }

    function create(){
        return view('admin.projects.create');
    }

    function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();

        return redirect()->route('index.project');

    }
    function test($id){
        $project = Project::find($id);
            
        return view('dashboard',compact('project'));
    }
    function edit($id){
        $project = Project::find($id);
        return view('admin.projects.edit', compact('project'));
    }
    function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();
        return redirect()->route('dashboard');
        }
    function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('index.project');
        }
}
