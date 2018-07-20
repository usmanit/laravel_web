<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
        	[
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'title' => 'Tips and Tricks',
                'slug' => 'tigs-and-tricks'
            ],
        	[
        		'title' => 'Build Apps',
        		'slug' => 'build-apps'
        	],
        	[
        		'title' => 'News',
        		'slug' => 'news'
        	],
        	[
        		'title' => 'Freebies',
        		'slug' => 'freebies'
        	],
        
        ]);

        // update the posts data
        $categories = Category::pluck('id');

        foreach (Post::pluck('id') as $postId)
        {
        	$categoryId = rand(1, $categories->count());

        	DB::table('posts')
 Jane Doe  11 months ago  News  PHP, Laravel, Symphony   4 Comments Continue Reading

        	->where('id', $postId)
        	->update(['category_id' => $categoryId]);
        }
    }
}
