<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\PostService;

class PostController extends Controller
{
    public function create(Category $category)
    {
        $tagList = $category->getTagList();
        return view('post.create',compact('tagList'));
    }
    
    public function store(StorePostRequest $request, PostService $service)
    {
        $service->storePost($request);
        $request->session()->flash('message','成功しました');
        return redirect()->route('post.index');
    }
    
    public function index(Request $request)
    {
        //Eager Loading
        $posts = Post::with('tags')->orderBy('created_at', 'DESC')->get();
        return view('post.index',compact('posts'));
    }
    
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }
    
    public function edit(string $id, Category $category)
    {
        $tagArray = [];
        $post = Post::with('tags')->where('id', $id)->first();
        foreach ($post->tags as $tag) {
            array_push($tagArray, $tag->id);
        }
        $tagList = $category->getTagList();
        return view ('post.edit',compact('post','tagList', 'tagArray'));
    }
    
    public function update(StorePostRequest $request ,Post $post, PostService $service)
    {
        $service->updatePost($request, $post);
        $request->session()->flash('message','編集しました');
        return redirect()->route('post.show',compact('post'));
    }
    
    public function destroy(Post $post, PostService $service)
    {
        $service->deletePost($post);
        return redirect()->route('post.index')->with('message','削除に成功しました');
    }
}