<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $item){
            $cat = new Category ;
            $cat->name = "دسته بندی $item";
            $cat->name_en = "category $item";
            if ($item % 2 == 0){
                $cat -> parent_id = ($item-1);
            }
            $cat -> save();
        }
    }
}
