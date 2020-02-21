<?php

use App\Item;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('items')->insert([
        //     [
        //         'title' => 'FeedForAll Sample Feedc 1', 'description' => '...',
        //         'link' => 'http://www.feedforall.com/industry-solutions.htm', 'category' => '...',
        //         'comments' => '...'
        //     ],
        //     [
        //         'title' => 'FeedForAll Sample Feed 2', 'description' => '...',
        //         'link' => 'http://www.feedforall.com/industry-solutions.htm', 'category' => '...',
        //         'comments' => '...'
        //     ],
        // ]);
        factory(Item::class, 25)->create();
    }
}
