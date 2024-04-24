<?php

namespace App\Console\Commands;

use App\Jobs\ProductVariationImageDownload;
use App\Jobs\SaveProductImage;
use App\Models\ProductVariation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PVImageJobDispatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:job_images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product variation images download job dispatch.';

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
        try {

            $variations = ProductVariation::where('option_image', '<>', '')
                ->whereNotNull('option_image')
                ->cursor();

            foreach ($variations as $variation) {
                if (filter_var($variation->option_image, FILTER_VALIDATE_URL)) {
                    dispatch(new ProductVariationImageDownload($variation));
                }
            }

        } catch (\Exception $error) {
            Log::error("File: PVImageJobDispatch: ". $error->getMessage());
        }

        return 0;
    }

}
