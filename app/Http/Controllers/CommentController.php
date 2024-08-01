<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Display a listing of the comments
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    // Show the form for creating a new comment
    public function create()
    {
        return view('comments.create');
    }

    // Store a newly created comment in storage
    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|integer|exists:modules,id',
            'user_id' => 'required|integer|exists:users,id',
            'message' => 'required|string',
        ]);

        Comment::create($request->all());
        return redirect()->back()->with('success', 'Comment created successfully.');
    }

    // Display the specified comment
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    // Show the form for editing the specified comment
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    // Update the specified comment in storage
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'module_id' => 'required|integer|exists:modules,id',
            'user_id' => 'required|integer|exists:users,id',
            'message' => 'required|string',
        ]);

        $comment->update($request->all());
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    // Remove the specified comment from storage
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }

    public function getComments($id)
    {
        $comments = Comment::where('module_id', $id)->with('user')->get();
        return response()->json($comments);
    }   
}
