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
    
    public function getCategoryList(): array
    {
        $categories = self::with('tags')->get();
        $categoryList = [];
        foreach($categories as $category){
            foreach($category->tags as $tag){
                $categoryList[$category->id][$category->name][$tag->id] = $tag->name;
            }
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
}
