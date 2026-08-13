<?php

namespace App\Http\Controllers;

use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqItemController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($validated);

        return redirect()->route('faq.index')->with('success', 'Question added.');
    }

    public function update(Request $request, FaqItem $faqItem)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqItem->update($validated);

        return redirect()->route('faq.index')->with('success', 'Question updated.');
    }

    public function destroy(FaqItem $faqItem)
    {
        $faqItem->delete();

        return redirect()->route('faq.index')->with('success', 'Question deleted.');
    }
}
