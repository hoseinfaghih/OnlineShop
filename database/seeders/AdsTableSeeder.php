<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ad;
class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,30) as $item){
            $ad = new Ad;
            $ad->title = "title $item";
            $ad->user_id = $item;
            $ad->description = "in matn havie descriptione ade $item ast!";
            $ad->image_url = "image/logo.png";
            $ad->category_id = $item;
            $ad->price = $item*10000;
            $ad->address = "address $item om";
            $x = $item % 10;
            $ad->phone_number = "0915132$x$x$x$x";
            $ad->save();
        }
    }
}
