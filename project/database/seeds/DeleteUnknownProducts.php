<?php

namespace Database\Seeders;

use App\Models\ProductVariation;
use App\Models\ProductVariationPrice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DeleteUnknownProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $productPrices = ProductVariationPrice::query()->cursor();

            foreach ($productPrices as $p_price) {
                dump($p_price->id);
                $option_ids = explode(',', $p_price->option_ids);
                $options_q = ProductVariation::query()->whereIn('option_id', $option_ids)->where('product_id', $p_price->product_id);
                if (count($option_ids) != $options_q->count()) {
                    dump("prod:" . $p_price->product_id);
                    $p_price->product()->delete();
                }
            }

        } catch (\Exception $e) {
            dump("Error: " . $e->getMessage());
        }
    }
}
