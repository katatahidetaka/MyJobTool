<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
    
    public function getCategoryList()
    {
        $categories = Self::with('tags')->get();
        $categoryList = [];
        
        foreach ($categories as $category) {
            $categoryList[$category->id][$category->name] = [];
            $tagArray = [];
            foreach ($category->tags as $tag) {
                $tagArray[$tag->id] = $tag->name;
            }
            $categoryList[$category->id][$category->name] = $tagArray;
        }        
        return $categoryList;
    }
    
    public function getCategoriesArray():array
    {
        $categories = self::all();
        $categoriesArray = [];
        foreach ($categories as $category){
            $categoriesArray[$category->id] = $category->name;
        }
        return $categoriesArray;
    }
    
    public function getTagList()
    {
        $categories = self::with('tags')->get();
        $tagList = [];
        foreach($categories as $category){
            foreach($category->tags as $tag){
                $tagList[$tag->id] = $tag->name;
            }
        }
        return $tagList;
    }
}
