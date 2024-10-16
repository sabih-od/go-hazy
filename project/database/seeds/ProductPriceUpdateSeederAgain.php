<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductPriceUpdateSeederAgain extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if (fmod($product->price, 1) != 0) {
                $newPrice = round($product->price, 1);

                if ($newPrice != $product->price) {
                    $product->price = $newPrice;
                    $product->save();
                }
            }
        }
    }

}
