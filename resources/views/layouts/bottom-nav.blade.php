<div id="bottom-nav" class="flex items-center justify-center pt-20 pb-6" style="display: none;">
    <div
        class="fixed bottom-0 left-0 right-0 bg-white dark:bg-[#141414] p-2 flex justify-around border-t border-gray-400 dark:border-gray-700">
        @auth
            @if (auth()->user()->role->value === 1)
                <a href="/admin"
                    class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
                    {{ Request::is('admin') ? 'bg-[#F41E1E]' : '' }}"
                    style="transition: background-color 0.2s;">
                    <i class="fas fa-th-large text-black dark:text-white text-xl"></i>
                    <!-- Dashboard Icon (Four Squares Block) -->
                </a>
            @else
                <a href="/user"
                    class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
                    {{ Request::is('user') ? 'bg-[#F41E1E]' : '' }}"
                    style="transition: background-color 0.2s;">
                    <i class="fas fa-th-large text-black dark:text-white text-xl"></i>
                    <!-- Dashboard Icon (Four Squares Block) -->
                </a>
            @endif
        @else
            <a href="/register"
                class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
                {{ Request::is('register') ? 'bg-[#F41E1E]' : '' }}"
                style="transition: background-color 0.2s;">
                <i class="fas fa-th-large text-black dark:text-white text-xl"></i>
            </a>
        @endauth
        <a href="{{ url('/cart') }}"
            class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
            {{ Request::is('cart') ? 'bg-[#F41E1E]' : '' }}"
            style="transition: background-color 0.2s;">
            <i class="fas fa-shopping-cart text-black dark:text-white text-xl"></i> <!-- Shop Icon -->
        </a>
        <a href="{{ url('/products') }}"
            class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
            {{ Request::is('products') ? 'bg-[#F41E1E]' : '' }}"
            style="transition: background-color 0.2s;">
            <i class="fas fa-store text-black dark:text-white text-xl"></i> <!-- Store Icon -->
        </a>
        <a href="/user/profile"
            class="nav-item flex items-center justify-center w-12 h-12 rounded-full cursor-pointer 
            {{ Request::is('user/profile') ? 'bg-[#F41E1E]' : '' }}"
            style="transition: background-color 0.2s;">
            <i class="fas fa-user text-black dark:text-white text-xl"></i> <!-- Profile Icon -->
        </a>
    </div>
</div>
