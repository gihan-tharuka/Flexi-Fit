<x-app-layout>
    <style>
        .green-button {
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            padding: 10px 20px; /* Padding */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            font-size: 16px; /* Font size */
        }

        .green-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        .subscription-period {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .subscription-item {
            flex: 0 0 48%; /* Adjust the width as needed */
            padding: 10px;
            margin-bottom: 10px;
        }

        .subscription-container {
            margin-left: auto;
            width: 50%; /* Adjust the width as needed */
        }
    </style>

    <div class="container mx-auto mt-1 flex">
        <div class="w-full lg:w-2/3">
            <form action="{{route('subscriptions.create')}}">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6 mt-5">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Delivery Address
                        </label>
                        <input class="block w-full lg:w-3/4 xl:w-2/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" name="address" style="width: 500px">
                        <p class="text-gray-600 text-xs italic">This will be used to deliver the meals</p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-5 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            City
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="city">
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Zip code
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" name="zip">
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Contact
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" name="phone">
                </div>




        </div>

        <div class="subscription-container mt-5">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-black">Delivery Time</h2>
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name="time">
                <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                <option value="11:00 AM - 12:00 AM">11:00 AM - 12:00 AM</option>
                <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
            </select>

            <h2 class="text-xl font-semibold text-gray-900 dark:text-black mt-4">Subscription period</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="subscription-item">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="fedex1" aria-describedby="fedex-text1" type="radio" name="delivery-method" value="1" class="h-6 w-6 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>
                            <div class="ml-4 text-sm">
                                <label for="fedex1" class="font-medium leading-none text-gray-900 dark:text-white">1 Month</label>
                                <p id="fedex-text1" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Non-Refundable</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subscription-item">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="fedex2" aria-describedby="fedex-text2" type="radio" name="delivery-method" value="3" class="h-6 w-6 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>
                            <div class="ml-4 text-sm">
                                <label for="fedex2" class="font-medium leading-none text-gray-900 dark:text-white">3 Months</label>
                                <p id="fedex-text2" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Non-Refundable</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subscription-item">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="fedex3" aria-describedby="fedex-text3" type="radio" name="delivery-method" value="6" class="h-6 w-6 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>
                            <div class="ml-4 text-sm">
                                <label for="fedex3" class="font-medium leading-none text-gray-900 dark:text-white">6 Months</label>
                                <p id="fedex-text3" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Non-Refundable</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="subscription-item">
                    <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input id="fedex4" aria-describedby="fedex-text4" type="radio" name="delivery-method" value="12" class="h-6 w-6 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                            </div>
                            <div class="ml-4 text-sm">
                                <label for="fedex4" class="font-medium leading-none text-gray-900 dark:text-white">12 Months</label>
                                <p id="fedex-text4" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Non-Refundable</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <button class="green-button mb-5 w-50" type="submit">Next</button>
    </div>
        </div>

    <?php
    session(['period' => ('delivery-method')]);
    ?>
    <script>
        function y() {
            localStorage.setItem('username', document.getElementById("first-name").value);
            localStorage.setItem('useremail', document.getElementById("email").value);
            localStorage.setItem('useraddress', document.getElementById("street-address").value);
            localStorage.setItem('date', document.getElementById("first_delivery_date").value);
            localStorage.setItem('time', document.querySelector("select[name='time']").value);
        }
    </script>
</x-app-layout>
