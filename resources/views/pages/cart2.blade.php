<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">
        Shopping Cart
    </h1>
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="flex-1">
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="flex items-center">
                    <img alt="Sienna Basic Tee" class="w-24 h-24 rounded-md" height="100" src="{{$details['image'] }}" width="100"/>
                    <div class="ml-4 flex-1">
                        <h2 class="text-lg font-semibold">
                            {{ $details['product_name'] }}
                        </h2>
                        <p class="text-gray-500">
                            Sienna
                        </p>
                        <p class="text-gray-500">
                            Large
                        </p>
                        <p class="text-lg font-semibold mt-2">
                            LKR{{ $details['price'] }}
                        </p>
                        <div class="flex items-center mt-2 text-green-500">
                            <i class="fas fa-check-circle">
                            </i>

                        </div>
                    </div>
                    <div class="flex items-center">
                        <select class="border border-gray-300 rounded-md p-2">
                            <option>
                                1
                            </option>
                            <option>
                                2
                            </option>
                            <option>
                                3
                            </option>
                        </select>
                        <button class="ml-4 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times">
                            </i>
                        </button>
                    </div>
                </div>
            </div>

        <div class="w-full lg:w-1/3">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">
                    Order summary
                </h2>
                <div class="flex justify-between mb-2">
       <span class="text-gray-500">
        Subtotal
       </span>
                    <span class="font-semibold">
        $99.00
       </span>
                </div>
                <div class="flex justify-between mb-2">
       <span class="text-gray-500">
        Shipping estimate
        <i class="fas fa-question-circle">
        </i>
       </span>
                    <span class="font-semibold">
        $5.00
       </span>
                </div>
                <div class="flex justify-between mb-2">
       <span class="text-gray-500">
        Tax estimate
        <i class="fas fa-question-circle">
        </i>
       </span>
                    <span class="font-semibold">
        $8.32
       </span>
                </div>
                <div class="flex justify-between mb-4">
       <span class="text-gray-500">
        Order total
       </span>
                    <span class="font-semibold">
        $112.32
       </span>
                </div>
                <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                    Checkout
                </button>
            </div>
        </div>
    </div>
</div>
