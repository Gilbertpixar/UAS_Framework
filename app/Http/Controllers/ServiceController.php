<?php


namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
{
    // Get categories
    $categories = Category::latest()->paginate(5);

    // Render view "services" dengan data kategori
    return view('services', compact('categories'));
}
}
