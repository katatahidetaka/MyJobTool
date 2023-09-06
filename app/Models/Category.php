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
        $categoryList=[];
        foreach($categories as $category){
            foreach($category->tags as $tag){
                $categoryList[$category->name][] = $tag->name;
            }
        }
        return $categoryList;
    }
}
