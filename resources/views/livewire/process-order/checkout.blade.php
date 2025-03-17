<div>

    <body class="bg-white min-h-screen">
        <div class="max-w-[1200px] mx-auto p-6 grid grid-cols-1 lg:grid-cols-2 gap-8">
          <!-- Left Column - Checkout Form -->
          <div class="lg:max-w-[550px]">
            <!-- Express Checkout -->
            <div class="mb-8">
              <h2 class="text-lg font-medium mb-4">Express checkout</h2>
              <div class="grid grid-cols-3 gap-2">
                <button class="bg-[#5A31F4] text-white py-3 px-4 rounded-md">
                  <img src="https://cdn.shopify.com/shopifycloud/shopify/assets/checkout/shop-pay-logo-white-d47f45be1e2fd4d292c94c55ca292990e14890c0d7fae6292c69e92ff89c609f.svg" alt="Shop Pay" class="h-6 mx-auto"/>
                </button>
                <button class="bg-[#FFC439] text-[#003087] py-3 px-4 rounded-md">
                  <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" alt="PayPal" class="h-6 mx-auto"/>
                </button>
                <button class="bg-black text-white py-3 px-4 rounded-md">
                  <img src="https://www.gstatic.com/instantbuy/svg/dark_gpay.svg" alt="Google Pay" class="h-6 mx-auto"/>
                </button>
              </div>
              <div class="text-center my-4 text-gray-500">OR</div>
            </div>
    
            <!-- Contact -->
            <div class="mb-8">
              <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-medium">Contact</h2>
                <button class="text-blue-600 text-sm">Log in</button>
              </div>
              <input
                type="email"
                placeholder="Email"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none mb-4"
              />
              <label class="flex items-center gap-2">
                <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"/>
                <span class="text-sm text-gray-700">Email me with news and offers</span>
              </label>
            </div>
    
            <!-- Delivery -->
            <div class="mb-8">
              <h2 class="text-lg font-medium mb-4">Delivery</h2>
              <div class="space-y-4">
                <div class="relative">
                  <select class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none appearance-none bg-white">
                    <option>Country/Region</option>
                    <option>United States</option>
                    <option>United Kingdom</option>
                    <option>Canada</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                  <input
                    type="text"
                    placeholder="First name (optional)"
                    class="px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                  />
                  <input
                    type="text"
                    placeholder="Last name"
                    class="px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                  />
                </div>
    
                <input
                  type="text"
                  placeholder="Company (optional)"
                  class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
    
                <input
                  type="text"
                  placeholder="Address"
                  class="w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
              </div>
            </div>
          </div>
    
          <!-- Right Column - Order Summary -->
          <div class="bg-gray-50 p-6 rounded-lg">
            <div class="mb-6">
              <div class="flex items-center gap-4">
                <div class="relative">
                  <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=80" alt="Product" class="w-20 h-20 object-cover rounded"/>
                  <span class="absolute -top-2 -right-2 w-5 h-5 bg-gray-500 text-white rounded-full flex items-center justify-center text-xs">1</span>
                </div>
                <div class="flex-1">
                  <h3 class="font-medium">MARINA ANGLING TEE - SAND</h3>
                  <p class="text-sm text-gray-500">S</p>
                </div>
                <div class="text-right">
                  <p class="font-medium">$68.00</p>
                </div>
              </div>
            </div>
    
            <div class="border-t border-gray-200 pt-4">
              <div class="flex items-center gap-4 mb-4">
                <input
                  type="text"
                  placeholder="Discount code or gift card"
                  class="flex-1 px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none"
                />
                <button class="px-6 py-3 bg-gray-100 text-gray-600 rounded-md hover:bg-gray-200">Apply</button>
              </div>
    
              <div class="space-y-2 text-sm mb-4">
                <div class="flex justify-between">
                  <span>Subtotal</span>
                  <span>$68.00</span>
                </div>
                <div class="flex justify-between">
                  <span>Shipping</span>
                  <span>$14.00</span>
                </div>
              </div>
    
              <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                <span class="text-lg font-medium">Total</span>
                <div class="text-right">
                  <span class="text-sm text-gray-500">USD</span>
                  <span class="text-2xl font-medium ml-1">$82.00</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </body>
    
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('paymentForm');
            const cardNumber = document.getElementById('cardNumber');
            const expiry = document.getElementById('expiry');
            const cvv = document.getElementById('cvv');
    
            // Format card number with spaces
            cardNumber.addEventListener('input', function(e) {
              let value = e.target.value.replace(/\s/g, '');
              value = value.replace(/\D/g, '');
              value = value.replace(/(.{4})/g, '$1 ').trim();
              e.target.value = value;
            });
    
            // Format expiry date
            expiry.addEventListener('input', function(e) {
              let value = e.target.value.replace(/\D/g, '');
              if (value.length >= 2) {
                value = value.slice(0, 2) + ' / ' + value.slice(2);
              }
              e.target.value = value.slice(0, 7);
            });
    
            // Allow only numbers in CVV
            cvv.addEventListener('input', function(e) {
              e.target.value = e.target.value.replace(/\D/g, '');
            });
    
            // Form submission
            form.addEventListener('submit', function(e) {
              e.preventDefault();
              // Add your payment processing logic here
              alert('Payment processing would happen here!');
            });
          });
        </script>
    <script src="{{asset('js/detailsCart.js')}}" defer></script>
</div>
