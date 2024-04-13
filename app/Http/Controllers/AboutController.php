<?php

namespace App\Http\Controllers;

use App\Models\Post;

class AboutController extends Controller // like Service in Java
{
    public function about()
    {
        return view('about'); // way to return view (about.blade.php)
    }
}
