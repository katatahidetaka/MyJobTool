<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;

class SearchService
{   
    public function boolTagIsNull(int $id):bool
    {
        return Tag::find($id) === null;
    }
    /**
     * タグIDと紐づくpostを取得して返す
     * @param int $id
     * @return array　['posts' => $posts, 'tagName' => $tagName]
     */
    public function getPostSearchedByTags(int $id):array
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $tagName = $tag->name;
        
        return ['posts' => $posts, 'tagName' => $tagName];
    }
    /**
     * 検索ワードの空白文字の変換と切り分け、部分一致検索
     * 
     * @param string $inputKeyword
     * @return Object
     */
    public function getPostSearchedByKeywords(?string $inputKeyword):object
    {
        $keywords = [];
        $keywords = self::procKeywords($inputKeyword);
        
        foreach ($keywords as $keyword) {
            $keyword = addcslashes($keyword, '%_\\');
            $posts = Post::where('title', 'like', '%'. $keyword. '%')
            ->orwhere('content', 'like', '%'. $keyword. '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        }
        
        return $posts;
    }
    
    /**
     * 全角スペースを半角スペースに変換後、連続する空白文字を1つの半角スペースに
     * @param string $input
     * @return array
     */
    private function procKeywords(?string $input):array
    {
        $keywords = str_replace('　', ' ', $input);
        $keywords = preg_replace('/\s++/', ' ', $keywords);
        
        return preg_split('/ ++/', $keywords);
    }
}