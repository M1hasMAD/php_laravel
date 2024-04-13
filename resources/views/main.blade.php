<!--this file = one page(for 'main')-->
@extends('layouts.main') <!--now this file has all content (html) from parent-->
@section('content') <!--should match with @yield('content')-->
<div>
    hello from MAIN page
</div>
@endsection
