<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ContactController extends Controller // like Service in Java
{
    public function contact()
    {
        return view('contacts');// way to return view (contacts.blade.php)
    }
}
