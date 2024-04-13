<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainController extends Controller // like Service in Java
{
    public function main()
    {
        return view('main'); // way to return view (main.blade.php)
    }
}
