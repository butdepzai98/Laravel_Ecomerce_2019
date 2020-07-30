<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Nguyễn Xuân Vinh','email' => 'xuanvinh@gmail.com','password' => Hash::make('123456'),'role' => 1,],
            ['name' => 'Thủ Kho','email' => 'thukho@gmail.com','password' => Hash::make('123456'),'role' => 2,],
            ['name' => 'Quản lý Khách Hàng','email' => 'qlkh@gmail.com','password' => Hash::make('123456'),'role' => 3,]
        ]);
    }
}
