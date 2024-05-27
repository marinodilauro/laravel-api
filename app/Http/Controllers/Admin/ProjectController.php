<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request);

        // Validate
        $val_data = $request->validated();

        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if ($request->has('thumb')) {
            $image_path = Storage::put('uploads', $val_data['thumb']);
            $val_data['thumb'] = $image_path;
        }

        // Create

        // dd($request->all(), $val_data);
        $project = Project::create($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->attach($val_data['technologies']);
        }


        // Redirect
        return to_route('admin.projects.index')->with('message', "Project created succesfully!");
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
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request);

        // Validate
        $val_data = $request->validated();


        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        // dd($val_data);
        if ($request->has('thumb')) {

            if ($project->thumb) {
                Storage::delete($project->thumb);
            }

            $image_path = Storage::put('uploads', $val_data['thumb']);
            $val_data['thumb'] = $image_path;
        }

        // Update
        if ($request->has('technologies')) {
            $project->technologies()->sync($val_data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        $project->update($val_data);

        // Redirect
        return to_route('admin.projects.edit', $project)->with('message', "Project $project->title updated succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Deleting images from assets
        if ($project->thumb) {
            Storage::delete($project->thumb);
        }

        // Detaching technologies from project
        $project->technologies()->detach();

        // Deleting projects
        $project->delete();

        // Redirect
        return to_route('admin.projects.index')->with('message', "Project $project->title deleted succesfully!");
    }
}
