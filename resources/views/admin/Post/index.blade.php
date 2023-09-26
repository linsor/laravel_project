@extends('layouts.admin')

@section('indexPostcontent')
    <div>
        <div>
            <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Create</a>
        </div>
        @foreach ($posts as $post)
            <div><a href="{{ route('admin.post.show', $post->id) }}">{{ $post->id }}.{{ $post->title }}</a></div>
        @endforeach
        <div>
            {{ $posts->appends(request()->query())->links() }}
        </div>
    </div>
@endsection