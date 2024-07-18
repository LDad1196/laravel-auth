<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ProjectController extends Controller
{
    public function index() {

        return response()->json([
            'success' => true,
            'projects' => Post::orderByDesc('id')->paginate()
        ]);
    }
}
