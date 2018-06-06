<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Show the blog homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function blogHome()
    {
    	$posts = Post::where('IsPublished', true)->get();
        $categories = Category::all();

        return view('blog.home')->withPosts($posts)->withCategories($categories);
    }

    /**
     * Display a blog post
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function blogPost(Post $post)
    {
        $categories = Category::all();
        
        return view('blog.post')->withPost($post)->withCategories($categories);
    }

    /**
     * Display posts belonging to a category
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function blogCategory(Category $category)
    {
        $allData;
        $collection;

        if(count($category->posts) > 0){
            $iteration = 0;
            foreach ($category->posts as $key => $post) {
                $allData[] = new \StdClass;
                $allData[$iteration] = $post;
                $iteration++;
            }

            if(count($category->subCategories) > 0){
                foreach ($category->subCategories as $subCategory) {
                    if(count($subCategory->posts) > 0){
                        foreach ($subCategory->posts as $subPost) {
                            $allData[$iteration] = $subPost;
                            $iteration++;
                        }
                    }
                }
            }

            $collection = collect($allData)->each(function ($item, $key) {
                return (array) $item;
            });
        } elseif(count($category->subCategories) > 0) {
            $iteration = 0;
            foreach ($category->subCategories as $subCategory) {
                if(count($subCategory->posts) > 0){
                    foreach ($subCategory->posts as $key => $subPost) {
                        $allData[] = new \StdClass;
                        $allData[$iteration] = $subPost;
                        $iteration++;
                    }
                }
            }

            $collection = collect($allData)->each(function ($item, $key) {
                return (array) $item;
            });
        } else {
            return $category->posts;
        }

        return $collection;
    }
}