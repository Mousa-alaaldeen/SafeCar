<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comment::with(['user', 'post'])->orderBy('creates_at', 'desc')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        comment::created([
            'comment_content' => $request->comment_content,
            'post_id'=>$request->post_id,
            'user_id'=>auth()->id(),
            
        ]);
        return back()->with('success','Comment added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
