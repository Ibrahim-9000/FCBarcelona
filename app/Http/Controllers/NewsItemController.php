<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::latest()->get();
        return view('nieuws.index', compact('newsItems'));
    }
}