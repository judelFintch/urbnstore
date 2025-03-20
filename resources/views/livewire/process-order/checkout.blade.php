<div>
    <section class="bg-white min-h-screen">
        <div class="max-w-[1200px] mx-auto p-6 grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Left Column - Checkout Form -->
            <div class="lg:max-w-[550px] bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                <!-- Express Checkout -->
                <div class="mb-8">
                    <h2 class="text-lg font-medium mb-4">Express checkout</h2>
                    <div class="grid grid-cols-3 gap-2">
                        <button class="bg-[#f0f1f5] text-white py-3 px-4 rounded-md">
                            <img src="https://maxicash.co/wp-content/uploads/2024/04/maxicashlogo-1.png" alt="max cash"
                                class="h-6 mx-auto" />
                        </button>
                        <button class="bg-[#FFC439] text-[#003087] py-3 px-4 rounded-md">
                            <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png"
                                alt="PayPal" class="h-6 mx-auto" />
                        </button>
                        <button class="bg-black text-white py-3 px-4 rounded-md">
                            <img src="https://www.gstatic.com/instantbuy/svg/dark_gpay.svg" alt="Google Pay"
                                class="h-6 mx-auto" />
                        </button>
                    </div>
                    <div class="text-center my-4 text-gray-500">OR</div>
                </div>
                <!-- Contact -->
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-4">
                       
                        <a href="{{route('login')}}"><button class="text-blue-600 text-sm">J'ai dispose de compte Urbn</button></a>
                    </div>
                </div>

                <!-- Delivery -->
                <div class="mb-8">
                    <h2 class="text-lg font-medium mb-4">Achete sans compte</h2>
                    <div class="space-y-4">
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-md bg-white">
                            <option>Pays</option>
                            <option>Congo Kinshasa</option>
                            
                        </select>
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="First name"
                                class="px-4 py-3 border border-gray-300 rounded-md" />
                            <input type="text" placeholder="Last name"
                                class="px-4 py-3 border border-gray-300 rounded-md" />
                        </div>
                        <input type="text" placeholder="Company (optional)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md" />
                        <input type="text" placeholder="Address"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md" />
                    </div>
                </div>
            </div>
            <!-- Right Column - Order Summary -->
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200 shadow-sm">
                <div class="mb-6 space-y-4" id="order-summary-products">
                    <!-- Produits dynamiques injectés ici -->
                </div>

                <div class="border-t border-gray-200 pt-4 gap-4">
                    <div class="recpaImage flex items-center gap-4 grap display-flex"> ">
                        <div class="relative">
                            <img src="https://placehold.co/80x80" alt="Product" class="rounded">
                            <span
                                class="absolute -top-2 -right-2 bg-gray-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">1</span>
                        </div>
                        <div class="flex-grow">
                            <h3 class="font-semibold">MARINA ANGLING TEE - SAND</h3>
                            <p class="text-gray-500">S</p>
                        </div>
                        <div class="font-semibold">$68.00</div>
                    </div>

                    <div class="flex items-center gap-4 mb-4 mt-8">
                        <input type="text" placeholder="Discount code or gift card"
                            class="flex-1 px-4 py-3 border border-gray-300 rounded-md" />
                        <button class="px-6 py-3 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">Apply</button>
                    </div>

                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span id="order-subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span id="order-shipping">$14.00</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                        <span class="text-lg font-medium cartSubtotal">Total</span>
                        <div class="text-right">
                            <span class="text-sm text-gray-500">USD</span>
                            <span id="order-total" class="text-2xl font-medium ml-1">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/checkout.js') }}"></script>
</div>
