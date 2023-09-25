<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ThirtyPercentAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:thirty-percent-add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("thirty-percent-add === Start Comment");
        try {
            \DB::connection()->enableQueryLog();
            $percentageToAdd = 30;

            $products = Product::get();

            foreach ($products as $product) {
                $product_price = $product->price;
                $newPrice = $product_price + (($product_price * $percentageToAdd)/100);
                $convertPrice = number_format($newPrice,2);
                $product->update(['price' => $convertPrice]);
            }

        } catch (\Exception $e) {
//            dump("Error: " . $e->getMessage());
            Log::error($e->getMessage());
        }
        Log::info("thirty-percent-add === End Comment");

        return 0;
    }
}
