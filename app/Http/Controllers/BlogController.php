<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
class BlogController extends Controller
{
    protected $limit = 2;

    public function index()
    {  
        $categories = Category::with(['posts' => function($query) 
        {

        $query->published(); 

        }])->orderBy('title', 'asc')->get();
        
         $posts = Post::with('author', 'tags', 'category', 'comments')
            ->latestFirst()
            ->published()
            ->filter(request()->only(['term', 'year', 'month']))
            ->simplePaginate($this->limit);  

      return  view("blog.index", compact('posts'));
       
    } 

    public function category(Category $category)
    {  
        $categoryName = $category->title;

        $categories = Category::with(['posts' => function($query) {

           $query->published();         
        }])->orderBy('title', 'asc')->get();

        $posts = $category->posts()
                          ->with('author', 'tags', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit); 

      return view("blog.index", compact('posts', 'categories', 'categoryName'));
    }

    public function tag(Tag $tag)
    {  
        $tagName = $tag->title;

        $posts = $tag->posts()
                          ->with('author', 'category', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit); 

    	return view("blog.index", compact('posts', 'tagName'));
    }

    public function author(User $author)
    {
        $authorName = $author->name;
        $posts = $author->posts()
                          ->with('category', 'tags', 'comments')
                          ->latestFirst()
                          ->published()
                          ->simplePaginate($this->limit); 

        return view("/backend/blog", compact('posts', 'categories', 'categoryName'));
    }

    public function show(Post $post)
    {   	
      
        $post->increment('view_count');

        $postComments = $post->comments()->simplePaginate(3);

		    return view("blog.show", compact('post', 'postComments'));
      }
    }
