<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new Cities();
        $city->id = 1;
        $city->name = 'Hà Nội';
        $city->save();

        $city = new Cities();
        $city->id = 2;
        $city->name = 'Thanh Hóa';
        $city->save();

    }
}
