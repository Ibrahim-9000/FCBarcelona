<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('faqItems')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        return view('faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('faq.index')->with('success', 'Categorie aangemaakt!');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('faq.edit', compact('faqCategory'));
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update($validated);

        return redirect()->route('faq.index')->with('success', 'Categorie aangepast!');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('faq.index')->with('success', 'Categorie verwijderd!');
    }
}