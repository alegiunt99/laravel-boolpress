<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

use App\Category;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts= Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'title' => 'required|max:250',

            'content' => 'required'

        ],
        
        // si modificano i messaggi di errore
        [
            'title.required' => 'Non hai scritto niente',

            'title.max' => 'Puoi scrivere un massimo di 250 caratteri',

            'content.required' => 'Non hai scritto niente',
        ]
        );

        $postData = $request->all();

        $newPost = new Post();

        $newPost->fill($postData);

        $slug = Str::slug($newPost->title);

        $alternativeSlug = $slug;

        $postFound = Post::where('slug', $alternativeSlug)->first();

        $counter = 1;

        while($postFound){

            $alternativeSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $alternativeSlug)->first();
        }

        $newPost->slug = $alternativeSlug;
        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);

        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);

        return view('admin.posts.edit', compact('post'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([

            'title' => 'required|max:250',

            'content' => 'required'

        ],
        
        // si modificano i messaggi di errore
        [
            'title.required' => 'Non hai scritto niente',

            'title.max' => 'Puoi scrivere un massimo di 250 caratteri',

            'content.required' => 'Non hai scritto niente',
        ]
        );

        $postData = $request->all();

        $post = Post::find($id);

        $post->fill($postData);

        $slug = Str::slug($post->title);

        $alternativeSlug = $slug;

        $postFound = Post::where('slug', $alternativeSlug)->first();

        $counter = 1;

        while($postFound){

            $alternativeSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $alternativeSlug)->first();
        }

        $post->slug = $alternativeSlug;

        $post->update();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
