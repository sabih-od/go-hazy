<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductPreviousPriceUpdateSeederAgain extends Seeder
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
            if (fmod($product->previous_price, 1) != 0) {
                $newPrice = round($product->previous_price, 1);

                if ($newPrice != $product->previous_price) {
                    $product->previous_price = $newPrice;
                    $product->save();
                }
            }
        }
    }
}
