<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTag;
use App\Http\Requests\UpdateTag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTag  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTag $request)
    {
        $tag = Tag::create([
            'name' => request('name'),
            'slug' => (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->name),
            'description' => request('description'),
        ]);

        Session::flash('status', 'Successfully Added Tag');

        return redirect()->route('tags.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findorFail($id);

        return view('tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTag  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTag $request, $id)
    {
        $tag = Tag::findorFail($id);
        
        if($request->name != $tag->name){
            $this->validate($request, [
                'name' => 'unique:tags',
                'slug' => 'unique:tags'
            ]);
        }

        $tag->name = $request->name;
        $tag->slug = (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->name);
        $tag->description = $request->description;
        $tag->save();

        Session::flash('status', 'Successfully Updated Tag');

        return redirect()->route('tags.index');
    }
}