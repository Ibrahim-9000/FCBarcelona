<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function store(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $validated['faq_category_id'] = $faqCategory->id;

        FaqItem::create($validated);

        return redirect()->route('faq.index')->with('success', 'Vraag aangemaakt!');
    }

    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();

        return redirect()->route('faq.index')->with('success', 'Vraag verwijderd!');
    }
}