<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            [
                'email'=>"nguyentheanh.25049x@gmail.com", 
                'name'=>'Anhtger',
                'password'=>bcrypt('123456'),
                'address'=>"Hà Nội",
                'phone'=>"0369574122",
                'status'=>1,
                'level'=>1
                ]
        ];
        DB::table('tbl_admin')->insert($data);
    }
}
