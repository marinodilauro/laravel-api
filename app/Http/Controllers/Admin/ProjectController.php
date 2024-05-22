<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\PreDec;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request);

        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        $image_path = Storage::put('uploads', $val_data['thumb']);
        $val_data['thumb'] = $image_path;

        // create
        // dd($val_data);
        Project::create($val_data);

        // redirect
        return to_route('admin.projects.index');
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
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request);

        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        $image_path = Storage::put('uploads', $val_data['thumb']);
        $val_data['thumb'] = $image_path;

        // create
        // dd($val_data);
        $project->update($val_data);

        // redirect
        return to_route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('projects.index');
    }
}
