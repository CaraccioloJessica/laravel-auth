@extends('layouts.main-layout')

@section('content')
    
  <h1 class="text-center mb-4">Pannello di controllo</h1>

  {{-- CREATE --}}
  <div class="container">
    <h2 class="mb-3 text-primary">Aggiungi nuovo progetto</h2>
    <form method="post" action="{{ route('private.project.store') }}" enctype="multipart/form-data" class="mb-5">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>

        <label for="description" class="mt-2">Description</label>
        <input type="text" name="description">
        <br>

        <label for="main_image" class="mt-2">Image</label>
        <input type="file" name="main_image">
        <br>

        <label for="release_date" class="mt-2">Release date</label>
        <input type="date" name="release_date">
        <br>

        <label for="repo_link" class="mt-2">Repository link</label>
        <input type="text" name="repo_link">
        <br>

        <input type="submit" value="CREA NUOVO PROGETTO" class="mt-2">
    </form>

    {{-- EDIT/UPDATE --}}
    <h2 class="mb-3 text-primary">Aggiorna un progetto</h2>
    <form method="post" action="{{ route('private.project.update', $project) }}" enctype="multipart/form-data">
      @csrf
      
      <label for="name" class="mt-2">Name</label>
      <input type="text" name="name" value={{ $project -> name }}>
      <br>
      <label for="description" class="mt-2">Description</label>
      <textarea type="text" name="description" value={{ $project -> description }}></textarea>
      <br>
      <label for="main_image" class="mt-2">Image</label>
      <input type="file" name="main_image" value={{ $project -> main_image }}>
      <br>
      <label for="release_date" class="mt-2">Release date</label>
      <input type="date" name="release_date" value={{ $project -> release_date }}>
      <br>
      <label for="repo_link" class="mt-2">Repository link</label>
      <input type="text" name="repo_link" value={{ $project -> repo_link }}>
      <br>
      <input type="submit" value="AGGIORNA PROGETTO" class="mt-2">
  </form>

    {{-- DELETE --}}
    <h2 class="mb-3 text-primary">Cancella progetto</h2>
    <div class="d-flex flex-wrap">
      @foreach ($projects as $project)
      <div class="card m-2 p-2" style="width: 16rem;">
        
        <h5>{{ $project -> name }}</h5>
        <img src="{{ asset('storage/' . $project -> main_image) }}" alt="">
        <div>{{ $project -> release_date }}</div>
        
        <a class="text-danger my-2" href="{{ route('private.project.delete', $project) }}"><h4>Delete</h4></a>
        
      </div>
      @endforeach
    </div>
  </div>

@endsection