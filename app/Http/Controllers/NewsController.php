<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user', 'tags')->latest('published_at')->paginate(9);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        $news->load('user', 'tags', 'comments.user');

        return view('news.show', compact('news'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('news.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $validated['user_id'] = auth()->id();

        $news = News::create($validated);
        $news->tags()->sync($request->input('tags', []));

        return redirect()->route('news.index')->with('success', 'Post created.');
    }

    public function edit(News $news)
    {
        $tags = Tag::all();

        return view('news.edit', compact('news', 'tags'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($validated);
        $news->tags()->sync($request->input('tags', []));

        return redirect()->route('news.index')->with('success', 'Post updated.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Post deleted.');
    }
}
