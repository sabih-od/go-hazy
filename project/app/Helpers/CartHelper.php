<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationPrice;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartHelper
{

    protected $cart;
    protected $cartData;
    protected $totalPrice;

    public function __construct()
    {
        $this->cart = self::getCart();
        return $this->cart;
    }


    protected function isVariationEmpty($variation_id)
    {
        return collect($this->cart)->filter(function ($item) use ($variation_id) {
            return isset($item['productPriceID']) && $item['productPriceID'] == $variation_id;
        })->isEmpty();
    }

    protected function isItemsEmpty($product_id)
    {
        return collect($this->cart)->filter(function ($item) use ($product_id) {
            return !isset($item['productPriceID']) && $item['id'] == $product_id;
        })->isEmpty();
    }

    protected function addRow($product_id, $qty, $variation_id = null)
    {
        $newRow = [
            "row_id" => Str::uuid(),
            "id" => $product_id,
            "qty" => $qty
        ];

        if (!empty($variation_id))
            $newRow['productPriceID'] = $variation_id;

        return collect($this->cart)->add($newRow)->toArray();
    }

    public function addItem($product_id, $qty, $variation_id = null)
    {
        if (!empty($variation_id)) {
            if ($this->isVariationEmpty($variation_id)) {
                $new_cart = $this->addRow($product_id, $qty, $variation_id);
            } else {
                $new_cart = collect($this->cart)->map(function ($item) use ($qty, $variation_id) {
                    if (isset($item['productPriceID']) && $item['productPriceID'] == $variation_id) {
                        $item['qty'] = intval($item['qty']) + $qty;
                    }
                    return $item;
                })->toArray();
            }
        } elseif (!$this->isItemsEmpty($product_id)) {
            $new_cart = collect($this->cart)->map(function ($item) use ($qty, $product_id) {
                if ($item['id'] == $product_id) {
                    $item['qty'] = intval($item['qty']) + $qty;
                }
                return $item;
            })->toArray();
        } else {
            $new_cart = $this->addRow($product_id, $qty);
        }
        self::updateCart($new_cart);
    }

    public function getData()
    {
        if (!empty($this->cartData)) return $this->cartData;

        $rows = collect(self::getCart());

        $prd_ids = $rows->pluck('id')->filter(function ($item) {
            return !empty($item);
        })->toArray();

        $products = collect([]);
        if (!empty($prd_ids)) {
            $products = Product::query()->whereIn('id', $prd_ids)->get();
        }

        $price_ids = $rows->pluck('productPriceID')->filter(function ($item) {
            return !empty($item);
        })->toArray();

        $prd_prices = collect([]);
        if (!empty($price_ids)) {
            $prd_prices = ProductVariationPrice::query()->whereIn('id', $price_ids)->get();
        }

        $option_ids = $prd_prices->map(function ($item) {
            return [
                'option_ids' => explode(',', $item->option_ids),
                'product_id' => $item->product_id
            ];
        });
        $product_ids = $option_ids->pluck('product_id')->flatten()->toArray();
        $option_ids = $option_ids->pluck('option_ids')->flatten()->toArray();

        $options = collect([]);
        if (!empty($product_ids) && !empty($option_ids)) {
            $options = ProductVariation::query()
                ->select('product_id', 'option_id', 'option_display_name', 'option_type')
                ->whereIn('product_id', $product_ids)
                ->whereIn('option_id', $option_ids)->get();
        }

        $totalProductPrice = 0;
        $this->cartData = $rows->map(function ($item) use (&$totalProductPrice, $options, $prd_prices, $products) {
            $prd = $products->where('id', $item['id'])->first();
            if ($prd) {
                $show_price = !empty($prd->previous_price) ? $prd->price : $prd->previous_price;
                $img = asset('assets/images/products/' . $prd->thumbnail);
                // if variation product
                if (isset($item['productPriceID']) && $prd_price = $prd_prices->where('id', $item['productPriceID'])->first()) {
                    $show_price = !empty($prd_price->sale_price) ? $prd_price->sale_price : $prd_price->original_price;
                    $item['price'] = $prd_price;
                    $item['options'] = [];
                    $options_ids = explode(',', $prd_price->option_ids);
                    foreach ($options_ids as $o_id) {
                        $option = $options->where('option_id', $o_id)->where('product_id', $item['id'])->first();
                        $img = !empty($option->option_image) ? asset("assets/images/variation/" . $option->option_image) : $img;
                        $item['options'][] = $option;
                    }
                }
                $item['image'] = $img;
                $item['show_price'] = $show_price;
                $item['show_total_price'] = $show_price * intval($item['qty']);
                $totalProductPrice += $item['show_total_price'];
            }
            $item['product'] = $prd;
            return $item;
        });
        $this->totalPrice = $totalProductPrice;
        return $this->cartData;
    }

    public function getTotalPrice()
    {
        if (empty($this->cartData)) $this->getData();

        return $this->totalPrice;
    }

    public function totalQty()
    {
        return self::getCartTotalQty();
    }

    /**
     * Static functions
     */

    public static function getCart()
    {
        return Session::get('cart', []);
    }

    public static function getCartTotalQty()
    {
        return collect(self::getCart())->sum('qty');
    }

    public static function isCartEmpty()
    {
        return collect(self::getCart())->count() < 1;
    }

    public static function updateCart($cart)
    {
        Session::put('cart', $cart);
    }

    public static function removeRow($row_id)
    {
        $cartUpdate = collect(self::getCart())->filter(function ($item) use ($row_id) {
            return $item['row_id'] != $row_id;
        })->toArray();
        self::updateCart($cartUpdate);
    }
}
