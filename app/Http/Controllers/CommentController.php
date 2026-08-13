<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $news->comments()->create([
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Comment added.');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== auth()->id() && ! auth()->user()->isAdmin()) {
            abort(403);
        }

        $comment->delete();

        return redirect()->route('news.show', $comment->news)->with('success', 'Comment deleted.');
    }
}
