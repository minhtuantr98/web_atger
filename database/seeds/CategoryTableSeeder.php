<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['cate_name'=>'Bánh sinh nhật xe hơi','cate_slug'=>'banh-sinh-nhat-xe-hoi'],
            ['cate_name'=>'Bánh sinh nhật hoạt hình ','cate_slug'=>'banh-sinh-nhat-hoat-hinh'],

        ];
        DB::table('tbl_categories')->insert($data);
    }
}
