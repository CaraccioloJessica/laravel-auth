@extends('layouts.main-layout')

@section('content')
    
<h2 class="text-center my-3">I miei progetti</h2>
<div class="container d-flex flex-wrap px-4">
    @foreach ($projects as $project)
        <div class="card m-2" style="width: 16rem;">
          {{-- link per lo show del singolo progetto --}}
          <a href="{{ route('project.show', $project) }}">
            <h4>{{ $project -> name }}</h4>
          </a>

          <div>{{ $project -> description }}</div>
          <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">
          <div>{{ $project -> release_date }}</div>
          <div>{{ $project -> repo_link }}</div>
        </div>
    @endforeach
</div>

@endsection