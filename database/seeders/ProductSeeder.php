<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run(): void
    {

//        DB::table('products')->insert([
//            'name' => 'abc',
//            'product_price' =>'200000',
//            'view' => '5',
//            'created_at' => Carbon::now(),
//            'updated_at'=> Carbon::now(),
//
//        ]);
        Product::factory()->count(10)->create();
    }
}
