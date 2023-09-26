@extends('layouts.admin')

@section('editPostContent')
    <div class="container">
      <form action="{{route('post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" 
          id="title" placeholder="Title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
          <label for="Content" class="form-label">Content</label>
          <textarea type="text" name="content" class="form-control"
           id="content" placeholder="Content">{{$post->content}}</textarea>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="text" name="image" class="form-control"
           id="image" placeholder="image" value="{{$post->image}}">
        </div>
        <div class="mb-3">
          <label for="category">Category</label>
          <select class="form-select" id="category" name="category_id">
          @foreach ($categories as $category)
            <option
              {{$category->id === $post->category->id ? 'selected' : ''}}
            
              value="{{$category->id}}">{{$category->title}}</option>    
          @endforeach
        </select>
        </div>
        <div class="mb-3">
          <select multiple class="form-control" id="tags" name="tags[]">
            @foreach ($tags as $tag)
              <option 
              @foreach ($post->tags as $postTag)
              {{$tag->id === $postTag->id ? 'selected' : ''}}
              @endforeach
                 value="{{$tag->id}}">{{$tag->title}}</option>    
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Edit</button>
      </form>
      <div>
        <div>
          <a href="{{route('admin.post.index')}}" class="btn btn-primary mb-3">Back</a>
        </div>
      </div>
    </div>
@endsection