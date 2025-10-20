<x-app-layout>
<!-- Preloader -->
<!-- Preloader -->
<div id="preloader" style="" class="fixed inset-0 z-50 flex items-center justify-center bg-white dark:bg-[#141414]">
    <img id="preloader-logo" src="{{ asset('flexilogo.png') }}" alt="Logo" class="animate-bounce rounded-lg">
</div>

<style>
/* Preloader Styles */
#preloader {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    width: 100%;
    height: 100%;
    /* background-color: #222020; */
    z-index: 9999;
    opacity: 1;
    transition: opacity 0.5s ease;
}

/* Dark mode support */
/* .dark #preloader {
    background-color: #1f2937; /* Dark theme background color */
/* } */

#preloader-logo {
    width: 320px; /* Adjust the size as needed */
    height: 80px;
    animation: fadeInOut 8s infinite; /* Fade-in, fade-out animation */
}

/* Custom animation */
@keyframes fadeInOut {
    0%, 100% {
        opacity: 0;
        transform: scale(0.95);
    }
    50% {
        opacity: 1;
        transform: scale(1);
    }
}

    html {
        scroll-behavior: smooth;
    }


</style>
<script>
    // Wait for the entire page to load
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500); // Adjust time if needed
    });

    // Check if in standalone mode
    if (window.matchMedia('(display-mode: standalone)').matches) {
        // Show the bottom navigation
        document.getElementById('preloader').style.display = 'flex'; // or 'block' based on your layout
    }
