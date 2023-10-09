<?php

namespace App\Jobs;

use App\Models\ProductVariation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductVariationImageDownload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ProductVariation
     */
    private $variation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ProductVariation $variation)
    {
        $this->variation = $variation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $this->variation->option_image);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] ?? '');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_NOBODY, true);

            $content = curl_exec($ch);
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

            if (strpos($contentType, 'image/') !== false) {
                $fimg = Image::make($this->variation->option_image)->resize(800, 800);
                $fphoto = time() . Str::random(8) . '.jpg';

                $fimg->save(public_path('assets/images/variation/') . $fphoto);
                $this->variation->option_image = $fphoto;
                $this->variation->save();
            }
        } catch (\Exception $e) {
            Log::error("File: ProductVariationImageDownload: " . $e->getMessage());
        }

    }
}
