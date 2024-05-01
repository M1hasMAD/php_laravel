<!--this file = one page(for 'posts')-->
@extends('layouts.main') <!--now this file has all content (html) from parent-->
@section('content') <!--should match with @yield('content')-->
<div>
    <div>
        <a href="{{ route('post.create') }}">Create Post</a>
    </div>
    @foreach($posts as $post)
        <div><a href="{{ route('post.show', $post -> id) }}"> {{$post -> id}}. {{$post -> title}}</a> </div>
    @endforeach
</div>
@endsection
