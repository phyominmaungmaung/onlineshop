@extends('layouts.front.app')
@section('title')
    CheckOut
@stop
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <div class="woocommerce-info">Returning customer? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Click here to login</a>
                        </div>

                        <form id="login-form-wrap" class="login collapse" method="post">


                            <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

                            <p class="form-row form-row-first">
                                <label for="username">Username or email <span class="required">*</span>
                                </label>
                                <input type="text" id="username" name="username" class="input-text">
                            </p>
                            <p class="form-row form-row-last">
                                <label for="password">Password <span class="required">*</span>
                                </label>
                                <input type="password" id="password" name="password" class="input-text">
                            </p>
                            <div class="clear"></div>


                            <p class="form-row">
                                <input type="submit" value="Login" name="login" class="button">
                                <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                            </p>
                            <p class="lost_password">
                                <a href="#">Lost your password?</a>
                            </p>

                            <div class="clear"></div>
                        </form>

                        <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                            <div id="customer_details" class="col2-set">
                                <div class="col-1">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Billing Details</h3>
                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name"> Name <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Your Name" id="billing_first_name" name="billing_first_name" class="input-text ">
                                        </p>
                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Street address" id="billing_address_1" name="billing_address_1" class="input-text ">
                                        </p>
                                        <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Town / City" id="billing_city" name="billing_city" class="input-text ">
                                        </p>
                                        <div class="clear"></div>
                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Your Email Address" id="billing_email" name="billing_email" class="input-text ">
                                        </p>

                                        <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                            <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="Your Phone number...." id="billing_phone" name="billing_phone" class="input-text ">
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                                <div id="payment">
                                    <ul class="payment_methods methods">
                                        <li class="payment_method_bacs">
                                            <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                            <label for="payment_method_bacs">Direct Bank Transfer </label>
                                            <div class="payment_box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                            </div>
                                        </li>
                                        <li class="payment_method_cheque">
                                            <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                            <label for="payment_method_cheque">Cheque Payment </label>
                                        </li>
                                        <li class="payment_method_paypal">
                                            <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                            <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="{{url('frontend/img/logopal.png')}}">
                                            </label>
                                            <div style="display:none;" class="payment_box payment_method_paypal">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Place order" value="Place order" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                    </div>

                                    <div class="clear"></div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @stop