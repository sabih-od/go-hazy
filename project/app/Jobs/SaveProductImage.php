<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Image;

class SaveProductImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image_urls = [];
    protected $product_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product_id, $image_url, $gallery1 = "", $gallery2 = "", $gallery3 = "")
    {
        $this->product_id = $product_id;
        $this->image_urls[] = $image_url;

        if (!empty($gallery1))
            $this->image_urls[] = $gallery1;
        if (!empty($gallery2))
            $this->image_urls[] = $gallery2;
        if (!empty($gallery3))
            $this->image_urls[] = $gallery3;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->image_urls as $ind => $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT'] ?? '');
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_NOBODY, true);

            $content = curl_exec($ch);
            $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

            $input = [];
            $thumb_url = '';

            if (strpos($contentType, 'image/') !== false) {
                $fimg = Image::make($url)->resize(800, 800);
                $fphoto = time() . Str::random(8) . '.jpg';

                if ($ind > 0) {
                    $fimg->save(public_path() . '/assets/images/galleries/' . $fphoto);
                    $input['photo'] = $fphoto;
                } else {
                    $fimg->save(public_path() . '/assets/images/products/' . $fphoto);
                    $input['photo'] = $fphoto;
                    $thumb_url = $url;
                }
            } else {
                if ($ind < 1) {
                    $fimg = Image::make(public_path() . '/assets/images/noimage.png')->resize(800, 800);
                    $fphoto = time() . Str::random(8) . '.jpg';
                    $fimg->save(public_path() . '/assets/images/products/' . $fphoto);
                    $input['photo'] = $fphoto;
                    $thumb_url = public_path() . '/assets/images/noimage.png';
                }
            }

            if ($ind < 1) {
                $timg = Image::make($thumb_url)->resize(285, 285);
                $thumbnail = time() . Str::random(8) . '.jpg';
                $timg->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
                $input['thumbnail'] = $thumbnail;
            }

            $prd = Product::find($this->product_id);
            if ($prd) {
                if ($ind < 1) {
                    $prd->photo = $input['photo'];
                    $prd->thumbnail = $input['thumbnail'];
                    $prd->save();
                } elseif (isset($input['photo'])) {
                    $prd->galleries()->create([
                        'photo' => $input['photo']
                    ]);
                }
            }
        }
    }
}
