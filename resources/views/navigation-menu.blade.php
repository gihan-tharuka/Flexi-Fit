{{--<header>--}}

{{--    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">--}}
{{--        <div x-data="{ open: false }"--}}
{{--            class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">--}}
{{--            <div class="p-4 flex flex-row items-center justify-between">--}}
{{--                --}}{{-- <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">MediCare Assist</a> --}}
{{--                <a href="/" class="flex items-center focus:outline-none focus:shadow-outline">--}}
{{--                    <img src="/img/logoM.png" alt="Logo" style="width: 120px; height: auto; padding-top:10px;">--}}
{{--                    <!-- Adjust width, height, and margin as needed -->--}}
{{--                    --}}{{-- <span class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white">MediCare Assist</span> --}}
{{--                </a>--}}
{{--                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">--}}
{{--                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-50 h-6">--}}
{{--                        <path x-show="!open" fill-rule="evenodd"--}}
{{--                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"--}}
{{--                            clip-rule="evenodd"></path>--}}
{{--                        <path x-show="open" fill-rule="evenodd"--}}
{{--                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"--}}
{{--                            clip-rule="evenodd"></path>--}}
{{--                    </svg>--}}

{{--                </button>--}}
{{--            </div>--}}
{{--            <nav :class="{ 'flex': open, 'hidden': !open }"--}}
{{--                class="flex-col flex-grow pb-8 md:pb-0 hidden md:flex md:justify-end md:flex-row">--}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/') }}">Home</a>--}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/products') }}">Products</a>--}}
{{--                --}}{{-- booking --}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/contact') }}">Gallery</a>--}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/contact') }}">Blog</a>--}}

{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/about') }}">About</a>--}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/services') }}">Services</a>--}}
{{--                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"--}}
{{--                    href="{{ url('/pricing') }}">Packages</a>--}}
{{--                <!-- Login and Registration -->--}}


{{--                @if (Route::has('login'))--}}

{{--                    @auth--}}
{{--                        <div class="ml-3 relative">--}}
{{--                            <x-dropdown align="right" width="48">--}}
{{--                                <x-slot name="trigger">--}}
{{--                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())--}}
{{--                                        <button--}}
{{--                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">--}}
{{--                                            <img class="h-8 w-8 rounded-full object-cover"--}}
{{--                                                src="{{ Auth::user()->profile_photo_url }}"--}}
{{--                                                alt="{{ Auth::user()->name }}" />--}}
{{--                                        </button>--}}
{{--                                    @else--}}
{{--                                        <span class="inline-flex rounded-md">--}}
{{--                                            <button type="button"--}}
{{--                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
{{--                                                {{ Auth::user()->name }}--}}

{{--                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                    viewBox="0 0 20 20" fill="currentColor">--}}
{{--                                                    <path fill-rule="evenodd"--}}
{{--                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
{{--                                                        clip-rule="evenodd" />--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                        </span>--}}
{{--                                    @endif--}}
{{--                                </x-slot>--}}

{{--                                <x-slot name="content">--}}
{{--                                    <!-- Account Management -->--}}
{{--                                    <div class="block px-4 py-2 text-xs text-gray-400">--}}
{{--                                        {{ __('Manage Account') }}--}}
{{--                                    </div>--}}

{{--                                    <x-dropdown-link href="{{ route('profile.show') }}">--}}
{{--                                        {{ __('Profile') }}--}}
{{--                                    </x-dropdown-link>--}}

{{--                                    @if (auth()->user()->role->value === 1)--}}
{{--                                        <x-dropdown-link href="/admin">--}}
{{--                                            {{ __('Dashboard') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    @else--}}
{{--                                        <x-dropdown-link href="/user">--}}
{{--                                            {{ __('Dashboard') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    @endif--}}
{{--                                    <div class="border-t border-gray-200"></div>--}}

{{--                                    <!-- Authentication -->--}}
{{--                                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                                        @csrf--}}

{{--                                        <x-dropdown-link href="{{ route('logout') }}"--}}
{{--                                            onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                            {{ __('Logout') }}--}}
{{--                                        </x-dropdown-link>--}}
{{--                                    </form>--}}
{{--                                </x-slot>--}}
{{--                            </x-dropdown>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}"--}}
{{--                            class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Log--}}
{{--                            in</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}"--}}
{{--                                class="px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}

{{--                @endif--}}

{{--                @livewire('cart-counter')--}}

{{--            </nav>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--</header>--}}
