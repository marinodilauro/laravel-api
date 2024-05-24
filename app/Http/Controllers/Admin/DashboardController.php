<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('/dashboard', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    public function homepage()
    {
        return view('admin/welcome');
    }
}
