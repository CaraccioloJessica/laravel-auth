@extends('layouts.main-layout')

@section('content')
    <div class="container text-center my-3">
      <h1 class="mb-3">{{ $project -> name }}</h1>
      <div class="mb-3">{{ $project -> description }}</div>
      <img class="mb-3" src="{{ asset('storage/' . $project -> main_image) }}" alt="">
      <div class="mb-3">{{ $project -> release_date }}</div>
      <div class="mb-3"><a href="{{ $project -> repo_link }}">Repository link</a></div>
  </div>

@endsection