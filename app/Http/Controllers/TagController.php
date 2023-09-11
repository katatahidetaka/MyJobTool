<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $categoryList[] = $category->getCategoryList();
        return view('tag.index', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request->tagName;
        $tag->save();
        return redirect()->route('tag.index')->with('message', 'タグを編集しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::transaction(function() use ($id){
            $tag = Tag::with('posts')->where('id',$id)->firstOrFail();
            //リレーションは先に削除してから
            $tag->posts()->detach();
            //deleteする
            $tag->delete();
        });
        
        return redirect()->route('tag.index')->with('message', 'タグを削除しました');
    }
}
