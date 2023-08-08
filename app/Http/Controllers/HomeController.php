<?php

namespace App\Http\Controllers;
use App\Models\Roster;

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
    public function ourteam()
    {
        $rosters = Roster::all();
        $pageTitle = 'Our Team'; // Define the pageTitle variable here
        return view('ourteam', compact('rosters', 'pageTitle'));
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
