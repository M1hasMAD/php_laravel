<!--"File parent" for all children who extend it (to avoid duplicating the code)-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <nav>
                <ul>
                    <!-- there is button 'About' and after click it will go to 'web.php' for find endpoint with '->name('about.about')' and call it -->
                    <li><a href="{{route('about.about')}}">About</a></li>
                    <!--button 'Contact' -> 'web.php' -> find endpoint with '->name('contact.contact')' -->
                    <li><a href="{{route('contact.contact')}}">Contacts</a></li>
                    <!--button 'Main' -> 'web.php' -> find endpoint with '->name('main.main')' -->
                    <li><a href="{{route('main.main')}}">Main</a></li>
                    <!--button 'Posts' -> 'web.php' -> find endpoint with '->name('post.posts')' -->
                    <li><a href="{{route('post.index')}}">Posts</a></li>
                </ul>
            </nav>
        </div>
        @yield('content') <!--should match with @section('content')-->
    </div>
</body>
</html>
