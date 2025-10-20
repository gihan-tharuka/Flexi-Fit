<x-app-layout>

{{-- Our servces --}}
<div id="services" class="w-full dark:bg-[#141414] py-12 px-4">
    <div class="container mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
                    <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
                Our Services
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
                    </span>
            </h2>
            <h1 class="text-4xl text-center font-extrabold mb-20 text-gray-900 dark:text-white">
                Our Comprehensive Range of Services.
            </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white dark:bg-[#171717] shadow-lg rounded-lg overflow-hidden">
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
                        <a class="text-[#F41E1E] hover:text-black hover:underline flex items-center font-bold justify-center"
                           href="#">
                            Read More
                            {{-- <i class="fas fa-arrow-right ml-2">
                            </i> --}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Our servces end --}}

</x-app-layout>
