<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\LazyCollection;
use League\Csv\Reader;

class UploadProductVariants extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $filePath = database_path('seeds_data/fetch-ae-prds-variants.csv');

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
                    $prd->productVariants()->updateOrCreate([
                        "option_type" => $row['option_type'],
                        "option_id" => $row['option_id'],
                    ], [
                        "option_name" => $row['option_name'],
                        "option_display_name" => $row['option_display_name'],
                        "option_image" => $row['option_image']
                    ]);
                } else {
                    Log::error("UploadProductVariants not found: " . $row['product_id']);
                }
            });
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }
}
