<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ReadCsvFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $line;
//    protected $request;
    protected $log;
    protected $i;
    protected $productBatch;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($line, $log, $i)
    {
        $this->line = $line;
//        $this->request = $request;
        $this->log = $log;
        $this->i = $i;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            //--- Logic Section

            if (!Product::where('sku', $this->line[0])->exists()) {

                $data = new Product;
                $sign = Currency::where('is_default', '=', 1)->first();

                $input['type'] = 'Physical';
                $input['sku'] = $this->line[0];

                $input['language_id'] = 1;
                $input['category_id'] = null;
                $input['subcategory_id'] = null;
                $input['childcategory_id'] = null;

                $mcat = Category::firstOrCreate([
                    'name' => $this->line[1]
                ], [
                    'slug' => Str::slug($this->line[1]),
                    'language_id' => 1
                ]);
                if ($mcat->exists()) {
                    $input['category_id'] = $mcat->id;

                    if ($this->line[2] != "") {
                        $scat = Subcategory::firstOrCreate([
                            'name' => $this->line[2],
                            'category_id' => $mcat->id,
                        ], [
                            'slug' => Str::slug($this->line[2]),
                            'language_id' => 1
                        ]);
                        if ($scat->exists()) {
                            $input['subcategory_id'] = $scat->id;

                            if ($this->line[3] != "") {
                                $chcat = Childcategory::firstOrCreate([
                                    'name' => $this->line[3],
                                    'subcategory_id' => $scat->id,
                                ], [
                                    'slug' => Str::slug($this->line[3]),
                                    'language_id' => 1
                                ]);

                                if ($chcat->exists()) {
                                    $input['childcategory_id'] = $chcat->id;
                                }
                            }
                        }
                    }

                    $input['photo'] = 'abc';
                    $input['name'] = $this->line[4];
                    $input['details'] = $this->line[6];
                    $input['color'] = $this->line[13];
                    $input['price'] = $this->line[7];
                    $input['previous_price'] = $this->line[8] != "" ? $this->line[8] : null;
                    $input['stock'] = $this->line[9];
                    $input['size'] = $this->line[10];
                    $input['size_qty'] = $this->line[11];
                    $input['size_price'] = $this->line[12];
                    $input['youtube'] = $this->line[15];
                    $input['policy'] = $this->line[16];
                    $input['meta_tag'] = $this->line[17];
                    $input['meta_description'] = $this->line[18];
                    $input['tags'] = $this->line[14];
                    $input['product_type'] = $this->line[19];
                    $input['affiliate_link'] = $this->line[20];
                    $input['slug'] = Str::slug($input['name'], '-') . '-' . strtolower($input['sku']);

                    // Save Data
                    $data->fill($input)->save();
                    SaveProductImage::dispatch($data->id, $this->line[5], $this->line[21], $this->line[22], $this->line[23]);

                } else {
                    dump("<br>" . __('Row No') . ": " . $this->i . " - " . __('No Category Found!') . "<br>");
                }
            } else {
                dump("<br>" . __('Row No') . ": " . $this->i . " - " . __('Product Sku Already Exist') . "<br>");

            }

        } catch (\Exception $e) {
            dump("<br>" . __('Row No') . ": " . $this->i . " - " . __('Error: ' . $e->getMessage() . ' Line: ' . $e->getLine()) . "<br>");
        }
    }
}
