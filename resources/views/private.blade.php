@extends('layouts.main-layout')

@section('content')
    
  <h1 class="text-center mb-4">Pannello di controllo</h1>

  {{-- CREATE --}}
  <div class="container">
    <h2 class="mb-3 text-primary">Aggiungi nuovo progetto</h2>
    <form method="post" action="{{ route('private.store') }}" enctype="multipart/form-data" class="mb-5">
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
  </div>

@endsection