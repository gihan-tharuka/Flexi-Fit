<x-app-layout>

    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">
            <p class="text-xl font-medium">Order Summary</p>
            <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                <div class="flex flex-ROW rounded-lg bg-white sm:flex-row">
                    <img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="{{$details['image']}}" />
                    <div class="flex w-full flex-col px-4 py-4">
                        <span class="font-semibold">{{ $details['product_name'] }}</span>
                        <span class="float-right text-gray-400">Quantity:  {{$details['quantity']}}</span>
                        <p class="text-lg font-bold">LKR{{ $details['price'] }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>



        </div>
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Payment Details</p>
            <p class="text-gray-400">Complete your order by providing your payment details.</p>
            <div class="">
                <form action="" method="post" enctype="multipart/form-data">
                    {{@csrf_field()}}
                <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
                <div class="relative">
                    <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
                </div>
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label for="first-name" class="mt-4 mb-2 block text-sm font-medium">First name</label>
                        <div class="relative">
                            <input type="text" id="first-name" name="fname" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your first name here" />
                        </div>
                    </div>

                    <div class="w-1/2">
                        <label for="last-name" class="mt-4 mb-2 block text-sm font-medium">Last name</label>
                        <div class="relative">
                            <input type="text" id="last-name" name="lname" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your last name here" />
                        </div>
                    </div>
                </div>


                <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
                <div class="flex flex-col sm:flex-row">
                    <div class="relative flex-shrink-0 sm:w-7/12">
                        <input type="text" id="billing-address" name="address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                    </div>

                    <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Mobile</label>
                    <div class="relative flex-shrink-0 sm:w-7/12">
                        <input type="text" id="billing-address" name="phone" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
                    </div>

                    <div class="flex">
                        <div class="relative w-7/12 flex-shrink-0">
                            <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">City</label>
                            <input type="text" id="city" name="city" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="City" />
                        </div>
                        <div class="relative flex-shrink-0">
                        <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Zip</label>
                        <input type="text" name="zip" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Zip" />
                        </div>
                </div>

                <!-- Total -->
                <div class="mt-6 border-t border-b py-2">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Subtotal</p>
                        <p class="font-semibold text-gray-900">$399.00</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Shipping</p>
                        <p class="font-semibold text-gray-900">$8.00</p>
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900">{{session('total')}}</p>
                </div>
            </div>
            <button type="submit" class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place Order</button>
                </form>
            </div>
    </div>


{{--        <div class="w-full max-w-3xl mx-auto p-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md border dark:border-gray-700">--}}
{{--                <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Checkout</h1>--}}

{{--                <!-- Shipping Address -->--}}
{{--                <form  action="" method="post" enctype="multipart/form-data">--}}
{{--                    {{@csrf_field()}}--}}
{{--                <div class="mb-6">--}}
{{--                    <h2 class="text-xl font-semibold text-gray-700 dark:text-white mb-2">Shipping Address</h2>--}}
{{--                    <div class="grid grid-cols-2 gap-4">--}}
{{--                        <div>--}}
{{--                            <label for="first_name" class="block text-gray-700 dark:text-white mb-1">First Name</label>--}}
{{--                            <input type="text" name="fname" id="first_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for = "last_name" class="block text-gray-700 dark:text-white mb-1">Last Name</label>--}}
{{--                            <input type="text" name="lname" id="last_name" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mt-4">--}}
{{--                        <label for="address" class="block text-gray-700 dark:text-white mb-1">Address</label>--}}
{{--                        <input type="text" name="address" id="address" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                    </div>--}}

{{--                    <div class="mt-4">--}}
{{--                        <label for="city" class="block text-gray-700 dark:text-white mb-1">City</label>--}}
{{--                        <input type="text" name="city" id="city" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                    </div>--}}

{{--                    <div class="grid grid-cols-2 gap-4 mt-4">--}}
{{--                        <div>--}}
{{--                            <label for="state" class="block text-gray-700 dark:text-white mb-1">State</label>--}}
{{--                            <input type="text" name="state" id="state" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="zip" class="block text-gray-700 dark:text-white mb-1">ZIP Code</label>--}}
{{--                            <input type="text" name="zip" id="zip" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="grid grid-cols-2 gap-4 mt-4">--}}
{{--                        <div>--}}
{{--                            <label for="state" class="block text-gray-700 dark:text-white mb-1">Phone</label>--}}
{{--                            <input type="text" name="phone" id="phone" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <label for="zip" class="block text-gray-700 dark:text-white mb-1">Email</label>--}}
{{--                            <input type="email" name="email" id="email" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}




{{--                <div class="mt-8 flex justify-end">--}}

{{--                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-lg hover:bg-teal-700 dark:bg-teal-600 dark:text-white dark:hover:bg-teal-900">Place Order</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        </div>--}}


</x-app-layout>
