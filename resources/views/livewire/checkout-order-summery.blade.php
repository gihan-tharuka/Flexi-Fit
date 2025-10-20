<div class="bg-[#141414] p-6 rounded-lg shadow-md h-96 overflow-y-auto">
    <h2 class="text-xl font-semibold mb-4 text-white">
        Order Summary
    </h2>
    @foreach($cartItems as $item)
        <div class="flex items-center mb-4 p-4 last:border-b-0">
             <img alt="{{ $item['name'] }}" class="w-16 h-16 rounded-md" height="60" src="{{ $item['image'] }}" width="60"/>
{{--            <img alt="{{ $item['name'] }}" class="w-16 h-16 rounded-md" height="60" src="{{ asset('img/prod.jpg') }}" width="60"/>--}}
            <div class="ml-4 flex justify-between w-full">

                <div>
<p class=" font-medium text-gray-200 truncate">
                    {{ $item['name'] }}
                </p>
                <p class=" text-gray-200">
                    Quantity: {{ $item['qty'] }}
                </p>
                </div>

                <p class=" font-medium text-white">
                    Rs.{{ $item['total'] }}.00
                </p>
            </div>
        </div>
    @endforeach
</div>
