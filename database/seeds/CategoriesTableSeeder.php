<?php

use Illuminate\Database\Seeder;
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
        $cate_one = new Category();
        $cate_one->slug = 'groove_metal';
        $cate_one->name = 'Groove Metal';
        $cate_one->save();

        $cate_two = new Category();
        $cate_two->slug = 'death_metal';
        $cate_two->name = 'Death Metal';
        $cate_two->save();
    }
}
