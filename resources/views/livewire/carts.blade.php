{{-- <div class="mx-auto p-8 md:pl-10 md:pr-10 dark:bg-[#171717]">--}}
{{--    <div class="flex justify-center">--}}
{{--        <h1 class="text-3xl ml-2 font-bold mb-16 md:pl-10 dark:text-white">YOUR CART</h1>--}}
{{--        <i class="fa-solid fa-cart-shopping text-2xl dark:text-white ml-4"></i>--}}
{{--    </div>--}}

{{--    @if(empty($cartItems))--}}
{{--        <!-- Message if the cart is empty -->--}}
{{--        <div class="flex justify-center items-center h-64">--}}
{{--            <p class="text-gray-600 text-xl dark:text-white">Your cart is currently empty.</p>--}}
{{--        </div>--}}
{{--    @else--}}
{{--        <!-- Flex container to position product and order summary next to each other -->--}}
{{--        <div class="flex flex-col lg:flex-row gap-16 md:pl-16">--}}
{{--            <!-- Left column for product items -->--}}
{{--            <div class="lg:w-2/3">--}}
{{--                @foreach($cartItems as $item)--}}
{{--                    <div class="pb-4 mb-4" wire:key="cart-item-{{ $item['rowId'] }}">--}}
{{--                        <div class="flex items-center md:pl-12">--}}
{{--                            <img alt="Sienna Basic Tee" class="w-24 h-24 object-cover rounded-md" height="100" src="{{ asset('img/prod.jpg') }}" width="100"/>--}}
{{--                            <div class="ml-4 flex-1 md:pl-16">--}}
{{--                                <h2 class="text-lg font-bold dark:text-gray-100">{{$item['name']}}</h2>--}}
{{--                                <p class="text-lg font-medium mt-2 dark:text-gray-100">රු.{{$item['total']}}.00</p>--}}
{{--                            </div>--}}
{{--                            <livewire:update-cart-quantity :rowId="$item['rowId']" :quantity="$item['qty']" :stock="$item['stock']" wire:key="update-quantity-{{ $item['rowId'] }}" />--}}
{{--                            <livewire:remove-from-cart :rowId="$item['rowId']" wire:key="remove-cart-item-{{ $item['rowId'] }}" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <!-- Right column for order summary -->--}}
{{--            <div class="lg:w-1/3  p-6 rounded-lg shadow-md bg-[#141414]">--}}
{{--                <h2 class="text-lg font-semibold mb-4 text-white">Order Summary</h2>--}}
{{--                <div class="flex justify-between mb-2">--}}
{{--                    <span class="text-gray-300">Subtotal</span>--}}
{{--                    <span class="font-medium text-white">රු. {{ Cart::subtotal() }}</span>--}}
{{--                </div>--}}
{{--                <div class="flex justify-between mb-2">--}}
{{--                    <span class="text-gray-300">Shipping estimate--}}
{{--                      <i class="fas fa-question-circle text-gray-400 ml-1"></i>--}}
{{--                    </span>--}}
{{--                    <span class="font-medium text-white">රු. 399</span>--}}
{{--                </div>--}}
{{--                <div class="flex justify-between mt-4 pt-4 border-t border-gray-200">--}}
{{--                    <span class="text-lg font-medium text-white ">Order total</span>--}}
{{--                    <span class="text-lg font-medium text-white">රු.{{ Cart::subtotal() + 399.00 }}</span>--}}
{{--                </div>--}}

{{--                <a href="order/user-info">--}}
{{--                    <button class="w-full bg-[#F41E1E] text-white py-2 px-2 font-bold mt-3 rounded-md shadow-md hover:bg-[#dd4949] transition duration-300">--}}
{{--                        Checkout--}}
{{--                        <i class="fa-solid fa-truck-fast ml-2"></i>--}}
{{--                    </button>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}





<div wire:poll.500ms>
    <div class="container mx-auto p-4 mt-4">
        <div class="flex flex-col lg:flex-row bg-white rounded-lg shadow-lg">
            <!-- Shopping Cart Section -->
            <div class="w-full lg:w-2/3 p-6">
                <h2 class="text-2xl font-bold mb-4">Shopping Cart</h2>
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">{{ Cart::count() }} items</span>
                </div>
                <div class="border-t border-gray-300"></div>
                <!-- Cart Items -->
                <div class="py-4">
                    @foreach($cartItems as $item)
                        <div class="flex flex-row md:flex-row items-center justify-between py-4 border-b border-gray-300" wire:key="cart-item-{{ $item['rowId'] }}">
                            <div class="flex items-center mb-4 md:mb-0 md:w-1/4">
                                <img alt="Dark purple T-shirt" class="w-16 h-16 mr-4" src="{{$item['image']}}" />
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-4 w-full md:w-3/4">
                                <div>
                                    <p class="font-bold">{{ $item['name'] }}</p>
                                </div>

                                <div>
                                    <livewire:update-cart-quantity :rowId="$item['rowId']" :quantity="$item['qty']" :stock="$item['stock']" wire:key="update-quantity-{{ $item['rowId'] }}" />
                                </div>

                                <div class="flex items-center justify-between md:justify-end gap-4">
                                    <span class="font-bold">රු.{{ $item['price'] }}.00</span>
                                    <livewire:remove-from-cart :rowId="$item['rowId']" wire:key="remove-cart-item-{{ $item['rowId'] }}" />
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a class="text-gray-600 hover:text-gray-800" href="/products">
                        <i class="fas fa-arrow-left"></i> Back to shop
                    </a>
                </div>

            </div>

            <!-- Summary Section -->
            <div class="w-full lg:w-1/3 bg-gray-100 p-6 rounded-r-lg">
                <h2 class="text-2xl font-bold mb-4">Summary</h2>

                <!-- Items List -->
                <div class="mb-4">
                    @foreach($cartItems as $item)
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">{{ $item['name'] }}</span>
                            <span class="font-semibold">රු.{{ number_format($item['total'], 2) }}</span>
                        </div>
                    @endforeach
                </div>

                <!-- Separator -->
                <div class="border-t border-gray-300 my-4"></div>

                <!-- Subtotal -->
                <div class="flex justify-between items-center mb-4">
                    <span class="text-gray-600">ITEMS ({{ Cart::count() }})</span>

                </div>

                <!-- Total -->
                <div class="flex justify-between items-center mb-4 text-lg font-bold">
                    <span class="text-gray-800">Total</span>
                    <span class="text-gray-900">රු.{{ number_format(Cart::subtotal(), 2) }}</span>
                </div>

                <a href="order/user-info">
                <button class="w-full p-3 bg-black text-white font-bold rounded-full checkout-button hover:bg-red-600 transition duration-500">
                    CHECKOUT
                    <i class="fas fa-shopping-cart ml-2"></i>
                </button>
                </a>
            </div>
        </div>
    </div>
</div>
