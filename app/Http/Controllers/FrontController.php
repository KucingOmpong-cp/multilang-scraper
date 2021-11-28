<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Post;

class FrontController extends Controller
{
    public function home()
    {
        $locale = App::currentLocale();
        $data = Post::where('lang', $locale)->get();
        
        return view('welcome', ['data' => $data]);
    }
} 