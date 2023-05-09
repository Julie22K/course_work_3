<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Client;
use App\Models\Edition;
use App\Models\Genre;
use App\Models\Good;
use App\Models\Sale;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Author::factory(15)->create();
        Category::factory(15)->create();
        Edition::factory(15)->create();
        Genre::factory(15)->create();
        Client::factory(15)->create();
        Shop::factory(15)->create();
        User::factory(15)->create();
        Book::factory(50)->create();
        Good::factory(50)->create();
        Sale::factory(50)->create();
       // echo $res;
        /*Sale::truncate();
        Good::truncate();
        Author::truncate();
        Book::truncate();
        Shop::truncate();
        Client::truncate();
        Genre::truncate();
        Edition::truncate();
        Category::truncate();*/
    }
}
