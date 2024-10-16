<?php

namespace App\Http\Controllers\Payment\Checkout;

use App\{Helpers\CartHelper,
    Models\Cart,
    Models\Coupon,
    Models\Order,
    Models\PaymentGateway,
    Classes\GeniusMailer,
    Models\VeteranDiscount,
    Traits\PHPCustomMail
};
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Auth;
use Session;
use OrderHelper;
use Illuminate\Support\Str;

class StripeController extends CheckoutBaseControlller
{
    use PHPCustomMail;

    public function __construct()
    {
        parent::__construct();
        $data = PaymentGateway::whereKeyword('stripe')->first();
        $paydata = $data->convertAutoData();
        \Config::set('services.stripe.key', $paydata['key']);
        \Config::set('services.stripe.secret', $paydata['secret']);
    }

    public function store(Request $request)
    {

        $input = $request->all();
//        dd($input);

        $data = PaymentGateway::whereKeyword('stripe')->first();

        $cart = new CartHelper();
        $cartData = $cart->getData();

//        $total = $request->total;

//        $totalPrice = Session::has('cart') ? (int)$cart->getTotalPrice() : 0;


//        $get_percentage = VeteranDiscount::where('id', Session::get('discount_id'))->first();
//        if($get_percentage){
//            $total = $totalPrice - (($totalPrice * $get_percentage->percentage) / 100);
//       }else{
//            $total = $totalPrice;
//        }

        //Discount functionality
        $get_veteran_percentage = VeteranDiscount::where('id', Session::get('discount_id'))->first();
        if (Session::has('discount_id')) {

            if (Session::has('coupon')) {
                $get_coupon_code = Coupon::where('code', Session::get('coupon_code'))->first();

                if ($get_coupon_code) {
                    // Coupon Amount Discount
                    if ($get_coupon_code->type === 1) {
                        $get_total_price = $cart->getTotalPrice();

                        $veteran_discount_percentage = $get_veteran_percentage->percentage;

                        $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                        $get_coupon_discount = $get_coupon_code->price - $veteran_discount;

                        $total = abs($get_coupon_discount);

                        // Coupon Percentage Discount
                    } elseif ($get_coupon_code->type === 0) {
                        $get_total_price = $cart->getTotalPrice();

                        $veteran_discount_percentage = $get_veteran_percentage->percentage;

                        $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                        $get_coupon_discount = $veteran_discount - (($get_coupon_code->price * $veteran_discount) / 100);

                        $total = abs($get_coupon_discount);
                    }
                }
            } elseif (Session::has('discount_id')) {
                //Veteran_Discount_Percentage
                $get_total_price = $cart->getTotalPrice();

                $veteran_discount_percentage = $get_veteran_percentage->percentage;
                $veteran_discount = $get_total_price - (($get_total_price * $veteran_discount_percentage) / 100);

                $total = abs($veteran_discount);
            } else {
                //All Without Discount Ammount
                $get_total_price = $cart->getTotalPrice();
                $total = abs($get_total_price);
            }
        } elseif (Session::has('coupon')) {


            $get_coupon_code = Coupon::where('code', Session::get('coupon_code'))->first();

            if ($get_coupon_code) {
                // Coupon Amount Discount Current Price
                if ($get_coupon_code->type === 1) {
                    $get_total_price = $cart->getTotalPrice();

                    $get_coupon_price = $get_coupon_code->price;

                    $current_discount = $get_total_price - $get_coupon_price;

                    $total = abs($current_discount);

                    // Coupon Percentage Discount Current Price
                } elseif ($get_coupon_code->type === 0) {
                    $get_total_price = $cart->getTotalPrice();

                    $get_coupon_price = $get_coupon_code->price;

                    $current_discount = $get_total_price - (($get_total_price * $get_coupon_price) / 100);

                    $total = abs($current_discount);
                }
            }
        } else {
            $get_total_price = $cart->getTotalPrice();
            $total = $get_total_price;
//            foreach ($get_total_price->items as $price)
//            {
//                $total = $total + $price['totalPrice'];
//            }

            //All Without Discount Ammount
//            $get_total_price = $cart->getTotalPrice();
//            $total = abs($get_total_price);
        }


        if ($request->pass_check) {
            $auth = OrderHelper::auth_check($input); // For Authentication Checking

            if ($auth && isset($auth['auth_success']) && !$auth['auth_success']) {
                return redirect()->back()->with('unsuccess', $auth['error_message']);
            }
        }
//        if ($request->pass_check) {
//            $auth = OrderHelper::auth_check($input); // For Authentication Checking
//            if (!$auth['auth_success']) {
//                return redirect()->back()->with('unsuccess', $auth['error_message']);
//            }
//        }

        if (CartHelper::isCartEmpty()) {
            return redirect()->route('front.cart')->with('success', __("You don't have any product to checkout."));
        }


        $item_name = $this->gs->title . " Order";
        $item_number = Str::random(4) . time();
        $item_amount = $total;
        $success_url = route('front.payment.return');

        // Validate Card Data

        $validator = \Validator::make($request->all(), [
            'cardNumber' => 'required',
            'cardCVC' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);


        if ($validator->passes()) {
            $stripe = Stripe::make(\Config::get('services.stripe.secret'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $input['cardNumber'],
                        'exp_month' => $input['month'],
                        'exp_year' => $input['year'],
                        'cvc' => $input['cardCVC'],
                    ],
                ]);
                if (!isset($token['id'])) {
                    return back()->with('error', __('Token Problem With Your Token.'));
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => $this->curr->name,
                    'amount' => $item_amount,
                    'description' => $item_name,
                ]);

                if ($charge['status'] == 'succeeded') {

//                    $oldCart = Session::get('cart');
//                    $cart = new Cart($oldCart);
//                    OrderHelper::license_check($cart); // For License Checking
//                    $t_oldCart = Session::get('cart');
//                    $t_cart = new Cart($t_oldCart);
//                    $new_cart = [];
//                    $new_cart['totalQty'] = $t_cart->totalQty;
//                    $new_cart['totalPrice'] = $total;
//                    $new_cart['items'] = $t_cart->items;
//                    $new_cart = json_encode($new_cart);
//                    $temp_affilate_users = OrderHelper::product_affilate_check($cart); // For Product Based Affilate Checking
//                    $affilate_users = $temp_affilate_users == null ? null : json_encode($temp_affilate_users);


                    $cart = json_encode($cartData);


                    $order = new Order;
                    $input['cart'] = $cart;
                    $input['user_id'] = Auth::check() ? Auth::user()->id : NULL;
                    $input['affilate_users'] = '0';
                    $input['pay_amount'] = abs((float)$item_amount / (float)$this->curr->value);
                    $input['order_number'] = $item_number;
                    $input['wallet_price'] = $request->wallet_price / $this->curr->value;
                    $input['payment_status'] = "Completed";
                    $input['txnid'] = $charge['balance_transaction'];
                    $input['charge_id'] = $charge['id'];
                    $input['coupon_discount'] = ($d = abs($get_total_price - $total)) > 0 ? $d : 0;
//                    if($input['tax_type'] == 'state_tax'){
//                        $input['tax_location'] = State::findOrFail($input['tax'])->state;
//                    }else{
//                        dd(Country::findOrFail(232)->country_name);
//                        $input['tax_location'] = Country::findOrFail($input['tax'])->country_name;
//                    }
                    $input['tax'] = Session::get('current_tax') ?? '0';

//                    dd($input);
                    if ($input['dp'] == 1) {
                        $input['status'] = 'completed';
                    }
                    if (Session::has('affilate')) {
                        $val = $request->total / $this->curr->value;
                        $val = $val / 100;
                        $sub = $val * $this->gs->affilate_charge;

                        if ($sub > 0) {
                            $user = OrderHelper::affilate_check(Session::get('affilate'), $sub, $input['dp']); // For Affiliate Checking
                            $input['affilate_user'] = Session::get('affilate');
                            $input['affilate_charge'] = $sub;
                        }

                    }
//                    dd($input);

                    $order->fill($input)->save();
                    $order->tracks()->create(['order_id' => $order->id, 'title' => 'Pending', 'text' => 'You have successfully placed your order.']);
                    $order->notifications()->create();

//                    if (!is_null($get_veteran_percentage)) {
//                        $get_veteran_percentage->order_id = $order->id;
//                        $get_veteran_percentage->avail = 1;
//                        $get_veteran_percentage->update();
//                    }


                    if ($input['coupon_id'] != "") {
                        OrderHelper::coupon_check($input['coupon_id']); // For Coupon Checking
                    }

                    OrderHelper::size_qty_check($cart); // For Size Quantiy Checking
                    OrderHelper::stock_check($cart); // For Stock Checking
                    OrderHelper::vendor_order_check($cart, $order); // For Vendor Order Checking

                    Session::put('temporder', $order);
                    Session::put('tempcart', $cart);
                    Session::forget('cart');
                    Session::forget('already');
                    Session::forget('coupon');
                    Session::forget('coupon_total');
                    Session::forget('coupon_total1');
                    Session::forget('coupon_percentage');

                    if ($order->user_id != 0 && $order->wallet_price != 0) {
                        OrderHelper::add_to_transaction($order, $order->wallet_price); // Store To Transactions
                    }

//                    //Sending Email To Buyer
//                    $data = [
//                        'to' => $order->customer_email,
//                        'type' => "new_order",
//                        'cname' => $order->customer_name,
//                        'oamount' => "",
//                        'aname' => "",
//                        'aemail' => "",
//                        'wtitle' => "",
//                        'onumber' => $order->order_number,
//                    ];
//
//                    $mailer = new GeniusMailer();
//                    $mailer->sendAutoOrderMail($data,$order->id);
//
//                    //Sending Email To Admin
//                    $data = [
//                        'to' => $this->ps->contact_email,
//                        'subject' => "New Order Recieved!!",
//                        'body' => "Hello Admin!<br>Your store has received a new order.<br>Order Number is ".$order->order_number.".Please login to your panel to check. <br>Thank you.",
//                    ];
//                    $mailer = new GeniusMailer();
//                    $mailer->sendCustomMail($data);


                    //Sending Email To Admin
                    $to = $this->ps->contact_email;
                    $from = 'noreply@gohazy.com';
                    $subject = "New Order Recieved!!";
                    $msg = "Hello Admin!<br>Your store has received a new order.<br>Order Number is " . $order->order_number . ".Please login to your panel to check. <br>Thank you." . ".<br>";
                    $msg .= "Customer Name: " . $order->customer_name . ".<br>";
                    $msg .= "Customer Phone: " . $order->customer_phone . ".<br>";
                    $msg .= "Customer Address: " . $order->customer_address . ".<br>";
                    $msg .= "Total Amount: " . (($order->pay_amount) + $order->coupon_discount) . ".<br>";
                    $msg .= "Discount: " . $order->coupon_discount . ".<br>";
                    $msg .= "Paid Amount: " . ($order->pay_amount + $order->wallet_price) . ".<br>";
                    $msg .= "Quantity: " . $order->totalQty . ".<br>";
//                    $msg .= "Item: " . $oldCart->item->name . ".<br>";
                    $msg .= "Regards: <br>";
                    $msg .= "<b>Team HAZY BY TONY</b>";

                    $this->customMail($from, $to, $subject, $msg);

                    //Sending Email To Buyer
                    $to = $order->customer_email;
                    $from = 'noreply@gohazy.com';
                    $subject = "Your Order Has Been Placed";
                    $msg = "Hi... " . $order->customer_name . ".<br>";
                    $msg .= "Phone: " . $order->customer_phone . ".<br>";
                    $msg .= "Address: " . $order->customer_address . ".<br>";
                    $msg .= "Total Amount: " . (($order->pay_amount) + $order->coupon_discount) . ".<br>";
                    $msg .= "Discount: " . $order->coupon_discount . ".<br>";
                    $msg .= "Paid Amount: " . ($order->pay_amount + $order->wallet_price) . ".<br>";
                    $msg .= "Quantity: " . $order->totalQty . ".<br>";
//                    $msg .= "Item: " . $oldCart->item->name . ".<br>";
                    $msg .= "Regards: <br>";
                    $msg .= "<b>Team HAZY BY TONY</b>";

                    $this->customMail($from, $to, $subject, $msg);

                    return redirect($success_url);

                }

            } catch (Exception $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                return back()->with('unsuccess', $e->getMessage());
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                return back()->with('unsuccess', $e->getMessage());
            }
        }
        return back()->with('unsuccess', __('Please Enter Valid Credit Card Informations.'));

    }
}
