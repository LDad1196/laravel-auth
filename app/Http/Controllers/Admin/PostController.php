<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Models\Language;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */


    public function index()
    {
        $postsList = Post::all();
        $data = [
            "posts" => $postsList
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        $data = [
            'types' => $types
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validate([
            "project_title" => "required|min:3|max:200",
            "description" => "required|min:3|max:255",
            "collaborators" => "required|min:3|",
            "framework" => "required",
            "thumb" => "required",
            "start_project" => "required",
            "end_project" => "required",
            "type_id" => "required",
        ]);

        $newPost = new Post();

        $newPost->fill($data);

        $newPost->save();

        return redirect()->route('admin.posts.index', $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $data = [
            "post" => $post
        ];
        return view("admin.posts.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $types = Type::all();

        $data = [
            "post" => $post,
            'types' => $types
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validate([
            "project_title" => "required|min:3|max:200",
            "description" => "required|min:3|max:255",
            "collaborators" => "required|min:3|",
            "framework" => "required",
            "thumb" => "required",
            "start_project" => "required",
            "end_project" => "required",
            "type_id" => "required",
        ]);

        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
