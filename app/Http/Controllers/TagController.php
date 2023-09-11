<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $categoriesArray = $category->getCategoriesArray();
        $categoryList[] = $category->getCategoryList();
        return view('tag.index', compact('categoryList', 'categoriesArray'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->tagName;
        $tag->category_id = $request->categoryId;
        $tag->save();
        
        return redirect()->route('tag.index')->with('message', '新規タグを作成しました');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTagRequest $request)
    {
        $tag = Tag::findOrFail($request->tagId);
        $tag->category_id = $request->categoryId;
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
