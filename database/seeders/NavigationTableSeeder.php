<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $navegation = Navigation::create([
            'name' => 'Menu Items', 
            'icon' => 'fa fa-list',
            'status' => '1',
        ]);
    }
}
