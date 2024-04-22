<?php

namespace App\Http\Controllers\Front;

use App\{Classes\GeniusMailer,
    Helpers\CartHelper,
    Models\Cart,
    Models\Product,
    Models\ProductVariation,
    Models\ProductVariationPrice,
    Models\VeteranDiscount
};
use App\Models\Country;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class CartController extends FrontBaseController
{

    public function cart(Request $request)
    {
        try {
            $productData = new CartHelper();
            $totalProductPrice = $productData->getTotalPrice();
            $productData = $productData->getData();

            return view('frontend.cart', compact('productData', 'totalProductPrice'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }


//        $products = [];
//        $totalProductPrice = 0;

//        foreach ($productData as $product) {
//            $get_product = Product::where('id', $product['id'])->first();
//            $productInfo = [
//                'id' => $get_product->id,
//                'product_name' => $get_product->name,
//                'qty' => $product['qty'],
//            ];
//
//            // variation products
//            if (isset($product['productPriceID'])) {
//                $productsVarPrice = $get_product->productPrices()
//                    ->where('id', $product['productPriceID'])
//                    ->first();
//
//                $productInfo['original_price'] = $productsVarPrice->original_price;
//                $productInfo['sale_price'] = $productsVarPrice->sale_price;
//
//                if ($productsVarPrice->original_price != 0) {
////                    $priceDifference = $productsVarPrice->original_price - $productsVarPrice->sale_price;
////                    $productInfo['product_total'] = $priceDifference;
//
//                    $discountPercentage = ($productsVarPrice->sale_price / $productsVarPrice->original_price) * 100;
//                    $productInfo['discount_percentage'] = number_format($discountPercentage, 2) . '%';
//                }
//
//                $productsVar = $get_product->productVariants()
//                    ->where('product_id', $get_product->id)
//                    ->first();
//                $productInfo['variation'] = $productsVar->option_name;
//                $productInfo['variation_product_image'] = $productsVar->option_image;
//
//                // total
//                $productInfo['total'] = $productsVarPrice->sale_price * $product['qty'];
//                $totalProductPrice += $productsVarPrice->sale_price * $product['qty'];
//            } else {
//
//                // without variation product
////                $productInfo['previous_price'] = $get_product->previous_price;
////                $productInfo['price'] = $get_product->price;
//                $productInfo['original_price'] = $get_product->previous_price;
//                $productInfo['sale_price'] = $get_product->price;
//                $productInfo['product_image'] = $get_product->thumbnail;
//
//                if ($get_product->previous_price != 0) {
//                    $discountPercentage = ($get_product->previous_price / $get_product->price) * 100;
//                    $productInfo['discount_percentage'] = number_format($discountPercentage, 2) . '%';
//                }
//
//                // total
//                $productInfo['total'] = $get_product->price * $product['qty'];
//                $totalProductPrice += $get_product->price * $product['qty'];
//            }
//
//            $products[] = $productInfo;
//        }
//        return view('frontend.cart', compact('products', 'totalProductPrice'));


//        if (!Session::has('cart')) {
//            $products = [];
//            return view('frontend.cart', compact('products'));
//        }
//
//        if (Session::has('already')) {
//            Session::forget('already');
//        }
//        if (Session::has('coupon')) {
//            Session::forget('coupon');
//        }
//        if (Session::has('coupon_total')) {
//            Session::forget('coupon_total');
//        }
//        if (Session::has('coupon_total1')) {
//            Session::forget('coupon_total1');
//        }
//        if (Session::has('coupon_percentage')) {
//            Session::forget('coupon_percentage');
//        }
//
//        $oldCart = Session::get('cart');
//        $cart = new Cart($oldCart);
//        $products = $cart->items;
//
//        $totalPrice = $cart->totalPrice;
//        $mainTotal = $totalPrice;
////        dd($products);
//
////        dd(Session::has('cart'), $products);
//        if ($request->ajax()) {
//            return view('frontend.ajax.cart-page', compact('products', 'totalPrice', 'mainTotal'));
//        }
//        return view('frontend.cart', compact('products', 'totalPrice', 'mainTotal'));
    }

    public function cartview()
    {

        return view('load.cart');
    }

    public function view_cart()
    {

        if (!Session::has('cart')) {
            return view('frontend.cart');
        }
        if (Session::has('already')) {
            Session::forget('already');
        }
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        if (Session::has('coupon_total')) {
            Session::forget('coupon_total');
        }
        if (Session::has('coupon_total1')) {
            Session::forget('coupon_total1');
        }
        if (Session::has('coupon_percentage')) {
            Session::forget('coupon_percentage');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $mainTotal = $totalPrice;
        return view('frontend.ajax.cart-page', compact('products', 'totalPrice', 'mainTotal'));

    }

    public function addcart($id)
    {

        $prod = Product::where('id', '=', $id)->first(['id', 'user_id', 'slug', 'name', 'photo', 'size', 'size_qty', 'size_price', 'color', 'price', 'stock', 'type', 'file', 'link', 'license', 'license_qty', 'measure', 'whole_sell_qty', 'whole_sell_discount', 'attributes', 'size_all', 'color_all']);

        // Set Attrubutes

        $keys = '';
        $values = '';
        if (!empty($prod->license_qty)) {
            $lcheck = 1;
            foreach ($prod->license_qty as $ttl => $dtl) {
                if ($dtl < 1) {
                    $lcheck = 0;
                } else {
                    $lcheck = 1;
                    break;
                }
            }
            if ($lcheck == 0) {
                return 0;
            }
        }

        // Set Size
//dd($id);
        $size = '';
        if (!empty($prod->size)) {
            $size = trim($prod->size[0]);
        }
        $size = str_replace(' ', '-', $size);

        // Set Color

        $color = '';
        if (!empty($prod->color)) {
            $color = $prod->color[0];
            $color = str_replace('#', '', $color);
        }

        if ($prod->stock_check == 0) {
            if (empty($size)) {

                if (!empty($prod->size_all)) {
                    $size = trim(explode(',', $prod->size_all)[0]);
                }
                $size = str_replace(' ', '-', $size);
            }

            if (empty($color)) {
                if (!empty($prod->color_all)) {
                    $color = str_replace('#', '', explode(',', $prod->color_all)[0]);
                }
            }
        }

        // Vendor Comission

        if ($prod->user_id != 0) {
            $gs = Generalsetting::findOrFail(1);
            $prc = $prod->price + $gs->fixed_commission + ($prod->price / 100) * $gs->percentage_commission;
            $prod->price = round($prc, 2);
        }


        // Set Attribute


        if (!empty($prod->attributes)) {
            $attrArr = json_decode($prod->attributes, true);

            $count = count($attrArr);
            $i = 0;
            $j = 0;
            if (!empty($attrArr)) {
                foreach ($attrArr as $attrKey => $attrVal) {

                    if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {
                        if ($j == $count - 1) {
                            $keys .= $attrKey;
                        } else {
                            $keys .= $attrKey . ',';
                        }
                        $j++;

                        foreach ($attrVal['values'] as $optionKey => $optionVal) {

                            $values .= $optionVal . ',';
                            $prod->price += $attrVal['prices'][$optionKey];
                            break;
                        }

                    }
                }

            }

        }
        $keys = rtrim($keys, ',');
        $values = rtrim($values, ',');


        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->add($prod, $prod->id, $size, $color, $keys, $values);
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['dp'] == 1) {
            return 'digital';
        }
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['stock'] < 0) {
            return 0;
        }
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
            if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['qty'] > $cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
                return 0;
            }
        }
        $cart->totalPrice = 0;
        foreach ($cart->items as $data)
            $cart->totalPrice += $data['price'];
        Session::put('cart', $cart);
        $data[0] = count($cart->items);
        return response()->json($data);
    }

    public function addtocart($id)
    {
        $prod = Product::where('id', '=', $id)->first(['id', 'user_id', 'slug', 'name', 'photo', 'size', 'size_qty', 'size_price', 'color', 'price', 'stock', 'type', 'file', 'link', 'license', 'license_qty', 'measure', 'whole_sell_qty', 'whole_sell_discount', 'attributes', 'minimum_qty', 'size_all', 'color_all']);

        // Set Attrubutes

        $keys = '';
        $values = '';
        if (!empty($prod->license_qty)) {
            $lcheck = 1;
            foreach ($prod->license_qty as $ttl => $dtl) {
                if ($dtl < 1) {
                    $lcheck = 0;
                } else {
                    $lcheck = 1;
                    break;
                }
            }
            if ($lcheck == 0) {
                return 0;
            }
        }

        // Set Size

        $size = '';
        if (!empty($prod->size)) {
            $size = trim($prod->size[0]);
        }

        // Set Color

        $color = '';
        if (!empty($prod->color)) {
            $color = $prod->color[0];
            $color = str_replace('#', '', $color);
        }

        if ($prod->stock_check == 0) {
            if (empty($size)) {

                if (!empty($prod->size_all)) {
                    $size = trim(explode(',', $prod->size_all)[0]);
                }
                $size = str_replace(' ', '-', $size);
            }

            if (empty($color)) {
                if (!empty($prod->color_all)) {
                    $color = str_replace('#', '', explode(',', $prod->color_all)[0]);
                }
            }
        }

        if ($prod->user_id != 0) {

            $prc = $prod->price + $this->gs->fixed_commission + ($prod->price / 100) * $this->gs->percentage_commission;
            $prod->price = round($prc, 2);
        }

        // Set Attribute

        if (!empty($prod->attributes)) {
            $attrArr = json_decode($prod->attributes, true);

            $count = count($attrArr);
            $i = 0;
            $j = 0;
            if (!empty($attrArr)) {
                foreach ($attrArr as $attrKey => $attrVal) {

                    if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {
                        if ($j == $count - 1) {
                            $keys .= $attrKey;
                        } else {
                            $keys .= $attrKey . ',';
                        }
                        $j++;

                        foreach ($attrVal['values'] as $optionKey => $optionVal) {

                            $values .= $optionVal . ',';

                            $prod->price += $attrVal['prices'][$optionKey];
                            break;

                        }

                    }
                }

            }

        }
        $keys = rtrim($keys, ',');
        $values = rtrim($values, ',');

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        if (!empty($cart->items)) {
            if (!empty($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)])) {
                $minimum_qty = (int)$prod->minimum_qty;
                if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['qty'] < $minimum_qty) {
                    return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                }
            } else {
                $minimum_qty = (int)$prod->minimum_qty;
                if ($prod->minimum_qty != null) {
                    if (1 < $minimum_qty) {
                        return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                    }
                }
            }
        } else {
            $minimum_qty = (int)$prod->minimum_qty;
            if ($prod->minimum_qty != null) {
                if (1 < $minimum_qty) {
                    return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                }
            }
        }

        $cart->add($prod, $prod->id, $size, $color, $keys, $values);

        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['dp'] == 1) {
            return redirect()->route('front.cart')->with('unsuccess', __('This item is already in the cart.'));
        }
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['stock'] < 0) {
            return redirect()->route('front.cart')->with('unsuccess', __('Out Of Stock.'));
        }
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
            if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['qty'] > $cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
                return redirect()->route('front.cart')->with('unsuccess', __('Out Of Stock.'));
            }
        }

        $cart->totalPrice = 0;
        foreach ($cart->items as $data)
            $cart->totalPrice += $data['price'];
        Session::put('cart', $cart);
        return redirect()->route('front.cart');
    }


    // add to cart
    public function addnumcart(Request $request)
    {
        $request->validate([
            'id' => ['required', Rule::exists('products')],
            'qty' => 'required|numeric|min:1',
            'productPriceID' => 'nullable'
        ]);

        $qty = $request->qty;
        $id = $request->id;
        $productPriceID = $request->productPriceID;
        $get_product = Product::query()->find($id);

        $hasVariations = $get_product->productVariants()->exists();

        if ($hasVariations && empty($productPriceID)) {
            return response()->json([
                'status' => false,
                'message' => 'Select product variation.'
            ]);
        }

        $cart = new CartHelper();

        if ($hasVariations) {
            // check variation product stock
            $variation = $get_product->productPrices()
                ->where('id', $productPriceID)
                ->first();

            if (empty($variation)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid price id!'
                ]);
            }

            if ($variation && $variation->available_quantity < $qty) {
                return response()->json([
                    'status' => false,
                    'message' => 'Out of stock!'
                ]);
            }

            $cart->addItem($id, $qty, $variation->id);

        } else {
            // check product stock
            if ($get_product->stock < $qty) {
                return response()->json([
                    'status' => false,
                    'message' => 'Out of stock!'
                ]);
            }

            $cart->addItem($id, $qty);
        }

        return response()->json([
            'status' => true,
            'data' => $cart->totalQty()
        ]);
    }

    public function addtonumcart(Request $request)
    {

        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $size = str_replace(' ', '-', $_GET['size']);
        $color = $_GET['color'];
        $size_qty = $_GET['size_qty'];
        $size_price = (double)$_GET['size_price'];
        $size_key = $_GET['size_key'];
        $affilate_user = isset($_GET['affilate_user']) ? $_GET['affilate_user'] : '0';
        $keys = $_GET['keys'];
        $keys = explode(",", $keys);
        $values = $_GET['values'];
        $values = explode(",", $values);
        $prices = $_GET['prices'];
        $prices = explode(",", $prices);
        $keys = $keys == "" ? '' : implode(',', $keys);
        $values = $values == "" ? '' : implode(',', $values);
        $curr = $this->curr;
        $size_price = ($size_price / $curr->value);
        $prod = Product::where('id', '=', $id)->first(['id', 'user_id', 'slug', 'name', 'photo', 'size', 'size_qty', 'size_price', 'color', 'price', 'stock', 'type', 'file', 'link', 'license', 'license_qty', 'measure', 'whole_sell_qty', 'whole_sell_discount', 'attributes', 'minimum_qty', 'stock_check', 'size_all', 'color_all']);
        if ($prod->type != 'Physical') {
            $qty = 1;
        }


        if ($prod->user_id != 0) {
            $prc = $prod->price + $this->gs->fixed_commission + ($prod->price / 100) * $this->gs->percentage_commission;
            $prod->price = round($prc, 2);
        }
        if (!empty($prices)) {
            if (!empty($prices[0])) {
                foreach ($prices as $data) {
                    $prod->price += ($data / $curr->value);
                }
            }
        }

        if (!empty($prod->license_qty)) {
            $lcheck = 1;
            foreach ($prod->license_qty as $ttl => $dtl) {
                if ($dtl < 1) {
                    $lcheck = 0;
                } else {
                    $lcheck = 1;
                    break;
                }
            }
            if ($lcheck == 0) {
                return 0;
            }
        }
        if (empty($size)) {
            if (!empty($prod->size)) {
                $size = trim($prod->size[0]);
            }
            $size = str_replace(' ', '-', $size);
        }

        if ($size_qty == '0') {
            return redirect()->route('front.cart')->with('unsuccess', __('Out Of Stock.'));
        }

        if (empty($color)) {
            if (!empty($prod->color)) {
                $color = $prod->color[0];

            }
        }
        if ($prod->stock_check == 0) {
            if (empty($size)) {

                if (!empty($prod->size_all)) {
                    $size = trim(explode(',', $prod->size_all)[0]);
                }
                $size = str_replace(' ', '-', $size);
            }

            if (empty($color)) {
                if (!empty($prod->color_all)) {
                    $color = explode(',', $prod->color_all)[0];
                }
            }
        }


        $color = str_replace('#', '', $color);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        if (!empty($cart->items)) {
            if (!empty($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)])) {
                $minimum_qty = (int)$prod->minimum_qty;
                if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['qty'] < $minimum_qty) {
                    return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                }
            } else {
                if ($prod->minimum_qty != null) {
                    $minimum_qty = (int)$prod->minimum_qty;
                    if ($qty < $minimum_qty) {
                        return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                    }
                }
            }
        } else {
            $minimum_qty = (int)$prod->minimum_qty;
            if ($prod->minimum_qty != null) {
                if ($qty < $minimum_qty) {
                    return redirect()->route('front.cart')->with('unsuccess', __('Minimum Quantity is:') . ' ' . $prod->minimum_qty);
                }
            }
        }

        $cart->addnum($prod, $prod->id, $qty, $size, $color, $size_qty, $size_price, $size_key, $keys, $values, $affilate_user);

        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['dp'] == 1) {
            return redirect()->route('front.cart')->with('unsuccess', __('This item is already in the cart.'));
        }
        if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['stock'] < 0) {
            return redirect()->route('front.cart')->with('unsuccess', __('Out Of Stock.'));
        }
        if ($prod->stock_check == 1) {
            if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
                if ($cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['qty'] > $cart->items[$id . $size . $color . str_replace(str_split(' ,'), '', $values)]['size_qty']) {
                    return redirect()->route('front.cart')->with('unsuccess', __('Out Of Stock.'));
                }
            }
        }


        $cart->totalPrice = 0;
        foreach ($cart->items as $data)
            $cart->totalPrice += $data['price'];
        Session::put('cart', $cart);
        return redirect()->route('front.cart')->with('success', __('Successfully Added To Cart.'));
    }


    public function addbyone(Request $request)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $curr = $this->curr;
        $id = $_GET['id'];
        $itemid = $_GET['itemid'];
        $color = $request->has('color') ? $request['color'] : '';
        $size = $request->has('size') ? $request['size'] : '';
        $size_qty = $request->has('size_qty') ? $request['size_qty'] : '';
        $size_price = $request->has('size_price') ? $request['size_price'] : '';
        $prod = Product::where('id', $id)->first(['id', 'user_id', 'slug', 'name', 'photo', 'size', 'size_qty', 'size_price', 'color', 'price', 'stock', 'type', 'file', 'link', 'license', 'license_qty', 'measure', 'whole_sell_qty', 'whole_sell_discount', 'attributes', 'stock_check',]);
