{{--  <x-guest-layout>--}}

{{--    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('dashboard') }}">--}}
{{--                        <x-application-mark class="block h-9 w-auto" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
{{--                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">--}}
{{--                        {{ __('Dashboard') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            @if (Route::has('login'))--}}
{{--                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">--}}
{{--                    @auth--}}
{{--                      --}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}


{{--            <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
{{--                <!-- Teams Dropdown -->--}}
{{--                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
{{--                    <div class="ms-3 relative">--}}
{{--                        <x-dropdown align="right" width="60">--}}
{{--                            <x-slot name="trigger">--}}
{{--                                <span class="inline-flex rounded-md">--}}
{{--                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">--}}
{{--                                        {{ Auth::user()->currentTeam->name }}--}}

{{--                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            </x-slot>--}}

{{--                            <x-slot name="content">--}}
{{--                                <div class="w-60">--}}
{{--                                    <!-- Team Management -->--}}
{{--                                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                        {{ __('Manage Team') }}--}}
{{--                                    </div>--}}

{{--                                    <!-- Team Settings -->--}}
{{--                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">--}}
{{--                                        {{ __('Team Settings') }}--}}
{{--                                    </x-dropdown-link>--}}

{{--                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
{{--                                        <x-dropdown-link href="{{ route('teams.create') }}">--}}
{{--                                            {{ __('Create New Team') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    @endcan--}}

{{--                                    <!-- Team Switcher -->--}}
{{--                                    @if (Auth::user()->allTeams()->count() > 1)--}}
{{--                                        <div class="border-t border-gray-200"></div>--}}

{{--                                        <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                            {{ __('Switch Teams') }}--}}
{{--                                        </div>--}}

{{--                                        @foreach (Auth::user()->allTeams() as $team)--}}
{{--                                            <x-switchable-team :team="$team" />--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </x-slot>--}}
{{--                        </x-dropdown>--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <!-- Settings Dropdown -->--}}
{{--                    <div class="ms-3 relative">--}}
{{--                    <x-dropdown align="right" width="48">--}}
{{--                        <x-slot name="trigger">--}}
{{--                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">--}}
{{--                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />--}}
{{--                                </button>--}}
{{--                            @else--}}
{{--                                <span class="inline-flex rounded-md">--}}
{{--                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">--}}
{{--                                        {{ Auth::user()->name }}--}}

{{--                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">--}}
{{--                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}
{{--                                </span>--}}
{{--                            @endif--}}
{{--                        </x-slot>--}}

{{--                        <x-slot name="content">--}}
{{--                            <!-- Account Management -->--}}
{{--                            @auth--}}
{{--                            @if(auth()->user()->email == 'Admin@admin.com')--}}

{{--                           --}}
{{--                            <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                {{ __('Manage Users') }}--}}
{{--                            </div>--}}

{{--                            <x-dropdown-link href="{{ route ('user.index')}}">--}}
{{--                                {{ __('Users') }}--}}
{{--                            </x-dropdown-link>--}}

{{--                                  <!-- product Management -->--}}
{{--                                  --}}
{{--                            <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                {{ __('Manage Meal Plans') }}--}}
{{--                            </div>--}}

{{--                            <x-dropdown-link href="{{ route ('recipe.index')}}">--}}
{{--                                {{ __('Product') }}--}}
{{--                            </x-dropdown-link>--}}
{{--                                 --}}

{{--      @endif--}}
{{--      @endauth--}}
{{--                            --}}
{{--                           --}}

{{--                            --}}
{{--                            <div class="border-t border-gray-200"></div>--}}

{{--                            <x-dropdown-link href="{{ route('profile.show') }}">--}}
{{--                                {{ __('Profile') }}--}}
{{--                            </x-dropdown-link>--}}
{{--                            <!-- Authentication -->--}}
{{--                            <form method="POST" action="{{ route('logout') }}" x-data>--}}
{{--                                @csrf--}}

{{--                                <x-dropdown-link href="{{ route('logout') }}"--}}
{{--                                         @click.prevent="$root.submit();">--}}
{{--                                    {{ __('Log Out') }}--}}
{{--                                </x-dropdown-link>--}}
{{--                            </form>--}}
{{--                        </x-slot>--}}
{{--                    </x-dropdown>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Hamburger -->--}}
{{--            <div class="-me-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--            <div class="flex items-center px-4">--}}
{{--                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--                    <div class="shrink-0 me-3">--}}
{{--                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <div>--}}
{{--                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mt-3 space-y-1">--}}
{{--                <!-- Account Management -->--}}
{{--                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">--}}
{{--                    {{ __('Profile') }}--}}
{{--                </x-responsive-nav-link>--}}

{{--                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
{{--                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">--}}
{{--                        {{ __('API Tokens') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                @endif--}}

{{--                <!-- Authentication -->--}}
{{--                <form method="POST" action="{{ route('logout') }}" x-data>--}}
{{--                    @csrf--}}

{{--                 6    <x-responsive-nav-link href="{{ route('logout') }}"--}}
{{--                                   @click.prevent="$root.submit();">--}}
{{--                        {{ __('Log Out') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                </form>--}}

{{--                <!-- Team Management -->--}}
{{--                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())--}}
{{--                    <div class="border-t border-gray-200"></div>--}}

{{--                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                        {{ __('Manage Team') }}--}}
{{--                    </div>--}}

{{--                    <!-- Team Settings -->--}}
{{--                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">--}}
{{--                        {{ __('Team Settings') }}--}}
{{--                    </x-responsive-nav-link>--}}

{{--                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())--}}
{{--                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">--}}
{{--                            {{ __('Create New Team') }}--}}
{{--                        </x-responsive-nav-link>--}}
{{--                    @endcan--}}

{{--                    <!-- Team Switcher -->--}}
{{--                    @if (Auth::user()->allTeams()->count() > 1)--}}
{{--                        <div class="border-t border-gray-200"></div>--}}

{{--                        <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                            {{ __('Switch Teams') }}--}}
{{--                        </div>--}}

{{--                        @foreach (Auth::user()->allTeams() as $team)--}}
{{--                            <x-switchable-team :team="$team" component="responsive-nav-link" />--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav> --}}

{{--</x-guest-layout>  --}}



<!-- Tailwind -->

@extends('backend.layout.app')

@section('content')





                    <h2
                        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                    >
                        Dashboard
                    </h2>
                    <!-- CTA -->
                    <a
                        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                        href="https://github.com/estevanmaito/windmill-dashboard"
                    >
                        <div class="flex items-center">
                            <svg
                                class="w-5 h-5 mr-2"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                ></path>
                            </svg>
                            <span>Star this project on GitHub</span>
                        </div>
                        <span>View more &RightArrow;</span>
                    </a>
                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                        >
                            <div
                                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                                >
                                    Total clients
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    {{$user_count}}
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                        >
                            <div
                                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                                >
                                    Account balance
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    $ 46,760.89
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                        >
                            <div
                                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                                >
                                    New sales
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    376
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div
                            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                        >
                            <div
                                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                            >
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </div>
                            <div>
                                <p
                                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                                >
                                    Pending contacts
                                </p>
                                <p
                                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    35
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Existing Chart -->
                    <div class="container mx-auto my-8">
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">Time Slot Chart</h2>
                            <canvas id="timeSlotChart" class="mx-auto" width="400" height="200"></canvas>
                        </div>
                    </div>

                    <div class="container mx-auto my-8 grid grid-cols-2 gap-4">
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">Subscription Period Chart</h2>
                            <canvas id="subscriptionPeriodChart" class="w-full"></canvas>
                        </div>
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">Meal Preference Chart</h2>
                            <canvas id="mealPreferenceChart" class="w-full"></canvas>
                        </div>
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">Number of Meals Chart</h2>
                            <canvas id="mealNumberChart" class="w-full"></canvas>
                        </div>
                        <div class="bg-white shadow-lg rounded-lg p-4">
                            <h2 class="text-xl font-bold mb-4">Number of Servings Chart</h2>
                            <canvas id="servingNumberChart" class="w-full"></canvas>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Existing Chart
                            var ctx1 = document.getElementById('timeSlotChart').getContext('2d');
                            var timeSlotChart = new Chart(ctx1, {
                                type: 'bar',
                                data: {
                                    labels: @json($labels),
                                    datasets: [{
                                        label: 'Number of Users',
                                        data: @json($data1),
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            // Subscription Period Chart
                            var periodLabels = @json($periodLabels);
                            var periodData = @json($periodData);

                            // Add "Months" to each label
                            var updatedPeriodLabels = periodLabels.map(function(label) {
                                return label + ' Months';
                            });

                            var ctx2 = document.getElementById('subscriptionPeriodChart').getContext('2d');
                            var subscriptionPeriodChart = new Chart(ctx2, {
                                type: 'pie',
                                data: {
                                    labels: updatedPeriodLabels,
                                    datasets: [{
                                        label: 'Number of Users',
                                        data: periodData,
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                }
                            });

                            // Meal Preference Chart
                            var ctx3 = document.getElementById('mealPreferenceChart').getContext('2d');
                            var mealPreferenceChart = new Chart(ctx3, {
                                type: 'doughnut',
                                data: {
                                    labels: @json($mealLabels),
                                    datasets: [{
                                        label: 'Number of Users',
                                        data: @json($mealData),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                }
                            });

                            // Number of Meals Chart
                            var ctx4 = document.getElementById('mealNumberChart').getContext('2d');
                            var mealNumberChart = new Chart(ctx4, {
                                type: 'line',
                                data: {
                                    labels: @json($mealNumberLabels),
                                    datasets: [{
                                        label: 'Number of Users',
                                        data: @json($mealNumberData),
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1,
                                        fill: true
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });

                            // Number of Servings Chart
                            var ctx5 = document.getElementById('servingNumberChart').getContext('2d');
                            var servingNumberChart = new Chart(ctx5, {
                                type: 'polarArea',
                                data: {
                                    labels: @json($servingLabels),
                                    datasets: [{
                                        label: 'Number of Users',
                                        data: @json($servingData),
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                }
                            });
                        });
                    </script>

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
