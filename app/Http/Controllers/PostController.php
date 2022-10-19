<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::simplePaginate(5);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $createRequest)
    {
        // Post::create( $request->all() );
        $image = $createRequest->image;
        if($image) {
            $extention = $image->getClientOriginalExtension();
            $imageName = time(). '.'.$extention;
            $image->move(public_path('/images/posts'), $imageName);
        }

        Post::create([
            'title' => $createRequest->title,
            'description' => $createRequest->description,
            'is_publish' => $createRequest->is_publish,
            'status' => 0,
            'image' => $createRequest->image ? $imageName: '0.png'
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $postId = $request->post_id;
        $post = Post::find($postId);

        if($post){
            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'is_publish' => $request->is_publish,
                'status' => $request->status,
            ]);
        }
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('post.index');
    }
    public function restore()
    {
        Post::withTrashed()->restore();
        return redirect()->route('post.index');
    }
}
