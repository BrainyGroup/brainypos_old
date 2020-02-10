<?php

namespace Tests\Unit;

use Faker\Factory as Faker;


use App\Product;
use Illuminate\Support\Facades\Route;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function test_it_can_create_an_product()
    {
        $data = [
          'name' => 'PHPUnit Mihani',
          'group' => 'PHPunit Gas'
        ];

        Route::post(route('products.store'), $data)
          ->assertStatus(201)
          ->assertJson($data);
    }
}