</script>

    <!-- Hero Section Begin -->
    <div class="w-full dark:bg-[#171717] py-12 text-center px-4 pt-2">
        <div class="container px-4 relative py-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="flex flex-col items-center justify-between lg:flex-row">
                <!-- Image div - will appear first on mobile -->
                <div class="relative w-full mb-10 lg:hidden lg:w-1/2 lg:order-2">
                    <img id="sliderImageMobile" class="object-cover w-full h-56 rounded shadow-lg sm:h-96"
                         src="{{ App\Models\SliderImage::first()?->getFirstMediaUrl('slider_images', 'thumb') ?? asset('default.jpg') }}"
                         alt="Slider Image" />
                </div>

                <!-- Content div -->
                <div class="lg:max-w-lg lg:pr-5 lg:mb-0">
                    <div class="max-w-xl mb-6">
                        <h2 class="max-w-lg mb-6 font-sans text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl sm:leading-none">
                            Achieve Your Fitness Goals<br class="hidden md:block" />
                            with Our Expert Trainers
                        </h2>
                        <p class="text-base text-gray-700 dark:text-gray-400 md:text-lg">
                            Join us to transform your body and mind. Our personalized workout plans, expert coaching,
                            and top-notch facilities are designed to help you succeed in your fitness journey.
                        </p>
                    </div>
                    <div class="flex flex-col items-center md:flex-row">
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-8">
                            <button
                                class="w-full sm:w-auto bg-[#F41E1E] text-white dark:hover:text-black uppercase text-lg py-2 px-6 font-bold rounded-sm shadow-md dark:hover:bg-white hover:bg-[#141414] transition duration-300"
                                onclick="window.location.href='{{ url('register') }}'">
                                Register Now
                            </button>
                            <button
                                class="w-full sm:w-auto text-black dark:text-white py-2 text-lg uppercase px-6 font-bold rounded-sm hover:bg-[#F41E1E] transition duration-300 border border-red-500"
                                onclick="window.location.href='{{ url('pricing') }}'">
                                View Pricing
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Image div - hidden on mobile, visible on desktop -->
                <div class="relative hidden lg:block lg:w-1/2">
                    <img id="sliderImage" class="object-cover w-full h-56 rounded shadow-lg sm:h-96"
                         src="{{ App\Models\SliderImage::first()?->getFirstMediaUrl('slider_images', 'thumb') ?? asset('default.jpg') }}"
                         alt="Slider Image" />
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const response = await fetch("{{ route('slider.images.json') }}");
            const images = await response.json();
            let currentIndex = 0;
            const imageElement = document.getElementById('sliderImage');
            const mobileImageElement = document.getElementById('sliderImageMobile');

            if (images.length > 0) {
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    const newImage = images[currentIndex];
                    imageElement.src = newImage;
                    if (mobileImageElement) {
                        mobileImageElement.src = newImage;
                    }
                }, 3000);
            }
        });
    </script>


    <!-- Hero Section End -->


    {{-- About us --}}

    {{-- About us end --}}

    {{-- Our store --}}
    <div id="services" class="w-full dark:bg-[#141414] py-12 px-4">
        <div class="container mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
                    Best Sellers
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
                </h2>
                <h1 class="text-4xl text-center font-extrabold mb-20 text-gray-900 dark:text-white">
                    Discover Our Best Selling Products

                </h1>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 w-full lg:w-3/4 mx-auto">

                @foreach ($bestsellingProducts as $value)
                    <div class="bg-white p-2 shadow-md rounded-lg dark:bg-[#141414] dark:text-white">
                        <div class="relative">
                            <a href="{{ url('product-details/' . $value->id) }}">
                                 <img alt="{{ $value->name }}" class="rounded-lg h-72 object-cover" src="{{ $value->getFirstMediaUrl('product_image') }}" />


                            </a>


                            @if ($value->on_sale)
                                <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Sale!</span>
                            @endif

                            @if($value->stock_quantity > 0)
                                <span class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 text-xs rounded-lg">In Stock</span>
                            @else
                                <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Out of Stock</span>
                            @endif
                        </div>
                        <p class="text-gray-500 text-xs mt-2 truncate">{{ $value->tags }}</p>
                        <h2 class="text-lg font-bold mt-2 dark:text-white truncate">{{ $value->name }}</h2>
                        <div class="flex  mt-2 flex-col sm:flex-row">
                            @if ($value->on_sale)
                                <span class="line-through text-gray-500 mr-0 sm:mr-2">රු{{ $value->discount_price }}</span>
                            @endif
                            <span class="text-red-500 text-xl font-bold">රු{{ $value->price }}</span>
                        </div>


                        <div class="flex mt-2">
                            <!-- Quick Buy Button -->
                            <button wire:click.prevent="quickbuy({{ $value->id }})"
                                    class="w-full py-1 mr-2 rounded-2xl {{ $value->stock_quantity > 0 ? 'bg-[#F41E1E] text-white hover:bg-[#db4747]' : 'bg-gray-400 text-gray-200 cursor-not-allowed' }}"
                                {{ $value->stock_quantity <= 0 && $value->in_stock ? 'disabled' : '' }}>
                                Quick Buy
                            </button>

                            <!-- Add to Cart Button -->
                            <form wire:submit.prevent="addToCart({{ $value->id }})" action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="py-1 px-4 rounded-2xl {{ $value->stock_quantity > 0 ? (isset($cartAdded[$value->id]) && $cartAdded[$value->id] ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300') : 'bg-gray-400 text-gray-200 cursor-not-allowed' }}"
                                    {{ $value->stock_quantity <= 0 && $value->in_stock ? 'disabled' : '' }}>
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                        <p class="text-gray-500 dark:text-gray-300 text-xs mt-2">or 3 Installments of රු{{ number_format($value->discount_price / 3, 2) }} with <span class="font-bold">KOKO</span></p>
                    </div>
                @endforeach

            </div>
            {{-- button called All products to redirect the user to products page--}}
            <div class="w-full flex justify-center mt-8">
                <a href="{{ url('products') }}"
                    class="bg-[#F41E1E] text-white py-2 px-6 font-semibold rounded-md shadow-md hover:bg-[#db4747] transition duration-300">
                    Show All Products
                </a>
            </div>
        </div>
    </div>

    {{-- membership plans --}}
    <div id="pricing" class="w-full dark:bg-[#141414] md:py-12 text-center md:px-4 pt-2">
        <div class="text-center mt-20">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
                Membership plans
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-12 text-gray-900 dark:text-white">
                Best Plans For You
            </h1>
            <div class="flex overflow-x-auto space-x-4 px-4 md:pl-16  scrollbar-hide">

                @foreach($plans as $plan)
                <!-- Card 1 -->
                <div
                    class="bg-white dark:bg-[#171717] rounded-lg shadow-lg transform transition duration-500 hover:scale-105 w-72 relative md:mx-4 my-4 flex-shrink-0">
                    <img alt="Gym facilities image" class="rounded-t-lg" height="160"
                        src="{{$plan->getFirstMediaUrl('membership_thumbnail') }}"
                        width="288" />
                    <div
                        class="absolute top-0 right-0 bg-[#F41E1E] text-white text-xs font-bold py-1 px-2 rounded-bl-lg">
                        Valid till only
                    </div>
                    <div class="bg-white text-gray-800 text-center py-1">
                        <h2 class="text-lg font-bold ">
                            {{$plan->name}}
                        </h2>
                    </div>
                    <div class="text-center mt-2 px-4">
                        @if($plan->discount == 1)
                        <p class="text-gray-600 dark:text-gray-300 text-xl line-through">
                            {{$plan->discount_price}}
                        </p>
                        @endif
                        <p class="text-[#F41E1E] text-2xl font-extrabold">
                            Rs.{{$plan->price}}
                        </p>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            {{$plan->description}}
                        </p>
                        <button
                            class="mt-4 mb-4 bg-[#141414] dark:bg-[#F41E1E] text-white py-2 px-4 font-bold rounded-full shadow-md hover:bg-[#F41E1E] transition duration-300"
                            onclick="window.location.href='{{ url('register') }}'">
                            Register Now
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- membership plans end --}}

    {{-- Our servces --}}
    <div id="services" class="w-full dark:bg-[#141414] py-12">
        <div class="container mx-auto">
            <div class="text-center mb-8">
                <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2"></span>
                    Our Services
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2"></span>
                </h2>
                <h1 class="text-4xl text-center font-extrabold mb-20 text-gray-900 dark:text-white">
                    Our Comprehensive Range of Services.
                </h1>
            </div>

            <!-- Modified services container -->
            <div class="md:px-14 px-4">
                <div class="flex overflow-x-auto pb-4 space-x-4 md:grid md:grid-cols-3 md:gap-8 md:overflow-x-visible md:space-x-0">
                    @foreach($services as $service)
                    <div class="flex-shrink-0 w-60 md:w-auto bg-white dark:bg-[#171717] shadow-lg rounded-lg overflow-hidden">
                        <img alt="Personal Training - Trainer assisting a client with weights"
                            class="w-full h-48 object-cover" height="400"
                            src="{{$service->getFirstMediaUrl('service_thumbnail')}}"
                            width="600" />
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-white bg-[#F41E1E] inline-block px-3 py-1 rounded-sm mb-4">
                                {{$service->title}}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{$service->description}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- Our servces end --}}

    {{-- proccess steps start --}}
    <div class="w-full dark:bg-[#171717] py-12 px-4 pt-20">
        <div class="container mx-auto text-center ">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
                Work Process
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-16 text-gray-900 dark:text-white">
                Easy Step To Achieve Your Goals.
            </h1>
            <div
                class="relative flex flex-col md:flex-row justify-center items-center space-y-8 md:space-y-0 md:space-x-16">
                <div class="line-connector hidden md:block dark:bg-gray-200"
                    style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: #e5e7eb; z-index: -1;">
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person doing gym movement" height="200"
                            src="{{asset('/img/signup.jpg')}}"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-01
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                        Sign Up
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Join the gym by completing the membership registration.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person practicing fitness" height="200"
                            src="{{asset('/img/scale.jpg')}}"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-02
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                        Initial Assessment
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Undergo an initial fitness assessment with our trainers.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person achieving fitness goal" height="200"
                            src="https://storage.googleapis.com/a1aa/image/lt0xfLKxXr0aB6akywTdYB4lEj0OqPB3p50v9dgkTEfaU6pTA.jpg"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-03
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                        Personalized Workout Plan
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Get a tailored workout plan to match your fitness goals.
                    </p>
                </div>
            </div>
            <div
                class="relative flex flex-col md:flex-row justify-center items-center mt-10 space-y-8 md:space-y-0 md:space-x-16">
                <div class="line-connector hidden md:block"
                    style="position: absolute; top: 50%; left: 0; width: 100%; height: 2px; background-color: #e5e7eb; z-index: -1;">
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person doing gym movement" height="200"
                            src="{{asset('/img/begin.jpg')}}"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-04
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                       Begin Workouts
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Start following your workout plan and track progress.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person practicing fitness" height="200"
                            src="{{asset('/img/asses.png')}}"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-05
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                        Progress Review
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Meet with trainers regularly to review and adjust your plan.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="step-circle"
                        style="position: relative; width: 200px; height: 200px; border-radius: 50%; overflow: hidden; border: 5px solid #e5e7eb; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <img alt="Person achieving fitness goal" height="200"
                            src="{{asset('/img/achieve.jpg')}}"
                            style="width: 100%; height: 100%; object-fit: cover;" width="200" />
                        <div class="step-label"
                            style="position: absolute; bottom: 10px; left: 50%; transform: translateX(-50%); background-color: #F41E1E; color: white; padding: 5px 10px; border-radius: 20px; font-weight: bold;">
                            STEP-06
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold mt-4 dark:text-white">
                        Achievement Your Goals
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2 text-lg">
                        Achieve your fitness goals and maintain a healthy lifestyle.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- proccess steps end --}}




    <style>
        /* Hide scrollbar */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
    <!-- Membership Section End -->

    {{-- bmi start --}}
