<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use Session;
use App\Post;
use App\Category;
use App\PostStatus;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UpdatePost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        $poststatuses = PostStatus::all();
        $stats = [];
        foreach ($poststatuses as $poststatus) {
            $stats[$poststatus->id] = title_case($poststatus->name);
        }

        return view('posts.create')->withCategories($cats)->withTags($tags2)->withStats($stats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePost $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->title),
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'status_id' => $request->status_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'IsPublished' => ($request->status_id == 3) ? 1 : 0,
        ]);

        $post->tags()->sync($request->tags, false);

        Session::flash('status', 'Successfully Added New Post');

        return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);

        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        $poststatuses = PostStatus::all();
        $stats = [];
        foreach ($poststatuses as $poststatus) {
            $stats[$poststatus->id] = title_case($poststatus->name);
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2)->withStats($stats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePost  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
        $post = Post::findorFail($id);

        if($request->title != $post->title){
            $this->validate($request, [
                'title' => 'unique:categories',
                'slug' => 'unique:categories'
            ]);
        }

        $post->title = $request->title;
        $post->slug = (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->title);
        $post->category_id = $request->category_id;
        $post->status_id = $request->status_id;
        $post->excerpt = $request->excerpt;
        $post->body = $request->body;
        $post->IsPublished = ($request->status_id == 3) ? 1 : 0;

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }

        Session::flash('status', 'Successfully Updated Post');

        return redirect()->route('posts.index');
    }
}