<!--this file = one page(for 'posts')-->
@extends('layouts.main') <!--now this file has all content (html) from parent-->
@section('content') <!--should match with @yield('content')-->
<div>
    <form action="{{ route('post.update', $post -> id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="post_content" class="form-control" id="content" placeholder="Content" >{{ $post->post_content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ $post->image }}" placeholder="Image">
        </div>
        <div class="form-group">
            <label for="likes">Likes</label>
            <input type="text" name="likes" class="form-control" id="likes" value="{{ $post->likes }}" placeholder="Likes">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