<div id="bmi" class="w-full dark:bg-[#171717] py-12 px-4 pt-20">
    <div class="container mx-auto p-8 text-center ">
        <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
            <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
            </span>
            BMI Calculator
            <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
            </span>
        </h2>
        <h1 class="text-4xl font-extrabold mb-16 text-gray-900 dark:text-white">
            Calculate Your Body Mass Index (BMI)
        </h1>
        <div class="flex flex-col lg:flex-row justify-between items-start">
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                <form class="space-y-4" onsubmit="event.preventDefault(); calculateBMI();">
                    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                        <input type="text" id="height" placeholder="Height / cm"
                            class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                        <input type="text" id="weight" placeholder="Weight / kg"
                            class="w-full lg:w-1/2 p-3 border border-red-500 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                    </div>
                    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                        <input type="text" id="age" placeholder="Age"
                            class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                        <select id="gender"
                            class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <select id="activityFactor"
                        class="w-full p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300 rounded">
                        <option value="">Select an activity factor:</option>
                        <option value="1.2">Sedentary (little or no exercise)</option>
                        <option value="1.375">Lightly active (light exercise/sports 1-3 days/week)</option>
                        <option value="1.55">Moderately active (moderate exercise/sports 3-5 days/week)</option>
                        <option value="1.725">Very active (hard exercise/sports 6-7 days a week)</option>
                        <option value="1.9">Super active (very hard exercise/sports & physical job)</option>
                    </select>
                    <button type="submit"
                        class="w-full p-3 dark:bg-[#F41E1E] bg-black text-white text-md font-bold rounded-md hover:bg-[#F41E1E] dark:hover:bg-black uppercase">Calculate</button>
                </form>
                <p id="bmiResult" class="mt-4 text-xl font-bold"></p>
            </div>
            <div class="w-full lg:w-1/3">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="p-3 bg-[#141414] text-white text-center">BMI</th>
                            <th class="p-3 bg-[#141414] text-[#F41E1E] text-center">Weight Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Below 18.5</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Underweight</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                18.5 - 24.9</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Healthy</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                25.0 - 29.9</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Overweight</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                30.0 - and Above</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Obese</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function calculateBMI() {
        // Get input values
        const heightCm = parseFloat(document.getElementById('height').value); // Height in cm
        const weightKg = parseFloat(document.getElementById('weight').value);  // Weight in kilograms
        const age = parseInt(document.getElementById('age').value);            // Age in years
        const gender = document.getElementById('gender').value;               // Gender
        const activityFactor = parseFloat(document.getElementById('activityFactor').value); // Activity factor

        // Validate inputs
        if (isNaN(heightCm) || isNaN(weightKg) || isNaN(age) || !gender || !activityFactor) {
            alert('Please fill in all fields correctly.');
            return;
        }

        // Convert height from cm to meters
        const heightMeters = heightCm / 100;

        // Calculate BMI
        const bmi = weightKg / (heightMeters * heightMeters);

        // Calculate BMR using the Mifflin-St Jeor Equation
        let bmr;
        if (gender === 'male') {
            bmr = 10 * weightKg + 6.25 * heightCm - 5 * age + 5;
        } else {
            bmr = 10 * weightKg + 6.25 * heightCm - 5 * age - 161;
        }

        // Adjust BMR for activity level
        const calorieNeeds = bmr * activityFactor;

        // Calculate daily protein intake
        let proteinFactor;
        if (activityFactor <= 1.375) {
            proteinFactor = 0.8; // Sedentary
        } else if (activityFactor <= 1.55) {
            proteinFactor = 1.2; // Lightly Active to Moderately Active
        } else {
            proteinFactor = 1.6; // Very Active to Super Active
        }
        const proteinIntake = weightKg * proteinFactor;

        // Determine BMI category
        let bmiCategory = '';
        if (bmi < 18.5) {
            bmiCategory = 'Underweight';
        } else if (bmi >= 18.5 && bmi < 24.9) {
            bmiCategory = 'Healthy';
        } else if (bmi >= 25 && bmi < 29.9) {
            bmiCategory = 'Overweight';
        } else {
            bmiCategory = 'Obese';
        }

        // Display result
        document.getElementById('bmiResult').innerText =
            `Your BMI is ${bmi.toFixed(2)} (${bmiCategory}).
            Based on your age, gender, and activity level:
            - Your daily calorie needs are approximately ${calorieNeeds.toFixed(2)} calories.
            - Your recommended daily protein intake is approximately ${proteinIntake.toFixed(2)} grams.`;
    }
