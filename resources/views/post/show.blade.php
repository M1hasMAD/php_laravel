<!--this file = one page(for 'posts')-->
@extends('layouts.main') <!--now this file has all content (html) from parent-->
@section('content') <!--should match with @yield('content')-->
    <div>
        <div> {{ $post -> id }}. {{ $post -> title }} </div>
        <div> {{ $post -> content }} </div>
    </div>
    <div>
        <a href="{{ route('post.edit', $post -> id) }}">Edit</a>
    </div>
    <div>
        <form action="{{ route('post.delete', $post -> id) }} " method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
    </div>
    <div>
        <a href="{{ route('post.index') }}">Back</a>
    </div>
@endsection
