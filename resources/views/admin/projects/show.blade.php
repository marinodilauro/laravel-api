@extends('layouts.admin')

@section('content')
  <header class="py-3 bg-dark text-white">
    <div class="container">
      <h1>{{ $project->title }}</h1>
    </div>
  </header>

  <section class="py-5">
    <div class="container">



      <img src="{{ $project->thumb }}" alt="{{ $project->title }}">

      <p>{{ $project->description }}</p>

    </div>
  </section>
@endsection
