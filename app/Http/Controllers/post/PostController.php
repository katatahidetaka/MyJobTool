<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }
    
    public function store(StorePostRequest $request)
    {
        DB::transaction(function () use ($request){
            $post = Post::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
            //name="tags[]"のチェックボックスから配列でvalueが渡されている
            foreach ($request->tags as $tag){
                $post->tags()->attach($tag);
            }
        });
        $request->session()->flash('message','成功しました');
        return redirect()->route('post.index');
    }
    
    public function index(Request $request)
    {
        //$posts = Post::all(); //titleとcontentのみの取得(postテーブルにある情報のみ)
        //Eager Loading
        $posts = Post::with('tags')->get();
        //dd($posts);
        return view('post.index',compact('posts'));
    }
}