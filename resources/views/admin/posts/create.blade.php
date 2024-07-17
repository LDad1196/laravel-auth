@extends('layouts.app')

@section('title', 'PROJECT FORM')

@section('content')

    <h1 class="text-center display-4 fw-bold text-danger my-5">ADD A PROJECT</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mx-0 justify-content-center">
            <div class="col-6 px-0 rounded">

                <div class="row mx-0 justify-content-around">
                    <div class="col-5 px-0 pb-4">
                        <label class="form-label py-2 text-danger fw-bold fs-5">TITLE</label>
                        <input type="text" class="form-control" name="project_title" placeholder="Title"
                            value="{{ old('project_title') }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">COLLABORATORS</label>
                        <input type="text" class="form-control" name="collaborators" placeholder="Collaborators"
                            value="{{ old('collaborators') }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">USED FRAMEWORKS</label>
                        <input type="text" class="form-control" name="framework" placeholder="Frameworks"
                            value="{{ old('framework') }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label for="type_id" class="py-2 text-danger fw-bold fs-5">TYPE</label>
                        <select class="form-select" name="type_id" id="type_id" required>
                            <option selected>Open this select menu</option>
                            @foreach ($types as $type)
                                <option value={{ $type->id }}> {{ $type->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">PROJECT START</label>
                        <input type="text" class="form-control" name="start_project" placeholder="YYYY-MM-DD"
                            value="{{ old('start_project') }}">
                    </div>

                    <div class="col-5 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">PROJECT END</label>
                        <input type="text" class="form-control" name="end_project" placeholder="YYYY-MM-DD"
                            value="{{ old('end_project') }}">
                    </div>

                    <div class="col-11 px-0 pb-4">
                        <label for="thumb" class="py-2 text-danger fw-bold fs-5">IMAGE LINK</label>
                        <input type="file" class="form-control" name="thumb" id="thumb" placeholder=""/>
                        @error('cover_image')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-11 px-0 pb-4">
                        <label class="py-2 text-danger fw-bold fs-5">DESCRIPTION</label>
                        <textarea class="form-control" aria-label="With textarea" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-3">
                        <button type="submit" class="btn text-center w-100 bg-danger fw-bold text-black fs-5">
                            ADD PROJECT
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>



@endSection
