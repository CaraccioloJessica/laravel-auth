@extends('layouts.main-layout')

@section('content')
    
  <h1 class="text-center">Pannello di controllo</h1>

  <div class="container">
    <a href="{{ route('private.project.create') }}">CREA NUOVO PROGETTO</a>
  </div>

  <div class="container d-flex flex-wrap">
    @foreach ($projects as $project)
      <div class="card m-2 p-2" style="width: 16rem;">

        <h5>{{ $project -> name }}</h5>
        <img  src="{{ $project -> main_image }}" alt="">
        <div>{{ $project -> release_date }}</div>

        <a class="text-danger my-2" href="{{ route('private.project.delete', $project) }}"><h4>Delete</h4></a>

      </div>
    @endforeach
</div>

@endsection