@extends('layouts.admin')

@section('showPostContent')
    <div class="container">
      <div> {{$post->id}}.{{$post->title}}</div>
      <div> {{$post->content}}</div>
      <div>
        <a href="{{route('admin.post.edit', $post->id)}}" class="btn btn-primary mb-2">Edit</a>
      </div>
      <div>
        <a href="{{route('admin.post.index')}}" class="btn btn-primary mb-3" >Back</a>
      </div>
      <div>
        <form action="{{route('admin.post.delete', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
      </form>
      </div>
    </div>
@endsection