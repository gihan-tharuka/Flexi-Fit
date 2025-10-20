<div class="dark:bg-[#171717]">
    <style>
        .hidden1 {
            display: none;
        }

        /* Hide the up and down arrows in the number input */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="top-0 left-0 w-full h-16 bg-red-500 flex items-center justify-center">
        <img alt="Christmas decoration with holly leaves and berries" class="h-12 " height="50"
            src="{{$banner->getFirstMediaUrl('promotion_banner_img') }}"
            width="50" />
        <p class="text-white text-lg ml-4">
            {{$banner->title}}
        </p>
    </div>
    <div class="container mx-auto p-4">
        {{-- <nav class="text-sm text-gray-600 mb-4">
            <a class="hover:underline" href="#">
                Home
            </a>
            /
            <a class="hover:underline" href="#">
                Protein
            </a>
            /
            <a class="hover:underline" href="#">
                Whey Blends
            </a>
            /
            <span class="text-gray-800">
                {{$order->name}}
            </span>
        </nav> --}}
        <!-- Christmas Decoration -->


        <div class="flex flex-col md:flex-row p-8  rounded-lg">
            <div class="w-full md:w-1/2">
                <img alt="{{ $order->name }}" height="400" src="{{ $order->getFirstMediaUrl('product_image') }}" width="500"
                    class="rounded-lg" />
            </div>
            <div class="w-full md:w-1/2 rounded-lg md:pl-8 md:pr-8 md:pt-4 mt-4 md:mt-0 md:pb-4 md:dark:bg-[#141414]">
                @if ($order->on_sale)
                    <span class="text-green-500 uppercase font-bold">
                        Sale!
                    </span>
                @endif
                <h1 class="text-3xl font-bold mt-2 dark:text-gray-200 text-gray-800">
                    {{ $order->name }}
                </h1>
                <p class="text-green-500 text-md mt-2 mr-4 ">
                   Stock : {{ $order->stock_quantity }}
                </p>
                <div class="flex">

                    <p class="text-red-500 text-xl mt-2 mr-4 font-semibold">
                        Rs.{{ $order->discount_price }}
                    </p>
                    <p class="text-red-500 text-lg mt-2 line-through">
                        Rs.{{ $order->price }}
                    </p>

                </div>

                <p class="text-gray-500 text-sm dark:text-gray-200">
                    or 3 installments of රු{{ number_format($order->discount_price / 3, 2) }} with
                    <span class="font-semibold">
                        mintpay
                    </span>
                </p>

                <div class="mt-10 flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-2">
                    <div class="flex items-center space-x-2">
                        <button class="bg-gray-200 text-gray-700 px-2 py-1 rounded-sm font-bold"
                            onclick="decreaseQuantity()">
                            -
                        </button>
                        <input wire:model.lazy="quantity" class="border border-gray-200 w-12 h-8 text-center"
                            id="quantity" type="number" value="1" min="1"
                            max="{{ $order->stock_quantity }}" oninput="validateQuantity()" />
                        <button class="bg-gray-200 text-gray-700 px-2 py-1 rounded-sm font-bold"
                            onclick="increaseQuantity()">
                            +
                        </button>
                    </div>

                    <div
                        class="pt-4 md:pt-0 flex flex-col w-full md:flex-row md:w-auto space-y-2 md:space-y-0 md:pl-4 md:space-x-2">
                        <form wire:submit.prevent="addToCart({{ $order->id }})" action="{{ route('cart.store') }}"
                            method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-[#141414] dark:bg-[#F41E1E] text-white py-1 px-2 font-bold rounded-2xl shadow-md hover:bg-white hover:text-black transition duration-500 w-full md:w-auto"
                                {{ $order->stock_quantity > 0 ? 'bg-[#F41E1E] text-white' : 'bg-gray-400 text-gray-200 cursor-not-allowed' }}
                                {{ $order->stock_quantity <= 0 && $order->in_stock ? 'disabled' : '' }}>
                                Add To Cart
                                <i class="fas fa-shopping-cart ml-2"></i>
                            </button>
                        </form>
                        <button wire:click.prevent="quickbuy({{ $order->id }})"
                            class="bg-[#141414] dark:bg-[#F41E1E] text-white py-1 px-2 font-bold rounded-2xl shadow-md hover:bg-white hover:text-black transition duration-500 w-full md:w-auto  {{ $order->stock_quantity > 0 ? 'bg-[#F41E1E] text-white ' : 'bg-gray-400 text-gray-200 cursor-not-allowed' }}"
                            {{ $order->stock_quantity <= 0 && $order->in_stock ? 'disabled' : '' }}>
                            Quick Buy
                            <i class="fa-solid fa-truck-fast ml-2"></i>
                        </button>
                    </div>
                </div>

                <div class="mt-10 text-gray-700 dark:text-gray-200">
                    <p class="flex items-center dark:text-gray-300">
                        <i class="fas fa-check-circle mr-2 text-green-500 "></i>
                        Island-Wide Delivery
                    </p>
                    <p class="flex items-center dark:text-gray-300">
                        <i class="fas fa-check-circle mr-2 text-green-500"></i>
                        Buy Now &amp; Pay Later
                    </p>
                    <p class="flex items-center dark:text-gray-300">
                        <i class="fas fa-check-circle mr-2 text-green-500"></i>
                        Pay Securely Online with a Cr/Dr Card.
                    </p>
                </div>

                <div class="mt-10 bg-gray-200 md:dark:bg-[#171717] dark:bg-black p-3 rounded-md">
                    <h2 class="text-lg  text-gray-800 dark:text-gray-300 cursor-pointer flex justify-between items-center"
                        onclick="toggleDescription()">
                        Product Details
                        <i class="fas fa-chevron-down"></i>
                    </h2>
                    <div class="text-gray-700 dark:dark:text-gray-300 mt-2 hidden" id="description">
                        {!! $order->description !!}
                    </div>

                </div>

                <div class="mt-4 bg-gray-200 md:dark:bg-[#171717] dark:bg-black p-3 rounded-md">
                    <h2 class="text-lg  text-gray-800 dark:text-gray-300 cursor-pointer flex justify-between items-center"
                        onclick="toggleNutritionDetails()">
                        Nutrition Details
                        <i class="fas fa-chevron-down"></i>
                    </h2>
                    <div class="hidden mt-2" id="nutrition-details">
                        <img alt="Nutrition details of the product" class="w-full" height="400"
                            src="{{ $order->getFirstMediaUrl('nutrition_details_image') }}" width="600" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleDescription() {
            var description = document.getElementById('description');
            description.classList.toggle('hidden');
        }

        function toggleNutritionDetails() {
            var nutritionDetails = document.getElementById('nutrition-details');
            nutritionDetails.classList.toggle('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            var quantity = document.getElementById('quantity');
            if (!quantity.value) {
                quantity.value = 1;
            }
        });

        function increaseQuantity() {
            var quantity = document.getElementById('quantity');
            var maxQuantity = parseInt(quantity.getAttribute('max'));
            if (parseInt(quantity.value) < maxQuantity) {
                quantity.value = parseInt(quantity.value) + 1;
                @this.set('quantity', quantity.value);
            }
        }

        function decreaseQuantity() {
            var quantity = document.getElementById('quantity');
            if (parseInt(quantity.value) > 1) {
                quantity.value = parseInt(quantity.value) - 1;
                @this.set('quantity', quantity.value);
            }
        }

        function validateQuantity() {
            var quantity = document.getElementById('quantity');
            var maxQuantity = parseInt(quantity.getAttribute('max'));
            var value = parseInt(quantity.value);

            if (isNaN(value) || value < 1) {
                quantity.value = 1;
            } else if (value > maxQuantity) {
                quantity.value = maxQuantity;
            } else {
                quantity.value = value;
            }
            @this.set('quantity', quantity.value);
        }
    </script>
</div>
