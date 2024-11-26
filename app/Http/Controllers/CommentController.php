<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'mail'   =>  'required|min:6|max:100',
            'text'     =>  'required|min:10',
            'nickname'    => 'required|min:5|max:40',
        ]);
        // No hace falta ya que ya se va a validar abajo en el save()
        // $post_id = $request->post_id;
        // $post = Post::find($post_id);
        // if ($post == null) {
        //     abort(404);
        // }
        $comment = new Comment($request->all());
        try {
            $comment->save();
            return back()->with('message', 'Comment created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Comment could not be created.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}