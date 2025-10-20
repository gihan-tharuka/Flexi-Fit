<header id="view-navbar" style="display: none;">
{{-- <header> --}}
    <nav class="bg-[#141414] border-gray-200 top-0 left-0 w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 md:h-20">
            <a class="flex items-center space-x-3 rtl:space-x-reverse" href="/">
                <img alt="Flowbite Logo" class="h-8" src="{{asset('flexilogo.png')}}" />
                {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap text-white hidden md:inline">FlexiFit</span> --}}
            </a>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="mr-5 md:mr-10">
                    @livewire('cart-counter')
                </div>
                <button aria-expanded="false"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    data-dropdown-placement="bottom" data-dropdown-toggle="user-dropdown" id="user-menu-button"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    @auth
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover"
                      src="{{ Auth::user()->profile_photo_url }}"
                         alt="{{ Auth::user()->name }}" />

                    @else
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    @endif
                @else
                        <img class="h-8 w-8 rounded-full bg-[#141414] object-cover"
                             src="{{asset('img/avt2.png')}}">
                @endauth
                </button>

                <button aria-controls="navbar-user" aria-expanded="false"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden  dark:text-gray-100  "
                    data-collapse-toggle="navbar-user" type="button" id="hamburger-button">
                    <span class="sr-only">Open main menu</span>
                    <svg id="hamburger-icon" aria-hidden="true" class="w-5 h-5" fill="none" viewBox="0 0 17 14"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1h15M1 7h15M1 13h15" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    <svg id="close-icon" aria-hidden="true" class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                </button>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const hamburgerButton = document.getElementById('hamburger-button');
                        const hamburgerIcon = document.getElementById('hamburger-icon');
                        const closeIcon = document.getElementById('close-icon');

                        hamburgerButton.addEventListener('click', function () {
                            hamburgerIcon.classList.toggle('hidden');
                            closeIcon.classList.toggle('hidden');
                        });
                    });
                </script>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-12 md:p-0 mt-4 dark:bg-[#171717] rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-[#141414] dark:bg-bg-[#141414] md:dark:bg-[#141414] dark:border-gray-700">
                    <li>
                        <a aria-current="page"
                            class="block py-2 text-lg px-3 text-white rounded md:bg-transparent md:p-0 
                            {{ Request::is('/') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-lg rounded hover:bg-gray-700 md:hover:bg-transparent md:p-0 
                            {{ Request::is('products') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="{{ url('/products') }}">
                            Products
                        </a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-lg rounded hover:bg-gray-700 md:hover:bg-transparent md:p-0 
                            {{ Request::is('our_services') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="/our_services">
                            Services
                        </a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-lg rounded hover:bg-gray-700 md:hover:bg-transparent md:p-0 
                            {{ Route::is('pricing') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="{{ route('pricing') }}">
                            Pricing
                        </a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-lg rounded hover:bg-gray-700 md:hover:bg-transparent md:p-0 
                            {{ Route::is('bmi') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="{{ route('bmi') }}">
                            BMI
                        </a>
                    </li>
                    <li>
                        <a class="block py-2 px-3 text-lg rounded hover:bg-gray-700 md:hover:bg-transparent md:p-0 
                            {{ Route::is('contact') ? 'text-[#F41E1E]' : 'text-white' }}"
                            href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- <div class="bg-[#141414] flex items-center md:order-2 space-x-3 rtl:space-x">
        <div class="mr-5">
            @livewire('cart-counter')
        </div>
        <div> --}}
    @auth
        <div class="relative">
            <div class="z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-100 dark:divide-gray-600 hidden absolute right-4 mt-16"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-[#141414] ">{{ auth()->user()->name }}</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                </div>
                <ul aria-labelledby="user-menu-button" class="py-2">
                    @if (auth()->user()->role->value === 1)
                        <li>
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                                href="/admin">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                                href="/user">Dashboard</a>
                        </li>
                    @endif

                    <li>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                            href="/user/profile">Profile</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li>
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600  dark:hover:text-white"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">Sign
                                out</a>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    @else
        <div class="relative">
            <div class="z-50 w-38 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow  dark:divide-gray-600 hidden absolute right-6 mt-16"
                id="user-dropdown">
                <ul aria-labelledby="user-menu-button" class="py-2 text-center">
                    <li>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition duration-200 ease-in-out"
                            href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition duration-200 ease-in-out"
                            href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    @endauth

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');
            const mobileMenuButton = document.querySelector('[data-collapse-toggle="navbar-user"]');
            const mobileMenu = document.getElementById('navbar-user');

            userMenuButton.addEventListener('click', function() {
                userDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                    userDropdown.classList.add('hidden');
                }
            });

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        });

        //nav bar
        if (!window.matchMedia('(display-mode: standalone)').matches) {
            // Show the footer
            document.getElementById('view-navbar').style.display = 'flex'; // or 'block' based on your layout
        }
    </script>
</header>
{{-- <script>
    // Check if not in standalone mode
    if (!window.matchMedia('(display-mode: standalone)').matches) {
        // Show the footer
        document.getElementById('view-navbar').style.display = 'flex'; // or 'block' based on your layout
    }
</script> --}}
