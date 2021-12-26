<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        $items = Item::with('pictures')
            ->take(8)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.home', [
            'categories' => $categories,
            'items' => $items
        ]);
    }
}
