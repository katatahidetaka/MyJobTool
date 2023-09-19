<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService 
{
    public function storePost($request) :void
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
    }
    
    public function updatePost($request, $post)
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
    }
    
    public function deletePost($post)
    {
        $id = $post->id;
        DB::transaction(function() use ($id){
            $destroyPost = Post::with('tags')->where('id',$id)->firstOrFail();
            //リレーションは先に削除してから
            $destroyPost->tags()->detach();
            //deleteする
            $destroyPost->delete();
        });
    }
}