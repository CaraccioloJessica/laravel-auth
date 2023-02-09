@extends('layouts.main-layout')

@section('content')
    
<h2 class="text-center my-3">I miei progetti</h2>
<div class="container d-flex flex-wrap">
    @foreach ($projects as $project)
        <div class="card mb-3 mx-2" style="width: 16rem;">
          {{-- link per lo show del singolo progetto --}}
          <a href="{{ route('project.show', $project) }}">
            <h4 class="mb-2">{{ $project -> name }}</h4>
          </a>

          <div class="mb-2">{{ $project -> description }}</div>
          <img  class="mb-2" src="{{ $project -> main_image }}" alt="">
          <div class="mb-2">{{ $project -> release_date }}</div>
          <div class="mb-2">{{ $project -> repo_link }}</div>
        </div>
    @endforeach
</div>

@endsection