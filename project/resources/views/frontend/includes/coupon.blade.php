<div class="applyCoupon w-100"
     id="check-coupon-form" {!! session()->has('is_veteran') || session()->has('is_discount_coupon') ? '': 'style="display: none"' !!}>
    <input type="text" class="form-control" placeholder="Enter Voucher Code"
           id="code"
           value="{{ session()->has('is_veteran') ? session('is_veteran') : (session()->has('is_discount_coupon') ? session('is_discount_coupon') : '') }}">
    <button class="btnStyle" type="button">Apply</button>
</div>
