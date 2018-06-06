<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $parents = [];
        foreach($categories->where('parent_id', '=', null) as $category){
            $parents[$category->id] = $category->name;
        }

        return view('categories.index')->withCategories($categories)->withParents($parents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategory $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $request)
    {
        $category = Category::create([
            'name' => request('name'),
            'slug' => (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->name),
            'description' => request('description'),
            'parent_id' => request('parent_id'),
        ]);

        Session::flash('status', 'Successfully Added Category');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findorFail($id);

        $categories = Category::where('id', '!=', $category->id)
                                ->where('parent_id', '=', null)
                                ->get();

        $parents = [];
        foreach($categories as $cat){
            $parents[$cat->id] = $cat->name;
        }

        return view('categories.edit')->withCategory($category)->withParents($parents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategory  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $request, $id)
    {
        $category = Category::findorFail($id);
        
        if($request->name != $category->name){
            $this->validate($request, [
                'name' => 'unique:categories',
                'slug' => 'unique:categories'
            ]);
        }

        $category->name = $request->name;
        $category->slug = (isset($request->slug)) ? str_slug($request->slug) : str_slug($request->name);
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
        $category->save();

        Session::flash('status', 'Successfully Updated Category');

        return redirect()->route('categories.index');
    }
}