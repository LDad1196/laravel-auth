@extends('layouts.app')

@section('title', 'POST FORM')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <img src="{{ $post->thumb }}" class="w-100" style="aspect-ratio: 16/9;" />
            </div>
            <div class="col-12 p-4">

                <h2>{{ $post->project_title }}</h2>
                <p> {{ $post->type->name }} </p>
                <p> {{ $post->description }} </p>
                <p> {{ $post->end_project }} </p>

            </div>
        </div>
    </div>

@endSection
