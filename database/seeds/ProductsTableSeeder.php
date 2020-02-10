<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        DB::table('products')->insert([
            'name' => 'Oryx Gas 12.5Kg',
            'brand' => 'Oryx',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'12.5',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'oryx12_5kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Lake Gas 12.5Kg',
            'brand' => 'Lake',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'12.5',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'lake12_5kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Mihani Gas 12.5Kg',
            'brand' => 'Mihani',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'12.5',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'mihani12_5kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Oryx Gas 6Kg',
            'brand' => 'Oryx',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'6',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'oryx6kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Lake Gas 6Kg',
            'brand' => 'Lake',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'6',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'lake6kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Mihanu Gas 6Kg',
            'brand' => 'Mihani',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'6',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'mihani6kg',
        ]);



        DB::table('products')->insert([
            'name' => 'Serengeti Kubwa',
            'brand' => 'Serengeti Premium Lager',
            'type' => 'Alcohol',
            'group' => 'Drinks',
            'category' => 'Beer',
            'description' => 'Serengeti Bia Kubwa',
            'size' =>'500ml',
            'package_unit' =>'crate',
            'package_quantity' => 20,
            'unit' =>'bottle',
            'photo' =>'serengeti_kubwa',
        ]);

        DB::table('products')->insert([
            'name' => 'Serengeti Ndogo',
            'brand' => 'Serengeti lite',
            'type' => 'Alcohol',
            'group' => 'Drinks',
            'category' => 'Beer',
            'description' => 'Serengeti bia ndogo',
            'size' =>'330ml',
            'package_unit' =>'crate',
            'package_quantity' => 24,
            'unit' =>'Bottle',
            'photo' =>'lake12_5kg',
        ]);

        DB::table('products')->insert([
            'name' => 'Mihani Gas 12.5Kg',
            'brand' => 'Mihani',
            'type' => 'Gas',
            'group' => '',
            'category' => '',
            'description' => 'Gas Exchange',
            'size' =>'12.5',
            'package_unit' =>'pc',
            'package_quantity' => 1,
            'unit' =>'pc',
            'photo' =>'mihani12_5kg',
        ]);


    }
}
