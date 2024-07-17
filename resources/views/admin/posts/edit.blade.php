@extends('layouts.app')

@section('title', 'PROJECT FORM')

@section('content')

    <h1 class="text-center display-4 fw-bold text-danger my-5">EDIT: {{ $post->project_title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mx-0 justify-content-center">
            <div class="col-6 px-0 rounded">

                <div class="row mx-0 justify-content-around">
                    <div class="col-5 px-0 pb-4">
                        <label class="form-label py-2 text-danger fw-bold fs-5">TITLE</label>
                        <input type="text" class="form-control" name="project_title" placeholder="Title" required
                            value="{{ $post->project_title }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">COLLABORATORS</label>
                        <input type="text" class="form-control" name="collaborators" placeholder="Collaborators" required
                            value="{{ $post->collaborators }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">USED FRAMEWORKS</label>
                        <input type="text" class="form-control" name="framework" placeholder="Frameworks" required
                            value="{{ $post->framework }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">TYPE</label>
                        <select class="form-select" name="type_id" id="type_id" required>
                            <option selected>{{ $post->type->name }}</option>
                            @foreach ($types as $type)
                                @if ($type->name != $post->type->name)
                                    <option value={{ $type->id }}> {{ $type->name }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">PROJECT START</label>
                        <input type="text" class="form-control" name="start_project" placeholder="YYYY-MM-DD" required
                            value="{{ $post->start_project }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">PROJECT END</label>
                        <input type="text" class="form-control" name="end_project" placeholder="YYYY-MM-DD" required
                            value="{{ $post->end_project }}">
                    </div>

                    <div class="col-11 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">IMAGE LINK</label>
                        <input type="text" class="form-control" name="thumb" placeholder="Link" required
                            value="{{ $post->thumb }}">
                    </div>

                    <div class="col-11 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">DESCRIPTION</label>
                        <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Description" required>{{ $post->description }}</textarea>
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <button type="submit" class="btn text-center w-100 bg-danger fw-bold text-black fs-5">
                            UPDATE
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>



@endSection
