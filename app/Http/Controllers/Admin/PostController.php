<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


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
        
        
        $data = $request->validated();

        $img_path = Storage::put('uploads', $request->thumb);
        
        $data['thumb'] = $img_path;
        
        $newPost = new Post();
        
        $newPost->fill($data);
        
        $newPost->save();
        
        return to_route('admin.posts.index');
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
        $data = $request->validated;

        $img_path = Storage::put('uploads', $request->thumb);
        $data['thumb'] = $img_path;

        $post->update($data);


        return to_route('admin.posts.show', $post);
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
