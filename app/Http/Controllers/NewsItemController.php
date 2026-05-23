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

    public function show(NewsItem $newsItem)
    {
        return view('nieuws.show', compact('newsItem'));
    }

    public function create()
    {
        return view('nieuws.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('nieuws', 'public');
        }

        $validated['user_id'] = auth()->id();

        NewsItem::create($validated);

        return redirect()->route('nieuws.index')->with('success', 'Nieuwsbericht aangemaakt!');
    }

    public function edit(NewsItem $newsItem)
    {
        return view('nieuws.edit', compact('newsItem'));
    }

    public function update(Request $request, NewsItem $newsItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('nieuws', 'public');
        }

        $newsItem->update($validated);

        return redirect()->route('nieuws.show', $newsItem)->with('success', 'Nieuwsbericht aangepast!');
    }

    public function destroy(NewsItem $newsItem)
    {
        $newsItem->delete();

        return redirect()->route('nieuws.index')->with('success', 'Nieuwsbericht verwijderd!');
    }
}