</script>




    {{-- bmi end --}}

    {{-- Team section start  --}}
    <div class="w-full dark:bg-[#141414] py-12 text-center pt-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-6 flex items-center justify-center">
                <span class="inline-block w-12 h-1 bg-[#F41E1E] mx-2"></span>
                Our team
                <span class="inline-block w-12 h-1 bg-[#F41E1E] mx-2"></span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-6 text-gray-900 dark:text-white">
                The Expert Trainers Behind the Scenes
            </h1>

            <!-- Modified team members container -->
            <div class="container mx-auto py-12 px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($our_team as $team_member)
                        <div class="bg-[#171717] rounded-lg overflow-hidden shadow-lg">
                            <img
                                alt="Trainer photo"
                                class="w-full h-64 object-cover"
                                src="{{ $team_member->getFirstMediaUrl('our_team_photo') }}" />
                            <div class="bg-[#F41E1E] text-center py-2">
                                <h2 class="font-bold text-white">
                                    {{ $team_member->name }}
                                </h2>
                            </div>
                            <div class="p-4 text-center">
                                <p class="text-gray-300">
                                    {{ $team_member->position }}
                                </p>
                                <div class="flex justify-center space-x-4 mt-4">
                                    <a class="text-[#F41E1E]" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="text-[#F41E1E]" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="text-[#F41E1E]" href="#"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


    {{-- Team section end  --}}
    <div class="w-full dark:bg-[#171717] py-12 text-center px-4 pt-8">
        <div class="max-w-6xl mx-auto py-10 text-center">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
                Our Gallery
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-20 text-gray-900 dark:text-white">
                Capturing Moments of Our Journey
            </h1>
            <div class="grid grid-cols-2 sm:px-2 lg:px-0 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($gallery as $value)
                    <div class="relative">
                        <img alt="Skydivers in the sky" class="w-full h-64 object-cover rounded-lg"
                             src="{{ $value->getFirstMediaUrl('images') }}" />
                        <div class="absolute bottom-2 left-2 text-yellow-500 text-lg font-bold">
                            {{ \Carbon\Carbon::parse($value->date)->format('Y') }}
                        </div>
                    </div>
                @endforeach
            </div>


            </div>
        </div>
    </div>


    <!-- Banner Section Begin -->
    <section class=""
        style="background-image: url('img/banner-bg.jpg'); background-size: cover; background-position: center;">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-1/2">
                    <div class=" pt-16 lg:pt-40">
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-white ">
                            Register To Get A Free Personal Training Session!
                        </h2>
                        <p class="lg:text-lg text-gray-300 mt-10">
                            Unlock your full potential with personalized training programs designed to help you reach
                            your goals. Let’s make progress, together.
                        </p>
                        <button
                            class="mt-12  rounded-md bg-[#F41E1E] text-white font-bold text-md px-5 py-3.5 focus:ring-4 focus:ring-blue-300 focus:outline-none uppercase transition duration-300 ease-in-out hover:bg-black"
                            type="button"
                            onclick="window.location.href='{{ url('register') }}'">
                            Register Now
                        </button>
                    </div>
                </div>
                <div
                    class="w-full lg:w-1/2 flex justify-center lg:justify-end items-center lg:items-end mt-8 lg:mt-0 h-full">
                    <img alt="A person in athletic wear performing a fitness exercise" class="w-3/4 lg:w-auto "
                        src="img/banner-person.png" />
                </div>
            </div>
        </div>
    </section>


       {{-- <!-- Testimonial Section Begin --> --}}

    {{--    <!-- Testimonial Section End --> --}}

    <!-- Register Section Begin -->
    {{-- <section class="register-section spad" style="background-color: #1e1e1e;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="register-text">
                        <div class="section-title">
                            <h2>Booking</h2>
                            <!-- <p>The First 7 Day Trial Is Completely Free With The Teacher</p> -->
                        </div>
                        <form action="{{ route('bookings.store') }}" method="POST" class="register-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name">First Name</label>
                                    <input type="text" id="name" name="first_name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Your email address</label>
                                    <input type="text" id="email" name="email">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" id="last-name" name="last_name">
                                </div>
                                <div class="col-lg-6">
                                    <label for="mobile">Mobile No*</label>
                                    <input type="text" id="mobile" name="mobile">
                                </div>
                            </div>
                            @auth
                                <button class="btn btn-primary w-100 py-3" type="submit" style="background-color: #13C5DD">Booking</button>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-primary w-100 py-3" style="background-color: #13C5DD">Log In</a>
                            @endguest
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="register-pic">
                        <img src="img/register-pic.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <div  id="contact" class="w-full dark:bg-[#171717] py-12 text-center px-4 pt-12">
        <div class="container mx-auto text-center">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
                Contact Us
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                </span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-20 text-gray-900  dark:text-white">
                We are here to assist you.
            </h1>

            <div
                class="grid md:grid-cols-2 dark:bg-[#141414] gap-16 items-center relative overflow-hidden p-8  rounded-3xl max-w-6xl mx-auto  mt-16 mb-16 font-[sans-serif] before:absolute before:right-0 before:w-[300px] before:bg-black before:h-full max-md:before:hidden">
                <div>

                    <p class="text-md text-gray-400  dark:text-gray-300 mt-4 leading-relaxed">Have a specific inquiry or looking to explore
                        new
                        opportunities? Our
                        experienced team is ready to engage with you.</p>

                    <form method="post" action="{{ route('bookings.store') }}">
                        @csrf
                        <div class="space-y-4 mt-8">

                            <div class="grid grid-cols-2 gap-6">
                                <input type="text" placeholder="First Name" name="first_name"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />

                                <input type="text" placeholder="Last Name" name="last_name"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <input type="number" placeholder="Phone No." name="phone"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />

                                <input type="email" placeholder="Email" name="email"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />
                            </div>

                            <div class="grid grid-cols-2 gap-6">
                                <input type="date" placeholder="Date" name="date"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />

                                <input type="time" placeholder="Time" name="time"
                                    class="px-2 py-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl" />
                            </div>

                            <textarea placeholder="Write Message" name="note"
                                class="px-2 pt-3 bg-white w-full dark:bg-[#171717] text-gray-300 text-sm border border-gray-300 dark:border-gray-600 focus:border-red-600 outline-none focus:ring-0 rounded-2xl"></textarea>
                        </div>

                        @auth
                            <button type="submit"
                                class="mt-8 flex items-center justify-center text-lg w-full rounded-md font-bold px-6 py-3 bg-[#F41E1E] hover:bg-white text-white dark:hover:text-black transition duration-300 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill='#fff'
                                    class="mr-2" viewBox="0 0 548.244 548.244">
                                    <path fill-rule="evenodd"
                                        d="M392.19 156.054 211.268 281.667 22.032 218.58C8.823 214.168-.076 201.775 0 187.852c.077-13.923 9.078-26.24 22.338-30.498L506.15 1.549c11.5-3.697 24.123-.663 32.666 7.88 8.542 8.543 11.577 21.165 7.879 32.666L390.89 525.906c-4.258 13.26-16.575 22.261-30.498 22.338-13.923.076-26.316-8.823-30.728-22.032l-63.393-190.153z"
                                        clip-rule="evenodd" data-original="#000000" />
                                </svg>
                                Send Message
                            </button>
                        @else
                            <a href="{{ route('login') }}"
                                class="mt-8 flex items-center justify-center text-lg w-full rounded-md font-bold px-6 py-3 bg-[#F41E1E] hover:bg-white text-white dark:hover:text-black transition duration-300 ease-in-out">
                                Log in to send a message
                            </a>
                        @endauth
                    </form>

                    <ul class="mt-4 flex flex-wrap justify-center gap-6">
                        <li class="flex items-center text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                fill='currentColor' viewBox="0 0 479.058 479.058">
                                <path
                                    d="M434.146 59.882H44.912C20.146 59.882 0 80.028 0 104.794v269.47c0 24.766 20.146 44.912 44.912 44.912h389.234c24.766 0 44.912-20.146 44.912-44.912v-269.47c0-24.766-20.146-44.912-44.912-44.912zm0 29.941c2.034 0 3.969.422 5.738 1.159L239.529 264.631 39.173 90.982a14.902 14.902 0 0 1 5.738-1.159zm0 299.411H44.912c-8.26 0-14.971-6.71-14.971-14.971V122.615l199.778 173.141c2.822 2.441 6.316 3.655 9.81 3.655s6.988-1.213 9.81-3.655l199.778-173.141v251.649c-.001 8.26-6.711 14.97-14.971 14.97z"
                                    data-original="#000000" />
                            </svg>
                            <a class="text-sm ml-4 text-black dark:text-gray-400">
                                <strong>info@flexifit.com</strong>
                            </a>
                        </li>
                        <li class="flex items-center text-black dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                fill='currentColor' viewBox="0 0 482.6 482.6">
                                <path
                                    d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-15.5 6.4-28.5 16.7-38.7l37.4-37.4c6.7-6.7 13.4-10.2 19.9-10.2 6.6 0 13.5 3.4 20.6 10.5 3.2 3.1 6.4 6.4 9.8 9.9 3.3 3.3 6.7 6.8 10.3 10.3l29.8 29.8c6.3 6.3 9.5 13 9.5 20.2s-3.3 13.9-9.5 20.2c-3.1 3.1-6.2 6.2-9.2 9.2-9.6 9.6-19.1 19.2-29.1 28.4l-11.3 10.8 6.6 13.1c8.6 17.2 18.9 34.1 34.1 54.2 30.7 38.9 63.5 67.4 98.6 88.6 4.6 2.9 9.4 5.3 14.2 7.8 6.7 3.4 13.6 6.9 20.7 10.7l13.2 6.9 10.3-10.3 36.1-36.1c5.9-5.9 11.8-8.8 17.9-8.8s12.1 2.9 18.1 8.9l60.1 60.1c10.9 10.9 10.9 21.4-.2 32.7-4.4 4.6-9.1 9.2-13.9 13.7-6.9 6.5-13.8 13.1-19.9 20.9-9.6 11.5-21.2 16.7-37.5 16.7-1.9 0-3.8-.1-5.7-.2-33-2.3-63.3-15.5-86.1-26.4-62.2-29.4-115.6-71.8-160.1-128.1-37-45.2-61.3-86.2-77.5-130.2-10.8-29.1-14.8-51.9-13.2-72.1z"
                                    data-original="#000000" />
                            </svg>
                            <a class="text-sm ml-4 text-black dark:text-gray-400">
                                <strong>+1 (234) 567 890</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="z-1 relative h-full max-md:min-h-[350px]">
                    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        class="left-0 top-0 h-full w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg"
                        frameborder="0" allowfullscreen></iframe>
                </div>

            </div>
        </div>

    </div>

    <!-- Register Section End -->

    <!-- Latest Blog Section Begin -->

    <div class="w-full dark:bg-[#141414] py-12 px-4 pt-20">
        <div class="container mx-auto p-8 ">
            <div class="text-center">
                <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
                    Blog
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
                </h2>
                <h1 class="text-4xl font-extrabold mb-20 text-gray-900 dark:text-white">
                    Easy Step To Achieve Your Goals.
                </h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                <div
                    class="bg-white dark:bg-[#171717] text-gray-900 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 duration-500">
                    <img alt="Person lifting weights in a gym" class="w-full h-48 object-cover" height="400"
                        src="{{ $blog->getFirstMediaUrl('thumbnails') }}"
                        width="600" />
                    <div class="p-4">
                        <div class="flex items-center mb-4">
                            <img alt="Author profile image" class="w-10 h-10 rounded-full mr-4" height="40"
                                src="https://storage.googleapis.com/a1aa/image/zogkwSebVw0PPyNhep90JVDFAtwXpnlFwEtkwan3uCIuxKsTA.jpg"
                                width="40" />
                            <div>
                                <p class="text-gray-500  dark:text-gray-400 text-sm">
                                    February 17, 2019

                                </p>
                                @php
                                    $tags = explode(',', $blog->tags);
                                @endphp
                                @foreach($tags as $tag)
                                    <span class="bg-red-500 text-white text-xs font-bold ml-2 px-2 py-1 rounded-full">
                                         {{ trim($tag) }}
                                        </span>
                                @endforeach
                            </div>
                        </div>
                        <h2 class="font-bold text-lg mt-2 dark:text-white">
                            {{$blog->title}}
                        </h2>


                        <p class="text-gray-700 dark:text-gray-300 mt-2">
                            {{ Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}
                        </p>


                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <button id="scrollToTopBtn" class="text-lg font-bold fixed bottom-4 right-4 bg-red-500 text-white p-4 rounded-full shadow-lg hidden hover:bg-red-600">
    ↑
</button>

<script>
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.remove('hidden');
        } else {
            scrollToTopBtn.classList.add('hidden');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

</x-app-layout>
