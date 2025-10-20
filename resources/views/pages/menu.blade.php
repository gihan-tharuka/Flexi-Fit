<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">


                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-20">

                                    <!-- CARD 1 -->
                                    @foreach($products as $value)
                                    <div class="rounded overflow-hidden shadow-lg flex flex-col">
                                        <a href="#"></a>
                                        <div class="relative"><a href="#">
                                                <img class="w-full"
                                                     style="height: 270px"
                                                     src="{{ $value->getFirstMediaUrl('images') }}"
                                                     alt="{{ $value->name }}">
                                                <div
                                                    class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                                </div>
                                            </a>
                                            <a href="#!">
                                                <div
                                                    class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                                    Lunch
                                                </div>
                                            </a>
                                        </div>
                                        <div class="px-6 py-4 mb-auto">
                                            <a href="#"
                                               class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">
                                                {{$value->name}}</a>
                                            <p class="text-gray-500 text-sm">
                                                {{$value->description}}
                                            </p>
                                        </div>
                                        <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">

                                            <span class="text-primary text-2xl">{{$value->price}}</span>

                                            <a href="{{route('add_to_cart', $value->id)}}" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                                             <button class="px-6 py-2 text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 rounded-lg shadow-lg transition ease-in-out duration-150">Buy Now</button>
                                            </a>
                                        </div>
                                    </div>

                                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- Menu End -->




</x-app-layout>
