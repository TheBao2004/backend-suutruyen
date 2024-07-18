<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Chap;
use App\Models\Comic;
use App\Models\Keyword;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = new User();

        // $user->name = "Admin";
        // $user->email = "admin@gmail.com";
        // $user->password = Hash::make("123456");

        // $user->save();


        // for ($i=0; $i < 10; $i++) {

        //     $cate = new Category();

        //     $cate->name = "Danh mục $i";
        //     $cate->slug = createSlug("Danh mục $i");
        //     $cate->cate_id = 0;

        //     $cate->save();

        // }


        // for ($i=0; $i < 10; $i++) {

        //     $key = new Keyword();

        //     $key->name = "Từ khóa $i";
        //     $key->slug = createSlug("Từ khóa $i");

        //     $key->save();

        // }



        // for ($i=0; $i < 10; $i++) {

        //     $comic = new Comic();

        //     $comic->name = "Truyện $i";
        //     $comic->slug = createSlug("Truyện $i");
        //     $comic->categories = json_encode([
        //         'danh-muc-0',
        //         'danh-muc-1',
        //         'danh-muc-2',
        //         'danh-muc-3',
        //         'danh-muc-4',
        //         'danh-muc-5',
        //         'danh-muc-6',
        //         'danh-muc-7',
        //         'danh-muc-8',
        //         'danh-muc-9',
        //     ]);
        //     $comic->keywords = json_encode([
        //         'tu-khoa-0',
        //         'tu-khoa-1',
        //         'tu-khoa-2',
        //         'tu-khoa-3',
        //         'tu-khoa-4',
        //         'tu-khoa-5',
        //         'tu-khoa-6',
        //         'tu-khoa-7',
        //         'tu-khoa-8',
        //         'tu-khoa-9',
        //     ]);
        //     $comic->thumbnail = "image_jisoo.jpg";
        //     $comic->description = "Profile Kim Ji Soo (김지수; born Jan 3, 1995), simply known as Jisoo, is a South Korean actress, singer, dancer, and a member of the Kpop girl group BLACKPINK under YG Entertainment. She made her debut with Blackpink on Aug 8, 2016 at the age of 21.";

        //     $comic->save();

        // }


        // $content = '["Black Pick\/59939663_HD-wallpaper-blackpink-lisa-lala.jpg","Black Pick\/90281861_OIP (1).jfif","Black Pick\/94112699_blackpink-s-gorgeous-jisoo-for-vogue-photoshoot-2020-wallpaper-1536x2048_203.jpg","Black Pick\/rose-chong-cam-mac-vay-do.jpg"]';

        // for ($i=1; $i <= 10; $i++) {

        //     $chap = new Chap();

        //     $chap->name = "Chương $i";
        //     $chap->slug = createSlug("Chương $i");
        //     $chap->comic_id = $i;
        //     $chap->content = $content;

        //     $chap->save();

        // }



















            // for ($i=1; $i <= 15; $i++) {

            //     $comic = new Comic();

            //     $comic->name = "Model $i";
            //     $comic->slug = createSlug("Model $i");
            //     $comic->active = 1;
            //     $comic->categories = '["danh-muc-1","danh-muc-2","danh-muc-3","danh-muc-4","danh-muc-5","danh-muc-6","danh-muc-7","danh-muc-8","danh-muc-9","danh-muc-10","danh-muc-11","danh-muc-12","danh-muc-13","danh-muc-14","danh-muc-15"]';
            //     $comic->keywords = '["tu-khoa-1","tu-khoa-2","tu-khoa-3","tu-khoa-4","tu-khoa-5","tu-khoa-6","tu-khoa-7","tu-khoa-8","tu-khoa-9","tu-khoa-10","tu-khoa-23","tu-khoa-24","tu-khoa-25"]';
            //     $comic->thumbnail = 'image_jisoo.jpg';
            //     $comic->status = 1;
            //     $comic->description = "Profile Kim Ji Soo (김지수; born Jan 3, 1995), simply known as Jisoo, is a South Korean actress, singer, dancer, and a member of the Kpop girl group BLACKPINK under YG Entertainment. She made her debut with Blackpink on Aug 8, 2016 at the age of 21.";
            //     $comic->book = 1;
            //     $comic->created_at = date('Y-m-d H:i:s');

            //     $comic->save();

            // }


            // $content = '["Black Pick\/59939663_HD-wallpaper-blackpink-lisa-lala.jpg","Black Pick\/90281861_OIP (1).jfif","Black Pick\/94112699_blackpink-s-gorgeous-jisoo-for-vogue-photoshoot-2020-wallpaper-1536x2048_203.jpg","Black Pick\/rose-chong-cam-mac-vay-do.jpg","uploads\/image_jisoo.jpg","uploads\/image_rose.jpg"]';

            // for ($i=4; $i <= 54; $i++) {

            //     $chap = new Chap();

            //     $chap->name = "Chương $i";
            //     $chap->slug = createSlug("doa-hoa-no-tua-tu-la-chuong-$i-364644");
            //     $chap->comic_id = 14;
            //     $chap->active = 1;
            //     $chap->content = $content;
            //     $chap->stt = $i;

            //     $chap->save();

            // }



    }
}
