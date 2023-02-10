@extends('layouts.main-layout')

@section('content')
    
    <h1>Aggiungi nuovo progetto</h1>
    <form method="post" action="{{ route('private.project.store') }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>

        <label for="description">Description</label>
        <input type="text" name="description">
        <br>

        <label for="main_image">Image</label>
        <input type="text" name="main_image">
        <br>

        <label for="release_date">Release date</label>
        <input type="date" name="release_date">
        <br>

        <label for="repo_link">Repository link</label>
        <input type="text" name="repo_link">
        <br>

        <input type="submit" value="CREA NUOVO PROGETTO">
    </form>

@endsection