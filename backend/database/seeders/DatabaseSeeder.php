<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //add entity_types

        $entity_id = 'id';
        $type = 'type';
        $created_at = 'created_at';
        $updated_at = 'updated_at';
        $entity_types = [];

        foreach (config('names_to_db.entity_types') as $key => $item) {
            $entity_types[$key][$entity_id] = $key + 1;
            $entity_types[$key][$type] = $item['slug'];
            $entity_types[$key][$created_at] = Date::now();
            $entity_types[$key][$updated_at] = Date::now();
        }

        //add categories

        $categories_id = 'id';
        $categories_title = 'title';
        $categories_slug = 'slug';
        $category_type_id = 'category_type_id';
        $categories = [];

        foreach (config('names_to_db.categories') as $key => $item) {
            $categories[$key][$categories_id] = $key + 1;
            $categories[$key][$categories_title] = $item['category_title'];
            $categories[$key][$categories_slug] = $item['category_slug'];
            $categories[$key][$category_type_id] = (int) $item['category_id'];
        }

        //add category_types

        $category_types_id = 'id';
        $category_types_title = 'title';
        $category_types_slug = 'slug';
        $category_types = [];

        foreach (config('names_to_db.category_types') as $key => $item) {
            $category_types[$key][$category_types_id] = $key + 1;
            $category_types[$key][$category_types_title] = $item['category_title'];
            $category_types[$key][$category_types_slug] = $item['category_slug'];
        }

        DB::table('entity_types')->insert($entity_types);
        DB::table('category_types')->insert($category_types);
        DB::table('categories')->insert($categories);
    }
}
