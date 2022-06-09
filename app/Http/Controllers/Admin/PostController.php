<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

use App\Category;

use App\Tag;

use Illuminate\Support\Facades\Storage;

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

        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
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

        if(array_key_exists('post-image', $postData)){

            $img_path = Storage::put('uploads', $postData['post-image']);

        }   
        
        $newPost = new Post();

        $newPost->cover = $img_path;

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

        $newPost->tags()->sync($postData['tags']);

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

        $categories = Category::find($post->category_id);

        return view('admin.posts.show', compact('post', 'categories'));

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

        $categories = Category::all();

        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    
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

        if(array_key_exists('post-image', $postData)){

            if($post->cover){

                Storage::delete($post->cover);

            }

            $img_path = Storage::put('uploads', $postData['post-image']);

        }   

        $post->cover = $img_path;

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

        $post->tags()->sync($postData['tags']);

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

        if($post){

            $post->tags()->sync([]);

            $post->delete();

        }
        
        return redirect()->route('admin.posts.index');
    }
}
