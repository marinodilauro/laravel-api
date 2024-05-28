<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.technologies.index', ['technologies' => Technology::orderBy('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->name, '-', 'en', ['#' => 'sharp', '++' => 'plusplus']);
        $val_data['slug'] = $slug;

        // create
        Technology::create($val_data);

        // redirect
        return to_route('admin.dashboard')->with('message', "New technology added succesfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->name, '-');
        $val_data['slug'] = $slug;

        // create
        // dd($val_data);
        $technology->update($val_data);

        // redirect
        return to_route('admin.technologies.edit', $technology)->with('message', "Type $technology->name updated succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return to_route('admin.dashboard')->with('message', "Type $technology->name deleted succesfully!");
    }
}