//        dd($prod);

        if ($prod->user_id != 0) {
            $prc = $prod->price + $this->gs->fixed_commission + ($prod->price / 100) * $this->gs->percentage_commission;
            $prod->price = round($prc, 2);
        }

        if (!empty($prod->attributes)) {
            $attrArr = json_decode($prod->attributes, true);
            $count = count($attrArr);
            $j = 0;
            if (!empty($attrArr)) {
                foreach ($attrArr as $attrKey => $attrVal) {

                    if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {

                        foreach ($attrVal['values'] as $optionKey => $optionVal) {
                            $prod->price += $attrVal['prices'][$optionKey];
                            break;
                        }

                    }
                }
            }
        }

        if (!empty($prod->license_qty)) {
            $lcheck = 1;
            foreach ($prod->license_qty as $ttl => $dtl) {
                if ($dtl < 1) {
                    $lcheck = 0;
                } else {
                    $lcheck = 1;
                    break;
                }
            }
            if ($lcheck == 0) {
                return 0;
            }
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->adding($prod, $itemid, $color, $size, $size_qty, $size_price);

        if ($prod->stock_check == 1) {
            if ($cart->items[$itemid]['stock'] < 0) {

                return 0;
            }
            if (!empty($size_qty)) {
                if ($cart->items[$itemid]['qty'] > $cart->items[$itemid]['size_qty']) {

                    return 0;
                }
            }
        }

        $cart->totalPrice = 0;
        foreach ($cart->items as $data)
            $cart->totalPrice += $data['price'];
        Session::put('cart', $cart);
        $data[0] = $cart->totalPrice;

        $data[3] = $data[0];


        $data[1] = $cart->items[$itemid]['qty'];
        $data[2] = $cart->items[$itemid]['price'];
        $data[0] = \PriceHelper::showCurrencyPrice($data[0] * $curr->value);
        $data[2] = \PriceHelper::showCurrencyPrice($data[2] * $curr->value);
        $data[3] = \PriceHelper::showCurrencyPrice($data[3] * $curr->value);
        $data[4] = $cart->items[$itemid]['discount'] == 0 ? '' : '(' . $cart->items[$itemid]['discount'] . '% ' . __('Off') . ')';
        return response()->json($data);
    }

    public function reducebyone()
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $curr = $this->curr;
        $id = $_GET['id'];
        $itemid = $_GET['itemid'];
        $size_qty = $_GET['size_qty'];
        $size_price = $_GET['size_price'];
        $prod = Product::where('id', '=', $id)->first(['id', 'user_id', 'slug', 'name', 'photo', 'size', 'size_qty', 'size_price', 'color', 'price', 'stock', 'type', 'file', 'link', 'license', 'license_qty', 'measure', 'whole_sell_qty', 'whole_sell_discount', 'attributes']);
        if ($prod->user_id != 0) {
            $prc = $prod->price + $this->gs->fixed_commission + ($prod->price / 100) * $this->gs->percentage_commission;
            $prod->price = round($prc, 2);
        }

        if (!empty($prod->attributes)) {
            $attrArr = json_decode($prod->attributes, true);
            $count = count($attrArr);
            $j = 0;
            if (!empty($attrArr)) {
                foreach ($attrArr as $attrKey => $attrVal) {
                    if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {

                        foreach ($attrVal['values'] as $optionKey => $optionVal) {
                            $prod->price += $attrVal['prices'][$optionKey];
                            break;
                        }

                    }
                }

            }
        }

        if (!empty($prod->license_qty)) {
            $lcheck = 1;
            foreach ($prod->license_qty as $ttl => $dtl) {
                if ($dtl < 1) {
                    $lcheck = 0;
                } else {
                    $lcheck = 1;
                    break;
                }
            }
            if ($lcheck == 0) {
                return 0;
            }
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reducing($prod, $itemid, $size_qty, $size_price);
        $cart->totalPrice = 0;
        foreach ($cart->items as $data)
            $cart->totalPrice += $data['price'];

        Session::put('cart', $cart);
        $data[0] = $cart->totalPrice;

        $data[3] = $data[0];

        $data[1] = $cart->items[$itemid]['qty'];
        $data[2] = $cart->items[$itemid]['price'];
        $data[0] = \PriceHelper::showCurrencyPrice($data[0] * $curr->value);
        $data[2] = \PriceHelper::showCurrencyPrice($data[2] * $curr->value);
        $data[3] = \PriceHelper::showCurrencyPrice($data[3] * $curr->value);
        $data[4] = $cart->items[$itemid]['discount'] == 0 ? '' : '(' . $cart->items[$itemid]['discount'] . '% ' . __('Off') . ')';
        return response()->json($data);
    }

    public function removeCart($id)
    {
        try {
            CartHelper::removeRow($id);
            return back()->with('success', "Remove Item Successfully");
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
//        try {
//            $curr = $this->curr;
//            $oldCart = Session::has('cart') ? Session::get('cart') : null;
//            $cart = new Cart($oldCart);
//            $cart->removeItem($id);
//            Session::forget('cart');
//            Session::forget('already');
//            Session::forget('coupon');
//            Session::forget('coupon_total');
//            Session::forget('coupon_total1');
//            Session::forget('coupon_percentage');
//            if (count($cart->items) > 0) {
//                Session::put('cart', $cart);
//                $data[0] = $cart->totalPrice;
//                $data[3] = $data[0];
//
//
//                if ($this->gs->currency_format == 0) {
//                    $data[0] = $curr->sign . round($data[0] * $curr->value, 2);
//                    $data[3] = $curr->sign . round($data[3] * $curr->value, 2);
//
//                } else {
//                    $data[0] = round($data[0] * $curr->value, 2) . $curr->sign;
//                    $data[3] = round($data[3] * $curr->value, 2) . $curr->sign;
//                }
//
//                $data[1] = count($cart->items);
//                return redirect()->back()->with('success', 'Remove Item Successfully');
//            } else {
//
//                $data[0] = 0;
//
//                if ($this->gs->currency_format == 0) {
//                    $data[1] = $curr->sign . round($data[0] * $curr->value, 2);
//
//                } else {
//                    $data[1] = round($data[0] * $curr->value, 2) . $curr->sign;
//                }
//
////            return response()->json($data);
//                return redirect()->back()->with('success', 'Product Remove Successfully');
//            }
//        } catch (\Exception $exception) {
//            return redirect()->back();
//        }
    }


    public function country_tax(Request $request)
    {

        if ($request->country_id) {
            if ($request->state_id != 0) {
                $state = State::findOrFail($request->state_id);
                $tax = $state->tax;
                $data[11] = $state->id;
                $data[12] = 'state_tax';
            } else {
                $country = Country::findOrFail($request->country_id);
                $tax = $country->tax;
                $data[11] = $country->id;
                $data[12] = 'country_tax';
            }
        } else {
            $tax = 0;
        }

        $tax = $tax;
        Session::put('is_tax', $tax);


        $gs = Generalsetting::findOrFail(1);

        $total = (float)preg_replace('/[^0-9\.]/ui', '', $_GET['total']);

        $stotal = ($total * $tax) / 100;

        $sstotal = $stotal * $this->curr->value;
        Session::put('current_tax', $sstotal);

        $total = $total + $stotal;

        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }

        $data[0] = $total;
        $data[1] = $tax;

        $data[0] = round($total, 2);

        if (Session::has('coupon')) {
            $data[0] = round($total - Session::get('coupon'), 2);
        }

        return response()->json($data);

    }

    //Veteran work
    public function submitEmail(Request $request)
    {

        try {
            $email = $request->input('email');
            $already_check_email = VeteranDiscount::where('email', '=', $email)->first();

            if ($already_check_email) {
                return response()->json(['error' => 'Your Email Already Use']);
            } else {
                $otp = mt_rand(100000, 999999);
                $data = [
                    'to' => $email,
                    'from' => "Hazy-by-tony.com",
                    'subject' => "Otp Verification code ",
                    'body' => 'this is your OTP code ' . $otp,
                ];
//            Session::put('email', $email);
//            Session::put('otp', $otp);

                $veteran_discount = new VeteranDiscount();
                $veteran_discount->email = $email;
                $veteran_discount->otp = $otp;
                $veteran_discount->percentage = 20;
                $veteran_discount->save();

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);

                return response()->json(['message' => 'Email sent successfully']);
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        };
    }

    public function verifyOTP(Request $request)
    {

//        $userOTP = $request->input('otp');
//        $storedOTP = Session::get('otp');
//        $email = Session::get('email');
//
//
//        if ($userOTP == $storedOTP) {
//
//            Session::forget('email');
//            Session::forget('otp');
//
//            return response()->json(['message' => 'OTP verified successfully']);
//        }

        $userOTP = $request->input('otp');

        $get_otp = VeteranDiscount::where('otp', '=', $userOTP)->first();

        if (!$get_otp) {
            return response()->json(['error' => 'Invalid OTP']);
        }

        if ($get_otp->avail === 1) {
            return response()->json(['error' => 'This OTP has been already applied']);
        } else {
            $discount_id = $get_otp->id;
            $email = $get_otp->email;
            Session::put('discount_id', $discount_id);
            Session::put('email', $email);

            return response()->json(['message' => 'OTP verified successfully']);
        }


    }
}
