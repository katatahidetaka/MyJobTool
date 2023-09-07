<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function create(Tag $tag)
    {
        $tagList = $tag->all();
        return view('post.create',compact('tagList'));
    }
    
    public function store(StorePostRequest $request)
    {
        DB::transaction(function () use ($request){
            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
            //name="tags[]"のチェックボックスから配列でvalueが渡されている
            //タグが選択されていない＝nullの場合はスキップ
            if (is_array($request->tags)) {
                foreach ($request->tags as $tag){
                    $post->tags()->attach($tag);
                }
            }
        });
        $request->session()->flash('message','成功しました');
        return redirect()->route('post.index');
    }
    
    public function index(Request $request)
    {
        //Eager Loading
        $posts = Post::with('tags')->get();
        return view('post.index',compact('posts'));
    }
    
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }
    
    public function edit(Post $post, Tag $tag)
    {
        $tagList = $tag->all();
        return view ('post.edit',compact('post','tagList'));
    }
    
    public function update(StorePostRequest $request ,Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        //create時と異なり、タグがあったのになくなった(null)場合があるのでnullの場合の条件分岐が必要
        if (is_array($request->tags)) {
            $post->tags()->sync($request->tags);
        }elseif (is_null($request->tags)) {
            $post->tags()->detach();
        }
        $request->session()->flash('message','編集しました');
        return redirect()->route('post.show',compact('post'));
    }
    
    public function destroy(Post $post)
    {
        $id = $post->id;
        DB::transaction(function() use ($id){
            $destroyPost = Post::with('tags')->where('id',$id)->firstOrFail();
            //リレーションは先に削除してから
            $destroyPost->tags()->detach();
            //deleteする
            $destroyPost->delete();
        });
            return redirect()->route('post.index')->with('message','削除に成功しました');
    }
}