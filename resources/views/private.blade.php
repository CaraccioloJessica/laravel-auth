@extends('layouts.main-layout')

@section('content')
    
  <h1 class="text-center">Pannello di controllo</h1>
  <div class="container">
    <a href="{{ route('project.create') }}">CREA NUOVO PROGETTO</a>
  </div>

@endsection