@extends('layouts.main-layout')

@section('content')
    {{-- EDIT/UPDATE --}}
    <h2 class="mb-3 text-primary">Aggiorna un progetto</h2>
    <form method="post" action="{{ route('private.update', $project ) }}" enctype="multipart/form-data">
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
  </div>

@endsection