<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosts;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }
    
    public function index()
    {
        $posts=Post::orderBy('created_at', direction: 'desc')->get();
        foreach ($posts as $post) {
            $post->formatted_date = Carbon::parse($post->created_at)->diffForHumans();
        }
        return view('customer.posts.post',compact('posts')); 
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return view('customer.posts.post');
            
        }
      abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(StorePosts $request)
{
    $validatedData = $request->validated();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $newImageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('posts', $newImageName, 'public');
        $validatedData['image'] = $newImageName;
    }

    $post = new Post();
    $post->user_id = Auth::id();
    $post->text = $validatedData['text'];
    $post->image = $validatedData['image'] ?? null;
    $post->save();

    return  back()->with('success', 'Post created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $posts = Post::with('comments.user')->get();
        $comments = Comment::where('post_id', $id)->with('user')->get();
        return view('posts.show', compact('post', 'comments'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
