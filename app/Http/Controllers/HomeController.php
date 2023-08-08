<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function home()
    {
        $pageTitle = 'Home';

        return view('home', ['pageTitle' => $pageTitle]);
    }
    function about()
    {
        $pageTitle = 'About';

        return view('about', ['pageTitle' => $pageTitle]);
    }
    function services()
    {
        $pageTitle = 'Services';

        return view('services', ['pageTitle' => $pageTitle]);
    }
    function ourteam()
    {
        $pageTitle = 'Ourteam';

        return view('ourteam', ['pageTitle' => $pageTitle]);
    }
    function blog()
    {
        $pageTitle = 'Blog';

        return view('blog', ['pageTitle' => $pageTitle]);
    }
    function news()
    {
        $pageTitle = 'News';

        return view('news', ['pageTitle' => $pageTitle]);
    }
}
