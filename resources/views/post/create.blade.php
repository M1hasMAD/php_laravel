<!--this file = one page(for 'posts')-->
@extends('layouts.main') <!--now this file has all content (html) from parent-->
@section('content')
    <!--should match with @yield('content')-->
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="title" placeholder="Title">
                @error('title')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
                @error('content')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input value="{{ old('image') }}" type="text" name="image" class="form-control" id="image" placeholder="Image">
                @error('image')
                <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="likes">Likes</label>
                <input value="{{ old('likes') }}" type="text" name="likes" class="form-control" id="likes" placeholder="Likes">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? ' selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
