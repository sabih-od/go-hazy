<?php

namespace App\Http\Controllers\Front;

use App\{Helpers\CartHelper, Models\Cart, Models\Coupon};
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CouponController extends FrontBaseController
{

    public function coupon()
    {
        $gs = $this->gs;
        $code = $_GET['code'];
        $total = (float)preg_replace('/[^0-9\.]/ui', '', $_GET['total']);;
        $fnd = Coupon::where('code', '=', $code)->get()->count();
        $coupon = Coupon::where('code', '=', $code)->first();

        $cart = Session::get('cart');
        foreach ($cart->items as $item) {
            $product = Product::findOrFail($item['item']['id']);

            if ($coupon->coupon_type == 'category') {

                if ($product->category_id == $coupon->category) {
                    $coupon_check_type[] = 1;
                } else {

                    $coupon_check_type[] = 0;
                }
            } elseif ($coupon->coupon_type == 'sub_category') {
                if ($product->subcategory_id == $coupon->sub_category) {
                    $coupon_check_type[] = 1;


                } else {
                    $coupon_check_type[] = 0;
                }
            } elseif ($coupon->coupon_type == 'child_category') {
                if ($product->childcategory_id == $coupon->child_category) {
                    $coupon_check_type[] = 1;
                } else {
                    $coupon_check_type[] = 0;
                }
            } else {

                $coupon_check_type[] = 0;
            }

        }


        if (in_array(0, $coupon_check_type)) {
            return response()->json(0);
        }


        if ($fnd < 1) {
            return response()->json(0);
        } else {
            $coupon = Coupon::where('code', '=', $code)->first();
            $curr = $this->curr;
            if ($coupon->times != null) {
                if ($coupon->times == "0") {
                    return response()->json(0);
                }
            }
            $today = date('Y-m-d');
            $from = date('Y-m-d', strtotime($coupon->start_date));
            $to = date('Y-m-d', strtotime($coupon->end_date));
            if ($from <= $today && $to >= $today) {
                if ($coupon->status == 1) {
                    $oldCart = Session::has('cart') ? Session::get('cart') : null;
                    $val = Session::has('already') ? Session::get('already') : null;
                    if ($val == $code) {
                        return response()->json(2);
                    }
                    $cart = new Cart($oldCart);
                    if ($coupon->type == 0) {
                        if ($coupon->price >= $total) {
                            return response()->json(3);
                        }
                        Session::put('already', $code);
                        $coupon->price = (int)$coupon->price;
                        $val = $total / 100;
                        $sub = $val * $coupon->price;
                        $total = $total - $sub;
                        $data[0] = \PriceHelper::showCurrencyPrice($total);
                        $data[1] = $code;
                        $data[2] = round($sub, 2);
                        Session::put('coupon', $data[2]);
                        Session::put('coupon_code', $code);
                        Session::put('coupon_id', $coupon->id);
                        Session::put('coupon_total', $data[0]);
                        $data[3] = $coupon->id;
                        $data[4] = $coupon->price . "%";
                        $data[5] = 1;

                        Session::put('coupon_percentage', $data[4]);

                        return response()->json($data);
                    } else {
                        if ($coupon->price >= $total) {
                            return response()->json(3);
                        }
                        Session::put('already', $code);
                        $total = $total - round($coupon->price * $curr->value, 2);
                        $data[0] = $total;
                        $data[1] = $code;
                        $data[2] = $coupon->price * $curr->value;
                        Session::put('coupon', $data[2]);
                        Session::put('coupon_code', $code);
                        Session::put('coupon_id', $coupon->id);
                        Session::put('coupon_total', $data[0]);
                        $data[3] = $coupon->id;
                        $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
                        $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
                        Session::put('coupon_percentage', 0);
                        $data[5] = 1;
                        return response()->json($data);
                    }
                } else {
                    return response()->json(0);
                }
            } else {
                return response()->json(0);
            }
        }
    }

//    public function couponcheck()
//    {
//        $gs = $this->gs;
//        $code = $_GET['code'];
//        $coupon = Coupon::where('code', '=', $code)->first();
//
//        if (!$coupon) {
//            return response()->json(0);
//        }
//
//        $cart = Session::get('cart');
//        $discount_items = [];
//        foreach ($cart->items as $key => $item) {
//            $product = Product::findOrFail($item['item']['id']);
//
//            if ($coupon->coupon_type == 'category') {
//                if ($product->category_id == $coupon->category) {
//                    $discount_items[] = $key;
//                }
////                dd($product->category_id, $coupon->category, $discount_items);
//            } elseif ($coupon->coupon_type == 'sub_category') {
//                if ($product->sub_category == $coupon->sub_category) {
//                    $discount_items[] = $key;
//                }
//            } elseif ($coupon->coupon_type == 'child_category') {
//
//                if ($product->child_category == $coupon->child_category) {
//                    $discount_items[] = $key;
//                }
//            }
//        }
//
//        if (count($discount_items) == 0) {
//            return 0;
//        }
//
//        $main_discount_price = 0;
//        foreach ($cart->items as $ckey => $cproduct) {
//            if (in_array($ckey, $discount_items)) {
////                dd($cproduct['item_price'], $cproduct['qty']);
//                $main_discount_price += $cproduct['item_price'] * $cproduct['qty'];
//            }
//        }
//
//        $total = (float)preg_replace('/[^0-9\.]/ui', '', $main_discount_price); //1100.0
//
//        $fnd = Coupon::where('code', '=', $code)->get()->count();
////        dd($fnd);
//        if (Session::has('is_tax')) {
//            $xtotal = ($total * Session::get('is_tax')) / 100;
//            $total = $total + $xtotal;
//        }
////        dd($total, Session::has('is_tax'));
//
//
//        if ($fnd < 1) {
//            return response()->json(0);
//        } else {
//            //
//            $coupon = Coupon::where('code', '=', $code)->first();
//            $curr = $this->curr;
//
//            if ($coupon->times != null) {
////                dd($coupon->times);
//                if ($coupon->times == "0") {
//                    return response()->json(0);
//                }
//            }
//            //dd($coupon);
//            $today = date('Y-m-d'); //15/12/22
//            $from = date('Y-m-d', strtotime($coupon->start_date)); //22/12/22
//            $to = date('Y-m-d', strtotime($coupon->end_date)); //2024-12-28
//            if ($from <= $today && $to >= $today) {
//
//                //dd($today, $from, $to);
//                if ($coupon->status == 1) {
//                    //dd($coupon->status);
//                    $oldCart = Session::has('cart') ? Session::get('cart') : null;
//                    $val = Session::has('already') ? Session::get('already') : null;
//
//                    if ($val == $code) {
//                        return response()->json(2);
//                    }
//
//                    $cart = new Cart($oldCart);
//
//                    if ($coupon->type == 0) {
//
//                        if ($coupon->price >= $total) {
//                            return response()->json(3);
//                        }
//
//                        Session::put('already', $code);
//                        $coupon->price = (int)$coupon->price;
//
//                        $oldCart = Session::get('cart');
//                        $cart = new Cart($oldCart);
//
//                        $total = $total - $_GET['shipping_cost'];
//
//                        $val = $total / 100;
//                        $sub = $val * $coupon->price;
//                        $total = $total - $sub;
//                        $total = $total + $_GET['shipping_cost'];
//                        $data[0] = \PriceHelper::showCurrencyPrice($total);
//                        $data[1] = $code;
//                        $data[2] = round($sub, 2);
//
//                        Session::put('coupon', $data[2]);
//                        Session::put('coupon_code', $code);
//                        Session::put('coupon_id', $coupon->id);
//                        Session::put('coupon_total1', round($total, 2));
//                        Session::forget('coupon_total');
//
//                        $data[3] = $coupon->id;
//                        $data[4] = $coupon->price . "%";
//                        $data[5] = 1;
//                        $data[6] = round($total, 2);
//                        Session::put('coupon_percentage', $data[4]);
//                        return response()->json($data);
//                    } else {
////                        dd('else');
//                        if ($coupon->price >= $total) {
//                            return response()->json(3);
//                        }
//                        Session::put('already', $code);
//                        $total = $total - round($coupon->price * $curr->value, 2);
//                        $data[0] = $total;
//                        $data[1] = $code;
//                        $data[2] = $coupon->price * $curr->value;
//                        $data[3] = $coupon->id;
//                        $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
//                        $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
//                        Session::put('coupon', $data[2]);
//                        Session::put('coupon_code', $code);
//                        Session::put('coupon_id', $coupon->id);
//                        Session::put('coupon_total1', round($total, 2));
//                        Session::forget('coupon_total');
//                        $data[1] = $code;
//                        $data[2] = round($coupon->price * $curr->value, 2);
//                        $data[3] = $coupon->id;
//                        $data[5] = 1;
//                        $data[6] = round($total, 2);
//                        Session::put('coupon_percentage', $data[4]);
//
//                        return response()->json($data);
//                    }
//                    return response()->json(0);
//                } else {
//                }
//            } else {
//                return response()->json(0);
//            }
//        }
//    }

    public function couponDeactivate()
    {
        $code = request()->input('code');
        $coupon = Coupon::where('code', '=', $code)->first();
        $curr = $this->curr;
        $cart = new CartHelper();
        $cartData = $cart->getData();

        $discount_items = collect($cartData)->filter(function ($item) use ($coupon) {
            $product = $item['product'];

            if (empty($coupon->coupon_type)) {
                return true;
            } elseif ($coupon->coupon_type == 'category') {
                if ($product->category_id == $coupon->category) {
                    return true;
                }
            } elseif ($coupon->coupon_type == 'sub_category') {
                if ($product->sub_category == $coupon->sub_category) {
                    return true;
                }
            } elseif ($coupon->coupon_type == 'child_category') {
                if ($product->child_category == $coupon->child_category) {
                    return true;
                }
            }
            return false;
        });

        $total_discount_prd_price = $discount_items->sum(function ($item) {
            return $item['show_total_price'];
        });

        $coupon_price = $coupon->type == 0 ? (float)number_format(($total_discount_prd_price * $coupon->price) / 100, 2) : $coupon->price;

        $total = $cart->getTotalPrice() + round($coupon_price * $curr->value, 2);
        $data[0] = $total;
        $data[1] = $code;
        $data[2] = $coupon_price * $curr->value;
        $data[3] = $coupon->id;
        $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
        $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
        Session::forget('coupon', $data[2]);
        Session::forget('coupon_code', $code);
        Session::forget('coupon_id', $coupon->id);
        Session::put('coupon_deactive_total', round($total, 2));
        Session::forget('coupon_total');
        Session::forget('is_veteran');
        Session::forget('is_discount_coupon');

        return response()->json(['status' => 'success', 'data' => $data]);

    }

    public function couponcheck()
    {
        $gs = $this->gs;
        $code = request()->input('code');
        $couponType = request()->input('coupon_type');

        $coupon = Coupon::where('code', '=', $code)->first();

        if (!$coupon) {
            return response()->json(['status' => 'error', 'message' => __('Coupon not found')]);
        }

//        $cart = Session::get('cart');
        $cart = new CartHelper();
        $cartData = $cart->getData();
        $discount_items = collect($cartData)->filter(function ($item) use ($coupon) {
            $product = $item['product'];

            if (empty($coupon->coupon_type)) {
                return true;
            } elseif ($coupon->coupon_type == 'category') {
                if ($product->category_id == $coupon->category) {
                    return true;
                }
            } elseif ($coupon->coupon_type == 'sub_category') {
                if ($product->sub_category == $coupon->sub_category) {
                    return true;
                }
            } elseif ($coupon->coupon_type == 'child_category') {
                if ($product->child_category == $coupon->child_category) {
                    return true;
                }
            }
            return false;
        });

        $total_discount_prd_price = $discount_items->sum(function ($item) {
            return $item['show_total_price'];
        });

        if (count($discount_items) == 0) {
            return response()->json(['status' => 'error', 'message' => __('No items eligible for discount')]);
        }

        $curr = $this->curr;

        if ($coupon->times != null) {
            if ($coupon->times == "0") {
                return response()->json(['status' => 'error', 'message' => __('Coupon has already been taken')]);
            }
        }

        $today = date('Y-m-d');
        $from = date('Y-m-d', strtotime($coupon->start_date));
        $to = date('Y-m-d', strtotime($coupon->end_date));

        if ($from <= $today && $to >= $today) {
            if ($coupon->status == 1) {
                $val = Session::get('is_veteran');
                $val1 = Session::get('is_discount_coupon');

                if ($val == $code || $val1 == $code) {
                    return response()->json(['status' => 'error', 'message' => __('Coupon already taken')]);
                }

                $coupon_price = $coupon->type == 0 ? (float)number_format(($total_discount_prd_price * $coupon->price) / 100, 2) : $coupon->price;

                if ($coupon_price >= $total_discount_prd_price) {
                    return response()->json(['status' => 'error', 'message' => __('Coupon price is higher than the total')]);
                }


                Session::put($couponType, $code);
                $total = $cart->getTotalPrice() - round($coupon_price * $curr->value, 2);
                $data[0] = $total;
                $data[1] = $code;
                $data[2] = $coupon_price * $curr->value;
                $data[3] = $coupon->id;
                $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
                $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
                Session::put('coupon', $data[2]);
                Session::put('coupon_code', $code);
                Session::put('coupon_id', $coupon->id);
                Session::put('coupon_total1', round($total, 2));
                Session::forget('coupon_total');
//                $data[1] = $code;
//                $data[2] = round($coupon->price * $curr->value, 2);
//                $data[3] = $coupon->id;
//                $data[5] = 1;
//                $data[6] = round($total, 2);
                Session::put('coupon_percentage', $data[4]);

                return response()->json(['status' => 'success', 'data' => $data]);

                dd($coupon_price, $total_discount_prd_price);

//                $cart = new Cart($oldCart);
//
//                if ($coupon->type == 0) {
//                    if ($coupon->price >= $total) {
//                        return response()->json(['status' => 'error', 'message' => __('Coupon price is higher than the total')]);
//                    }
//
//                    Session::put('already', $code);
//                    $coupon->price = (int)$coupon->price;
//
//                    $oldCart = Session::get('cart');
//                    $cart = new Cart($oldCart);
//
//                    $total = $total - $_GET['shipping_cost'];
//                    $val = $total / 100;
//                    $sub = $val * $coupon->price;
//                    $total = $total - $sub;
//                    $total = $total + $_GET['shipping_cost'];
//                    $data[0] = \PriceHelper::showCurrencyPrice($total);
//                    $data[1] = $code;
//                    $data[2] = round($sub, 2);
//
//                    Session::put('coupon', $data[2]);
//                    Session::put('coupon_code', $code);
//                    Session::put('coupon_id', $coupon->id);
//                    Session::put('coupon_total1', round($total, 2));
//                    Session::forget('coupon_total');
//
//                    $data[3] = $coupon->id;
//                    $data[4] = $coupon->price . "%";
//                    $data[5] = 1;
//                    $data[6] = round($total, 2);
//                    Session::put('coupon_percentage', $data[4]);
//
//                    return response()->json(['status' => 'success', 'data' => $data]);
//                } else {
//                    if ($coupon->price >= $total) {
//                        return response()->json(['status' => 'error', 'message' => __('Coupon price is higher than the total')]);
//                    }
//
//                    Session::put('already', $code);
//                    $total = $total - round($coupon->price * $curr->value, 2);
//                    $data[0] = $total;
//                    $data[1] = $code;
//                    $data[2] = $coupon->price * $curr->value;
//                    $data[3] = $coupon->id;
//                    $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
//                    $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
//                    Session::put('coupon', $data[2]);
//                    Session::put('coupon_code', $code);
//                    Session::put('coupon_id', $coupon->id);
//                    Session::put('coupon_total1', round($total, 2));
//                    Session::forget('coupon_total');
//                    $data[1] = $code;
//                    $data[2] = round($coupon->price * $curr->value, 2);
//                    $data[3] = $coupon->id;
//                    $data[5] = 1;
//                    $data[6] = round($total, 2);
//                    Session::put('coupon_percentage', $data[4]);
//
//                    return response()->json(['status' => 'success', 'data' => $data]);
//                }
                return response()->json(['status' => 'error', 'message' => __('Coupon not found')]);
            } else {
                return response()->json(['status' => 'error', 'message' => __('Coupon is not active')]);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => __('Coupon is not within the valid date range')]);
        }


//        foreach ($cart->items as $ckey => $cproduct) {
//            if (in_array($ckey, $discount_items)) {
////                dd($cproduct['item_price'], $cproduct['qty']);
//                $main_discount_price += $cproduct['item_price'] * $cproduct['qty'];
//            }
//        }
//
//        $total = (float)preg_replace('/[^0-9\.]/ui', '', $main_discount_price); //1100.0
//
//        $fnd = Coupon::where('code', '=', $code)->get()->count();
//
//        if (Session::has('is_tax')) {
//            $xtotal = ($total * Session::get('is_tax')) / 100;
//            $total = $total + $xtotal;
//        }
//
//        if ($fnd < 1) {
//            return response()->json(['status' => 'error', 'message' => __('Coupon not found')]);
//        } else {
//            $coupon = Coupon::where('code', '=', $code)->first();
//            $curr = $this->curr;
//
//            if ($coupon->times != null) {
//                if ($coupon->times == "0") {
//                    return response()->json(['status' => 'error', 'message' => __('Coupon has already been taken')]);
//                }
//            }
//
//            $today = date('Y-m-d');
//            $from = date('Y-m-d', strtotime($coupon->start_date));
//            $to = date('Y-m-d', strtotime($coupon->end_date));
//
//            if ($from <= $today && $to >= $today) {
//                if ($coupon->status == 1) {
//                    $oldCart = Session::has('cart') ? Session::get('cart') : null;
//                    $val = Session::has('already') ? Session::get('already') : null;
//
//                    if ($val == $code) {
//                        return response()->json(['status' => 'error', 'message' => __('Coupon already taken')]);
//                    }
//
//                    $cart = new Cart($oldCart);
//
//                    if ($coupon->type == 0) {
//                        if ($coupon->price >= $total) {
//                            return response()->json(['status' => 'error', 'message' => __('Coupon price is higher than the total')]);
//                        }
//
//                        Session::put('already', $code);
//                        $coupon->price = (int)$coupon->price;
//
//                        $oldCart = Session::get('cart');
//                        $cart = new Cart($oldCart);
//
//                        $total = $total - $_GET['shipping_cost'];
//                        $val = $total / 100;
//                        $sub = $val * $coupon->price;
//                        $total = $total - $sub;
//                        $total = $total + $_GET['shipping_cost'];
//                        $data[0] = \PriceHelper::showCurrencyPrice($total);
//                        $data[1] = $code;
//                        $data[2] = round($sub, 2);
//
//                        Session::put('coupon', $data[2]);
//                        Session::put('coupon_code', $code);
//                        Session::put('coupon_id', $coupon->id);
//                        Session::put('coupon_total1', round($total, 2));
//                        Session::forget('coupon_total');
//
//                        $data[3] = $coupon->id;
//                        $data[4] = $coupon->price . "%";
//                        $data[5] = 1;
//                        $data[6] = round($total, 2);
//                        Session::put('coupon_percentage', $data[4]);
//
//                        return response()->json(['status' => 'success', 'data' => $data]);
//                    } else {
//                        if ($coupon->price >= $total) {
//                            return response()->json(['status' => 'error', 'message' => __('Coupon price is higher than the total')]);
//                        }
//
//                        Session::put('already', $code);
//                        $total = $total - round($coupon->price * $curr->value, 2);
//                        $data[0] = $total;
//                        $data[1] = $code;
//                        $data[2] = $coupon->price * $curr->value;
//                        $data[3] = $coupon->id;
//                        $data[4] = \PriceHelper::showCurrencyPrice($data[2]);
//                        $data[0] = \PriceHelper::showCurrencyPrice($data[0]);
//                        Session::put('coupon', $data[2]);
//                        Session::put('coupon_code', $code);
//                        Session::put('coupon_id', $coupon->id);
//                        Session::put('coupon_total1', round($total, 2));
//                        Session::forget('coupon_total');
//                        $data[1] = $code;
//                        $data[2] = round($coupon->price * $curr->value, 2);
//                        $data[3] = $coupon->id;
//                        $data[5] = 1;
//                        $data[6] = round($total, 2);
//                        Session::put('coupon_percentage', $data[4]);
//
//                        return response()->json(['status' => 'success', 'data' => $data]);
//                    }
//                    return response()->json(['status' => 'error', 'message' => __('Coupon not found')]);
//                } else {
//                    return response()->json(['status' => 'error', 'message' => __('Coupon is not active')]);
//                }
//            } else {
//                return response()->json(['status' => 'error', 'message' => __('Coupon is not within the valid date range')]);
//            }
//        }
    }


}
