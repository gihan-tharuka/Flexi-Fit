

<div class="dark:bg-[#171717]">
    <div class="container pt-5 md:pt-20 mx-auto p-4">
        <div class="flex flex-col lg:flex-row">
            <!-- Sidebar -->
            <div class="hidden lg:block w-2/3 lg:w-1/4 mb-4 lg:mb-0">
                <div class="bg-white dark:bg-[#141414] dark:text-white p-4 shadow-md rounded-lg">
                    <h2  class="text-xl font-bold border-b-4 border-[#F41E1E] pb-2 mb-4 dark:text-white">Categories</h2>
                    <ul class="space-y-2">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#" class="flex items-center hover:text-[#F41E1E]"
                                   wire:click.prevent="filterByCategory({{ $category->id }})" style="color: inherit;"
                                   :class="{ 'text-[#F41E1E]': selectedCategoryId === {{ $category->id }} }"
                                   onclick="this.style.color = '';"
                                >
                                    <i class="fas fa-caret-right mr-2"></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- resources/views/livewire/products.blade.php -->

                <div class="bg-white dark:bg-[#141414] dark:text-white p-4 shadow-md mt-4 rounded-lg">
                    <h2 class="text-xl font-bold border-b-4 border-[#F41E1E] pb-2 mb-4 dark:text-white">Brands</h2>
                    <ul class="space-y-2">
                        @foreach ($brands as $value)
                            <li>
                                <a class="flex items-center  hover:text-[#F41E1E]" href="#"
                                   wire:click.prevent="filterByBrand({{ $value->id }})"
                                   :class="{ 'text-[#F41E1E]': selectedBrand === {{ $value->id }} }">
                                    <i class="fas fa-caret-right mr-2"></i>
                                    {{ $value->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div> <!-- Closing Sidebar div here -->

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 lg:ml-9">
                <div class="flex flex-col lg:flex-row justify-between items-center mb-4">
                    <h1 class="text-3xl font-bold mb-4 lg:mb-0 dark:text-white">Supplements</h1>
                    <div class="relative w-2/3 lg:w-auto flex">
                        <input id="searchInput" wire:model="searchTerm" class="border border-gray-400 dark:bg-[#141414] p-2 rounded-full w-full lg:w-64" placeholder="  Don't be shy to search..." type="text" />
                        <button id="searchButton" wire:click="searchProducts" class="hidden ml-2 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600">
                            Search
                        </button>
                    </div>
                </div>
                <p class="mb-4 dark:text-gray-300">
                    Shop the best Protein Supplements in Sri Lanka to suit your Fitness goal! Variety of Proteins available from Pure isolates, Blends &amp; Vegan Proteins.
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-4 ">
                    <!-- Products -->
                    @foreach ($products as $value)
                        <div class="bg-white p-2 shadow-md rounded-lg dark:bg-[#141414] dark:text-white">
                            <div class="relative">
                                <a href="{{ url('product-details/' . $value->id) }}">
                                     <img alt="{{ $value->name }}" class="rounded-lg h-72 object-cover" src="{{ $value->getFirstMediaUrl('product_image') }}" />
{{--                                    <img alt="{{ $value->name }}" class="rounded-lg h-50 md:h-72 object-cover" src="{{asset('img/prod.jpg')}}" />--}}

                                </a>
                                {{-- @dd($value->getFirstMediaUrl('product_image')) --}}

                                @if ($value->on_sale)
                                    <span class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Sale!</span>
                                @endif

                                @if($value->stock_quantity > 0)
                                    <span class="absolute top-2 left-2 bg-green-500 text-white px-2 py-1 text-xs rounded-lg">In Stock</span>
                                @else
                                    <span class="absolute top-2 left-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Out of Stock</span>
                                @endif
                            </div>
                            <p class="text-gray-500 text-xs mt-2 truncate lg:whitespace-normal">{{ $value->tags }}</p>  
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
            </div>
        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div class="fixed inset-0 bg-black  bg-opacity-50 z-50 hidden" id="mobileSidebar">
        <div class="fixed inset-y-0 left-0 bg-white dark:bg-[#141414] w-3/4 p-4 overflow-y-auto">
            <button class="text-gray-700 dark:text-gray-300 mb-4 text-lg ml-2" onclick="toggleSidebar()">
                <i class="fas fa-times"></i>
            </button>
            <div class="bg-white dark:bg-[#141414] dark:text-white p-4 shadow-md rounded-lg">
                <h2 class="text-xl font-bold border-b-2 border-[#F41E1E] pb-2 mb-4 dark:text-white">Categories</h2>
                <ul class="space-y-2">
                    @foreach ($categories as $category)
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-blue-500"
                               wire:click.prevent="filterByCategory({{ $category->id }})" style="color: inherit;"
                               :class="{ 'text-blue-500': selectedCategoryId === {{ $category->id }} }"
                               onclick="this.style.color = '';"
                            >
                                <i class="fas fa-caret-right mr-2"></i>
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white  dark:bg-[#141414] dark:text-white p-4 shadow-md mt-4 rounded-lg">
                <h2 class="text-xl font-bold border-b-2 border-[#F41E1E] pb-2 mb-4 dark:text-white">Brands</h2>
                <ul class="space-y-2">
                    @foreach ($brands as $value)
                        <li>
                            <a class="flex items-center " href="#">
                                <i class="fas fa-caret-right mr-2"></i>
                                {{ $value->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <button class="fixed bottom-4 right-4 bg-[#F41E1E] text-white p-4 rounded-full lg:hidden" onclick="toggleSidebar()">
   <i class="fas fa-bars">
   </i>
  </button>
</div>



<script>
    document.getElementById('searchInput').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('searchButton').click();
        }
    });

    function toggleSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        }
</script>
