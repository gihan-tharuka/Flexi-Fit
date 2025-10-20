
<x-app-layout>

<style>
    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10rem;
        margin-top: 2rem;
    }

    .card {
        background-color: white;
        overflow: hidden;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 2rem;
    }

    /* Grid layout adjustments */
    .sm\:grid {
        display: grid;
    }

    .sm\:grid-cols-2 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .sm\:gap-4 {
        gap: 1rem;
    }

    .sm\:px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    /* Additional styling for button */
    .bg-gradient-to-r {
        background: linear-gradient(to right, #4299e1, #3182ce);
    }

    .from-blue-400 {
        --gradient-color-stops: 100%;
    }

    .to-blue-600 {
        --gradient-color-stops: 0%;
    }

    .hover\:from-blue-500:hover {
        --gradient-color-stops: 100%;
    }

    .hover\:to-blue-700:hover {
        --gradient-color-stops: 0%;
    }

    .text-black {
        color: #000;
    }

    .font-bold {
        font-weight: 700;
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .rounded {
        border-radius: 0.375rem;
    }

    .shadow {
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }

</style>
<?php
$boxprice = session('box_price');
$phone = session('phone');
$address = session('address');
$weektotal = session('totalprice');
$period = session('period');
$meals = session('number_of_meals');
$totalprice = ($weektotal * 4) * $period;
session(['total' => $totalprice]);
session(['paymenttype' => 'Subscription']);


    ?>

    <div class=" card-container ">
<div class="w-full max-w-sm md:max-w-3xl xl:max-w-sm flex items-start flex-col gap-8 max-xl:mx-auto">
    <div class="card   p-6 border border-gray-200 rounded-3xl w-full group transition-all duration-500 hover:border-gray-400 " >
        <h2
            class="font-manrope font-bold text-3xl leading-10 text-black pb-6 border-b border-gray-200 ">
            Order Summary
        </h2>
        <div class="data py-6 border-b border-gray-200">
            <div class="flex items-center justify-between gap-4 ">
                <p class="font-normal text-lg leading-8 text-gray-400 transition-all duration-500 group-hover:text-gray-700">Box price </p>
                <p class="font-medium text-lg leading-8 text-gray-900">{{$boxprice}}</p>
            </div>
            <div class="flex items-center justify-between gap-4 ">
                <p class="font-normal text-lg leading-8 text-gray-400 transition-all duration-500 group-hover:text-gray-700">Shipping</p>
                <p class="font-medium text-lg leading-8 text-gray-600">1500</p>
            </div>
            <div class="flex items-center justify-between gap-4 ">
                <p class="font-normal text-lg leading-8 text-gray-400 transition-all duration-500 group-hover:text-gray-700 ">Weekly price</p>
                <p class="font-medium text-lg leading-8 text-emerald-500">{{$weektotal}}</p>
            </div>
            <div class="flex items-center justify-between gap-4 ">
                <p class="font-normal text-lg leading-8 text-gray-400 transition-all duration-500 group-hover:text-gray-700 ">Subscription Period</p>
                <p class="font-medium text-lg leading-8 text-emerald-500">{{$period}} Month</p>
            </div>
        </div>
        <div class="total flex items-center justify-between pt-6">
            <p class="font-normal text-xl leading-8 text-black ">Subtotal</p>
            <h5 class="font-manrope font-bold text-2xl leading-9 text-indigo-600">{{$totalprice}}</h5>
        </div>
    </div>
</div>



    <div class=" card  bg-white overflow-hidden shadow rounded-lg border w-65 " >
        <div class="px-4 py-3 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Customer information
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                This is some information about the user.
            </p>
        </div>
        <div class="border-t border-gray-200 px-2 py-2 sm:p-0 grid grid-template-columns: repeat(3, 1fr);">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                    <div class="py-3">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900" id="customer_name">
                           {{Auth::user()->name}}
                        </dd>
                    </div>
                    <div class="py-3">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900" id="customer_email">
                           {{Auth::user()->email}}
                        </dd>
                    </div>
                    <div class="py-3">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900" id="customer_phone">
                            {{$phone}}
                        </dd>
                    </div>

                    <div class="py-3">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900" id="customer_address">
                            {{$address}}
                        </dd>
                    </div>
                </div>
            </dl>

        </div>


        <a id="continue-button">
            <button class="bg-gradient-to-r from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700 text-black font-bold py-2 px-4 rounded shadow" >
                Continue
            </button>
        </a>

        </div>
    </div>
    </div>



    <script>

        document.getElementById('continue-button').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default anchor click behavior
            let preference = localStorage.getItem('preference');

            // Redirect to the menu page with the preference as a query parameter
            window.location.href = `select-menu/${preference}`;
        });
             document.getElementById("customer_address").innerText = localStorage.getItem('useraddress');
          //  document.getElementById("dtime").innerText = localStorage.getItem('time');
             document.getElementById("ddate").innerText = localStorage.getItem('date');
            document.getElementById("bprice").innerHTML = localStorage.getItem('box_price');
            document.getElementById("tprice").innerText = localStorage.getItem('total_price');


            var now = new Date();
            var day = now.getDate().toString().padStart(2, '0');
            var month = (now.getMonth() + 1).toString().padStart(2, '0');
            var year = now.getFullYear();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var dateTimeString = day + "/" + month + "/" + year + " " + hours + ":" + minutes;
            document.getElementById("date_now").textContent = dateTimeString;

            document.getElementById("order_id").innerHTML = "Order #" + parseInt(Math.random() * 100000);
        </script>
</x-app-layout>
