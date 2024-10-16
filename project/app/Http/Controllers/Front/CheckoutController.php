<?php

namespace App\Http\Controllers\Front;

use App\{Helpers\CartHelper, Models\Cart, Models\Order, Models\PaymentGateway, Models\VeteranDiscount};
use App\Models\State;
use DB;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CheckoutController extends FrontBaseController
{
    // Loading Payment Gateways

    public function loadpayment($slug1, $slug2)
    {
        $curr = $this->curr;
        $payment = $slug1;
        $pay_id = $slug2;
        $gateway = '';
        if ($pay_id != 0) {
            $gateway = PaymentGateway::findOrFail($pay_id);
        }
        return view('load.payment', compact('payment', 'pay_id', 'gateway', 'curr'));
    }

    // Wallet Amount Checking

    public function walletcheck()
    {
        $amount = (double)$_GET['code'];
        $total = (double)$_GET['total'];
        $balance = Auth::user()->balance;
        if ($amount <= $balance) {
            if ($amount > 0 && $amount <= $total) {
                $total -= $amount;
                $data[0] = $total;
                $data[1] = $amount;
                $data[2] = \PriceHelper::showCurrencyPrice($total);
                $data[3] = \PriceHelper::showCurrencyPrice($amount);
                return response()->json($data);
            } else {
                return response()->json(0);
            }
        } else {
            return response()->json(0);
        }

    }

    public function checkout()
    {
        if (CartHelper::isCartEmpty()) {
            return redirect()->route('front.cart')->with('success', __("You don't have any product to checkout."));
        }
        $dp = 1;
        $vendor_shipping_id = 0;
        $vendor_packing_id = 0;
        $curr = $this->curr;
        $gateways = PaymentGateway::scopeHasGateway($this->curr->id)->where('checkout', 1);
        $pickups = DB::table('pickups')->whereLanguageId($this->language->id)->get();
//        $oldCart = CartHelper::getCart();
        $cart = new CartHelper();
        $cartData = $cart->getData();
//        dd($cartData);
//        $products = $cart->items;
//        dd($products);
        $paystack = PaymentGateway::whereKeyword('paystack')->first();
        $paystackData = $paystack->convertAutoData();
        $total_discount_price = 0;
//        dd($paystackData);
        // $voguepay = PaymentGateway::whereKeyword('voguepay')->first();
        // $voguepayData = $voguepay->convertAutoData();
        // If a user is Authenticated then there is no problm user can go for checkout

//        dd(Auth::check());

        //Discount functionality

        if (Session::has('discount_id')) {
            $get_veteran_percentage = VeteranDiscount::where('id', Session::get('discount_id'))->first();
            if (Session::has('coupon')) {
                $get_coupon_code = Coupon::where('code', Session::get('coupon_code'))->first();

                if ($get_coupon_code) {
                    // Coupon Amount Discount
                    if ($get_coupon_code->type === 1) {
                        $get_total_price = $cart->getTotalPrice();
                        $veteran_discount_percentage = $get_veteran_percentage->percentage;

                        $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                        $get_coupon_discount = $get_coupon_code->price - $veteran_discount;

                        $total_discount_price = abs($get_coupon_discount);

                        // Coupon Percentage Discount
                    } elseif ($get_coupon_code->type === 0) {
                        $get_total_price = $cart->getTotalPrice();
                        $veteran_discount_percentage = $get_veteran_percentage->percentage;

                        $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                        $get_coupon_discount = $veteran_discount - (($get_coupon_code->price * $veteran_discount) / 100);


                        $total_discount_price = abs($get_coupon_discount);
                    }
                }
            } elseif (Session::has('discount_id')) {
                $get_total_price = $cart->getTotalPrice();
                //Veteran_Discount_Percentage
                $veteran_discount_percentage = $get_veteran_percentage->percentage;
                $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                $total_discount_price = abs($veteran_discount);
            }
//            else {
//                //All Without Discount Ammount
//                $get_total_price = Session::get('cart')->totalPrice;
//                $total_discount_price = abs($get_total_price);
//            }
        } elseif (Session::has('coupon')) {
            $get_coupon_code = Coupon::where('code', Session::get('coupon_code'))->first();

            if ($get_coupon_code) {
                // Coupon Amount Discount Current Price
                if ($get_coupon_code->type === 1) {
                    $get_total_price = $cart->getTotalPrice();

                    $get_coupon_price = $get_coupon_code->price;

                    $current_discount = $get_total_price - $get_coupon_price;

                    $total_discount_price = abs($current_discount);

                    // Coupon Percentage Discount Current Price
                } elseif ($get_coupon_code->type === 0) {
                    $get_total_price = $cart->getTotalPrice();

                    $get_coupon_price = $get_coupon_code->price;

                    $current_discount = $get_total_price - (($get_total_price * $get_coupon_price) / 100);

                    $total_discount_price = abs($current_discount);
                }
            }
        } else {
            //All Without Discount Ammount
            $get_total_price = $cart->getTotalPrice();
            $total_discount_price = abs($get_total_price);
        }


        if (Auth::check()) {

            // Shipping Method

            if ($this->gs->multiple_shipping == 1) {
                $ship_data = Order::getShipData($cartData, $this->language->id);
//                dd($ship_data);
                $shipping_data = $ship_data['shipping_data'];
                $vendor_shipping_id = $ship_data['vendor_shipping_id'];
            } else {
                $shipping_data = DB::table('shippings')->whereLanguageId($this->language->id)->whereUserId(0)->get();
            }

            // Packaging
            if ($this->gs->multiple_packaging == 1) {
                $pack_data = Order::getPackingData($cart, $this->language->id);
//                dd($pack_data);
                $package_data = $pack_data['package_data'];
                $vendor_packing_id = $pack_data['vendor_packing_id'];
            } else {
                $package_data = DB::table('packages')->whereLanguageId($this->language->id)->whereUserId(0)->get();
            }
//            foreach ($products as $prod) {
//                if ($prod['item']['type'] == 'Physical') {
//                    $dp = 0;
//                    break;
//                }
//            }


            $total = $cart->getTotalPrice();


            $coupon = Session::has('coupon') ? Session::get('coupon') : 0;

            if (!Session::has('coupon_total')) {
                $total = $total - $coupon;
                $total = $total + 0;
            } else {
                $total = Session::get('coupon_total');
                $total = str_replace(',', '', str_replace($curr->sign, '', $total));
            }


            return view('frontend.checkout', [
                'products' => $cartData,
                'totalPrice' => $total,
                'pickups' => $pickups,
                'totalQty' => CartHelper::getCartTotalQty(),
                'gateways' => $gateways,
                'shipping_cost' => 0,
                'digital' => $dp,
                'curr' => $curr,
                'shipping_data' => $shipping_data,
                'package_data' => $package_data,
                'vendor_shipping_id' => $vendor_shipping_id,
                'vendor_packing_id' => $vendor_packing_id,
                'paystack' => $paystackData,
                'total_discount_price' => $total_discount_price
            ]);
        } else {


            if ($this->gs->guest_checkout == 1) {
                if ($this->gs->multiple_shipping == 1) {
                    $ship_data = Order::getShipData($cartData, $this->language->id);
                    $shipping_data = $ship_data['shipping_data'];
                    $vendor_shipping_id = $ship_data['vendor_shipping_id'];
                } else {
                    $shipping_data = DB::table('shippings')->where('user_id', '=', 0)->get();
                }

                // Packaging

                if ($this->gs->multiple_packaging == 1) {
                    $pack_data = Order::getPackingData($cart, $this->language->id);
                    $package_data = $pack_data['package_data'];
                    $vendor_packing_id = $pack_data['vendor_packing_id'];
                } else {
                    $package_data = DB::table('packages')->where('user_id', '=', 0)->get();
                }

//                foreach ($products as $prod) {
//                    if ($prod['item']['type'] == 'Physical') {
//                        $dp = 0;
//                        break;
//                    }
//                }
//                $total = $cart->getTotalPrice();
//                $coupon = Session::has('coupon') ? Session::get('coupon') : 0;
////                dd($total, $coupon);
//
//                if (!Session::has('coupon_total')) {
//                    $total = $total - $coupon;
//                    $total = $total + 0;
////                    dd($total);
//                } else {
//                    $total = Session::get('coupon_total');
//                    $total = str_replace($curr->sign, '', $total) + round(0 * $curr->value, 2);
//                }
//                foreach ($products as $prod) {
//                    if ($prod['item']['type'] != 'Physical') {
//                        if (!Auth::check()) {
//                            $ck = 1;
//                            return view('frontend.checkout',
//                                [
//                                    'products' => $cart->items,
//                                    'totalPrice' => $total,
//                                    'pickups' => $pickups,
//                                    'totalQty' => $cart->totalQty,
//                                    'gateways' => $gateways,
//                                    'shipping_cost' => 0,
//                                    'digital' => $dp,
//                                    'curr' => $curr,
//                                    'shipping_data' => $shipping_data,
//                                    'package_data' => $package_data,
//                                    'vendor_shipping_id' => $vendor_shipping_id,
//                                    'vendor_packing_id' => $vendor_packing_id,
//                                    'paystack' => $paystackData]);
//                        }
//                    }
//                }
//                dd($get_total_price, $total_discount_price);
                return view('frontend.checkout', [
                    'products' => $cartData,
                    'totalPrice' => $get_total_price,
                    'pickups' => $pickups,
                    'totalQty' => CartHelper::getCartTotalQty(),
                    'gateways' => $gateways,
                    'shipping_cost' => 0,
                    'digital' => $dp,
                    'curr' => $curr,
                    'shipping_data' => $shipping_data,
                    'package_data' => $package_data,
                    'vendor_shipping_id' => $vendor_shipping_id,
                    'vendor_packing_id' => $vendor_packing_id,
                    'paystack' => $paystackData,
                    'total_discount_price' => (float)number_format($total_discount_price, 2)
                ]);
            } // If guest checkout is Deactivated then display pop up form with proper error message

            else {

                // Shipping Method

                if ($this->gs->multiple_shipping == 1) {
                    $ship_data = Order::getShipData($cartData, $this->language->id);
//                    dd($ship_data);
                    $shipping_data = $ship_data['shipping_data'];
                    $vendor_shipping_id = $ship_data['vendor_shipping_id'];
                } else {
                    $shipping_data = DB::table('shippings')->where('user_id', '=', 0)->get();
                }

                // Packaging

                if ($this->gs->multiple_packaging == 1) {
                    $pack_data = Order::getPackingData($cart, $this->language->id);
                    $package_data = $pack_data['package_data'];
                    $vendor_packing_id = $pack_data['vendor_packing_id'];
                } else {
                    $package_data = DB::table('packages')->where('user_id', '=', 0)->get();
                }

                $total = $cart->getTotalPrice();
                $coupon = Session::has('coupon') ? Session::get('coupon') : 0;

                if (!Session::has('coupon_total')) {
                    $total = $total - $coupon;
                    $total = $total + 0;
                } else {
                    $total = Session::get('coupon_total');
//                    $total = $total;
                }
                $ck = 1;
                return view('frontend.checkout', [
                    'products' => $cartData,
                    'totalPrice' => $total,
                    'pickups' => $pickups,
                    'totalQty' => CartHelper::getCartTotalQty(),
                    'gateways' => $gateways,
                    'shipping_cost' => 0,
                    'digital' => $dp,
                    'curr' => $curr,
                    'shipping_data' => $shipping_data,
                    'package_data' => $package_data,
                    'vendor_shipping_id' => $vendor_shipping_id,
                    'vendor_packing_id' => $vendor_packing_id,
                    'paystack' => $paystackData,
                    'total_discount_price' => $total_discount_price
                ]);
            }
        }
    }


    public function getState($country_id)
    {

        $states = State::where('country_id', $country_id)->get();

        if (Auth::user()) {
            $user_state = Auth::user()->state;
        } else {
            $user_state = 0;
        }


        $html_states = '<option value="" > Select State </option>';
        foreach ($states as $state) {
            if ($state->id == $user_state) {
                $check = 'selected';
            } else {

                $check = '';
            }
            $html_states .= '<option value="' . $state->id . '"   rel="' . $state->country->id . '" ' . $check . ' >' . $state->state . '</option>';
        }

        return response()->json(["data" => $html_states, "state" => $user_state]);
    }


    // Redirect To Checkout Page If Payment is Cancelled

    public function paycancle()
    {

        return redirect()->route('front.checkout')->with('unsuccess', __('Payment Cancelled.'));
    }


    // Redirect To Success Page If Payment is Comleted

    public function payreturn()
    {
        if (Session::has('tempcart')) {

            $order = Session::get('temporder');
            $tempcart = Session::get('temporder')->cart;

        } else {
            $tempcart = '';
            return redirect()->back();
        }

        return view('frontend.success', compact('tempcart', 'order'));
    }


}
