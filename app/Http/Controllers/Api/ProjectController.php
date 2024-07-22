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

    public function latest() {

        return response()->json([
            'success' => true,
            'projects' => Post::with('type')->orderByDesc('id')->take()->get()
        ]);
    }

    public function show($slug) {
        $project=Post::with('type')->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'project'  => $project
            ]);
        }   else {
            return response()->json([
                'success' => false,
                'message' => 'not found'
            ]);
        }
    }
}
