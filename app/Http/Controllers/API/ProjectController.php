<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->orderByDesc('id')->paginate(9);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function main()
    {
        $projects = Project::with('type', 'technologies')->where('highlighted', 1)->orderByDesc('id')->get();

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('type', 'technologies')->where('slug', $slug)->first();

        if ($project) {
            // return the object
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            // return an error for a 404 page
            return response()->json([
                'success' => false,
                'result' => '404 ERROR! Sorry, nothing found!'
            ]);
        }
    }
}
