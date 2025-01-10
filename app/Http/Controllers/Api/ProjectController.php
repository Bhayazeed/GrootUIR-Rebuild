<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Project;

use App\Http\Resources\ProjectResource;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(5);
        return new ProjectResource(true, 'List of Project', $projects);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/projects', $image->hashName());

        $project = Project::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);

        return new ProjectResource(true, 'Project Created', $project);
    }

    public function show($id_project)
    {
        $project = Project::findOrFail($id_project);
        return new ProjectResource(true, 'Detail Project', $project);
    }

    public function update(Request $request, $id_project)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $project = Project::findOrFail($id_project);

        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $image->storeAs('public/projects', $image->hashName());

            Storage:delete('public/projects/' . basename($project->image));

            $project->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'tags' => $request->tags,
            ]);
        }else{
            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'tags' => $request->tags,
            ]);
        }

        return new ProjectResource(true, 'Project Updated', $project);
    }

    public function destroy($id_project)
    {
        $project = Project::findOrFail($id_project);

        Storage::delete('public/projects/' . basename($project->image));

        $project->delete();

        return new ProjectResource(true, 'Project Deleted', null);
    }
}

