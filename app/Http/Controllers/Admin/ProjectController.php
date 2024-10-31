<?php

namespace App\Http\Controllers\Admin;

use App\Models\{
    Project,
    Type
};
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3|max:64',
            'description' => 'required|min:3|max:4096',
            'image' => 'nullable|min:5|max:2048|url',
            'category' => 'required|min:2|max:64',
            'type_id' => 'nullable|exists:types,id'
        ]);


        $data = $request->all();


        $project = Project::create($data);


        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|min:3|max:64',
            'description' => 'required|min:3|max:4096',
            'image' => 'nullable|max:2048|url',
            'category' => 'required|min:2|max:64',
            'type_id' => 'nullable|exists:types,id'
        ]);


        $data = $request->all();


        $project->update($data);


        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
