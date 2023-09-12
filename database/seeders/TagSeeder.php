<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => 'タグ1',
            'category_id' => '1'
        ]);
        
        Tag::create([
            'name' => 'タグ2',
            'category_id' => '1'
        ]);
        
        Tag::create([
            'name' => 'タグ3',
            'category_id' => '1'
        ]);
        
        Tag::create([
            'name' => 'タグ4',
            'category_id' => '1'
        ]);
        
        Tag::create([
            'name' => 'タグ21',
            'category_id' => '2'
        ]);
        
        Tag::create([
            'name' => 'タグ22',
            'category_id' => '2'
        ]);
        
        Tag::create([
            'name' => 'タグ23',
            'category_id' => '2'
        ]);
        
        Tag::create([
            'name' => 'タグ24',
            'category_id' => '2'
        ]);
        
        Tag::create([
            'name' => 'タグ31',
            'category_id' => '3'
        ]);
        
        Tag::create([
            'name' => 'タグ32',
            'category_id' => '3'
        ]);
        
        Tag::create([
            'name' => 'タグ33',
            'category_id' => '3'
        ]);
        
        Tag::create([
            'name' => 'タグ34',
            'category_id' => '3'
        ]);
    }
}
