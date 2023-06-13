@extends('layouts.main')
@section('content')
  <div class="container">
    <form action="{{route('game.store')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
      </div>
      <div class="mb-3">
        <label for="Content" class="form-label">Content</label>
        <textarea type="text" name="content" class="form-control" id="content" placeholder="Content"></textarea>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" name="image" class="form-control" id="image" placeholder="image">
      </div>
      <button type="submit" class="btn btn-primary mb-3">Create</button>
    </form>
    <div>
      <div>
        <a href="{{route('game.index')}}" class="btn btn-primary mb-3">Back</a>
      </div>
    </div>
  </div>

@endsection