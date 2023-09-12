<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'テストタイトル１',
            'content' => 'テスト投稿１'
        ]);
        
        Post::create([
            'title' => 'テストタイトル２',
            'content' => 'テスト投稿２'
        ]);
        
        Post::create([
            'title' => 'テストタイトル３',
            'content' => 'テスト投稿３'
        ]);
        
        Post::create([
            'title' => 'テストタイトル４',
            'content' => 'テスト投稿４'
        ]);
    }
}
