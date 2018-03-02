<?php

use Illuminate\Database\Seeder;
use App\Blog;


class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_one = new Blog();
        $blog_one->title = 'Machine Head - Catharsis';
        $blog_one->slug = 'machine-head-catharsis';
        $blog_one->meta_title = 'Machine Head - Catharsis';
        $blog_one->meta_desc = 'Machine Head - Catharsis';
        $blog_one->body = 'Ahead of the release of the Bay Area band\'s ninth full-length, MACHINE HEAD\'s central figure, Robb Flynn, stated that the album isn\'t one of the unit\'s heaviest. The notorious frontman doesn\'t listen to a lot of metal these days, in fact. His hardcore, punk rock and hip hop listening habits surface on the quartet\'s latest effort. It goes without saying that Flynn has taken bold moves in his career. Whatever his motivations might have been for the more accessible sounds and stylistic shift on "Catharsis", the results aren\'t pretty.';
        $blog_one->save();

        $blog_two = new Blog();
        $blog_two->title = 'The Faceless - In Becoming a Ghost';
        $blog_two->slug = 'the-faceless-becoming-a-ghost';
        $blog_two->meta_title = 'The Faceless - In Becoming a Ghost';
        $blog_two->meta_desc = 'The Faceless - In Becoming a Ghost';
        $blog_two->body = 'Between dropping off tours and not putting out a new album for years, The Faceless have found themselves at the brunt of many jokes. Getting tossed in with the likes of Tool and Necrophagist, many folks were starting to think that the band would never get around to putting out another record. But here we are, five years later, and the band has officially released their fourth studio album In Becoming A Ghost (Sumerian).  When it comes to such highly anticipated releases that have taken years to come out, one fear immediately comes to mind… Will it be any good after all this time?';
        $blog_two->save();
    }
}
