@extends('frontend.master')

@section('content')
    <!-- Order Details -->
    <div class="col-md-3"></div>
    <div class="col-md-6 order-details" style="margin: 100px 0 100px 0;">
        <div class="section-title text-center">
            <h3 class="title">Your Order</h3>
        </div>
        <div class="order-summary">
            <div class="order-col">
                <div><strong>PRODUCT</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            <div class="order-products">
                @foreach($cart_array as $cart)
                    <div class="order-col">
                        <div>{{$cart['quantity']}}x {{$cart['name']}}</div>
                        <div>&#2547; {{Cart::get($cart['id'])->getPriceSum()}}</div>
                    </div>
                @endforeach
            </div>

            <div class="order-col">
                <div>Shiping</div>
                <div><strong>&#2547; 50</strong></div>
            </div>
            <div class="order-col">
                <div><strong>TOTAL</strong></div>
                <div><strong class="order-total">&#2547; {{Cart::getTotal()+50}}</strong></div>
            </div>
        </div>
        <div class="payment-method">
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-1">
                <label for="payment-1">
                    <span></span>
                    Direct Bank Transfer
                </label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-2">
                <label for="payment-2">
                    <span></span>
                    Cheque Payment
                </label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="input-radio">
                <input type="radio" name="payment" id="payment-3">
                <label for="payment-3">
                    <span></span>
                    Paypal System
                </label>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="input-checkbox">
            <input type="checkbox" id="terms">
            <label for="terms">
                <span></span>
                I've read and accept the <a href="#">terms & conditions</a>
            </label>
        </div>
        <a href="#" class="primary-btn order-submit">Place order</a>
    </div>
    <div class="col-md-3"></div>
    <!-- /Order Details -->
@endsection
