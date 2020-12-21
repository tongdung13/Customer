<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->id = 1;
        $customer->name = "tong van dung";
        $customer->dob  = "1989-06-13";
        $customer->email = 'vuivui@gmail.com';
        $customer->city_id = 1;
        $customer->image = 'image1.jpg';
        $customer->save();

        $customer = new Customer();
        $customer->id = 2;
        $customer->name = 'nguyen thi hien';
        $customer->dob  = "1996-08-12";
        $customer->email = "hiennguyen@gmail.com";
        $customer->city_id = 2;
        $customer->image = "hien.jpg";
        $customer->save();
    }
}
