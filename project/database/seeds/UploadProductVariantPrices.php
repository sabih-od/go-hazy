<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\LazyCollection;
use League\Csv\Reader;

class UploadProductVariantPrices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $filePath = database_path('seeds_data/fetch-ae-prds-prices.csv');

            if (!file_exists($filePath)) {
                dump('File not found: ' . $filePath);
                return;
            }

            $rows = LazyCollection::make(function () use ($filePath) {
                $csv = Reader::createFromPath($filePath);
                $csv->setHeaderOffset(0);

                foreach ($csv->getRecords() as $record) {
                    yield $record;
                }
            });

            $rows->each(function($row) {
                dump($row['product_id']);
                $prd = Product::query()->where('sku', 'ae_' . $row['product_id'])->first();
                if ($prd) {
                    $prd->productPrices()->updateOrCreate([
                        "option_ids" => $row['option_ids']
                    ], [
                        "available_quantity" => $row['available_quantity'],
                        "original_price" => $row['original_price'],
                        "sale_price" => $row['sale_price']
                    ]);
                } else {
                    Log::error("UploadProductVariantPrices not found: " . $row['product_id']);
                }
            });

        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }
}
