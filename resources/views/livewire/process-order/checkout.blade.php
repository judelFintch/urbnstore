<div>
  <!-- Checkout Section -->

<!-- Checkout Section -->
<section class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40">
                    <h4 class="mtext-109 cl2 p-b-30">Billing Details</h4>
                    <form>
                        <div class="bor8 bg0 m-b-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="bor8 bg0 m-b-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="bor8 bg0 m-b-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Shipping Address">
                        </div>
                        <div class="bor8 bg0 m-b-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city" placeholder="City">
                        </div>
                        <div class="bor8 bg0 m-b-20">
                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                        </div>
                        <div class="p-t-20 d-flex align-items-center">
                            <input type="checkbox" name="account" class="m-r-10" id="hasAccount">
                            <label for="hasAccount" class="stext-111 cl2">Do you have an account? <a href="/login" class="cl1 hov-cl2">Login</a></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40">
                    <h4 class="mtext-109 cl2 p-b-30">Your Order</h4>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">Product:</span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2">Subtotal</span>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-15 p-b-30">
                        <div class="size-208">
                            <span class="stext-110 cl2">Total:</span>
                        </div>
                        <div class="size-209">
                            <span class="mtext-110 cl2">$150.00</span>
                        </div>
                    </div>

                    <div class="p-t-20">
                        <h5>Payment Methods</h5>
                        <div class="d-flex">
                            <img src="{{asset('images/icons/icon-pay-02.png')}}" alt="Visa" class="m-r-10" style="width:50px;">
                            <img src="{{asset('images/icons/icon-pay-02.png')}}" alt="Visa" class="m-r-10" style="width:50px;">
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer m-t-30">
                        Place Order
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="{{asset('js/detailsCart.js')}}"></script>
</div>
