<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            '/admin.dashboard',
            [
                'projects' => Project::orderByDesc('id')->get(),
                'types' => Type::orderBy('id')->get()
            ]
        );
    }

    public function homepage()
    {
        return view('admin/welcome');
    }
}
