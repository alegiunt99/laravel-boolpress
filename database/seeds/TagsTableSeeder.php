<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['lifestyle', 'luxury', 'likeforlike', 'pefforzah', 'ensomma', 'iocero', 'redditata'];

        foreach($tags as $tag){

            $new_tag_object = new Tag();
            $new_tag_object->name = $tag;
            $new_tag_object->slug = Str::slug($tag);
            $new_tag_object->save();
            
        }
    }
}
