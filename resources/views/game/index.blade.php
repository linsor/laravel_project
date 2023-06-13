@extends('layouts.main')
@section('content')
  <div>
    @foreach ($games as $game)
    <div class="container"> {{$game->title}}</div>
    @endforeach
  </div>

@endsection