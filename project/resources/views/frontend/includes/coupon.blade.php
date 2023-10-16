<div class="applyCoupon w-100" id="check-coupon-form" {!! session()->has('already') ? '': 'style="display: none"' !!}>
    <input type="text" class="form-control" placeholder="Enter Voucher Code"
           id="code" value="{{ session('already', '') }}">
    <button class="btnStyle" type="button">Apply</button>
</div>
