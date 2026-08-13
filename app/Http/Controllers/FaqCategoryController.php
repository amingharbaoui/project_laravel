<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('items')->get();

        return view('faq.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($validated);

        return redirect()->route('faq.index')->with('success', 'Categorie aangemaakt.');
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $faqCategory->update($validated);

        return redirect()->route('faq.index')->with('success', 'Categorie bijgewerkt.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('faq.index')->with('success', 'Categorie verwijderd.');
    }
}
