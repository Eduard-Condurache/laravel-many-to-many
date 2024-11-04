<?php

namespace App\Http\Controllers\Admin;

// Helpers
use Illuminate\Support\Facades\Storage;

use App\Models\{
    Project,
    Type,
    Technology
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
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:3|max:64',
            'description' => 'required|min:3|max:4096',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|min:2|max:64',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'
        ]);


        $data = $request->all();

        if(isset($data['image'])) {
            $imgPath = Storage::disk('public')->put('uploads', $data['image']);
            $data['image'] = $imgPath;
        }


        $project = Project::create($data);

        $project->technologies()->sync($data['technologies']);


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
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|min:3|max:64',
            'description' => 'required|min:3|max:4096',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|min:2|max:64',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id',
            'remove_preview' => 'nullable'
        ]);


        $data = $request->all();

        if(isset($data['image'])) {
            if($project->image) {
                Storage::delete($project->image);
                $project->image = null;
            }

            $imgPath = Storage::put('uploads', $data['image']);
            $data['image'] = $imgPath;
        }
        else if (isset($data['remove_preview']) && $project->image) {
            Storage::delete($project->image);
            $project->image = null;
        }

        $project->update($data);

        $project->technologies()->sync($data['technologies']);


        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->image) {
            Storage::delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
