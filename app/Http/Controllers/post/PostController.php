<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }
    
    public function store(Request $request)
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
        return back();
    }
}
