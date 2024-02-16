<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', compact('posts'));
    }
    

    public function create()
    {
        $users = User::all();
        $loggedInUser = Auth::user();
        return view('posts.create', ['users'=>$users, 'authUser'=>$loggedInUser]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $post = Post::create($validatedData);
        event(new \App\Events\UpdatePostsCount($post));
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $users = User::all();
        $loggedInUser = Auth::user();
        if ($loggedInUser->id != $post->user_id) {
            return redirect()->route('posts.index')->with('message', 'You are not allowed to edit this post');;
        } else {
            return view('posts.edit', compact('post', 'users'));
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index');
    }


    public function destroy($id)
    {
    $post = Post::findOrFail($id);
    $post->delete();
    return redirect()->route('posts.index');
    }
}
