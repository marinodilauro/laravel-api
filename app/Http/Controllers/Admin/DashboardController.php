<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            '/admin.tags.index',
            [
                'types' => Type::orderBy('id')->get(),
                'technologies' => Technology::orderBy('id')->get()
            ]
        );
    }

    public function homepage()
    {
        return view('admin/welcome');
    }
}
