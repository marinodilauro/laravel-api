<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.types.index', ['types' => Type::orderBy('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->name, '-');
        $val_data['slug'] = $slug;

        // create
        // dd($val_data);
        Type::create($val_data);

        // redirect
        return to_route('admin.dashboard')->with('message', "New type added succesfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        // validate
        $val_data = $request->validated();

        $slug = Str::slug($request->name, '-');
        $val_data['slug'] = $slug;

        // create
        // dd($val_data);
        $type->update($val_data);

        // redirect
        return to_route('admin.types.edit', $type)->with('message', "Type $type->name updated succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return to_route('admin.dashboard')->with('message', "Type $type->name deleted succesfully!");
    }
}
