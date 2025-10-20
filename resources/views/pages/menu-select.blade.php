<x-app-layout>

    <style>
        /* Styles for the "Add" button */
        .add-button {
            background-color: #50C878; /* Green background color */
            color: white; /* White text color */
            font-weight: bold; /* Bold text */
            padding: 8px 30px; /* Padding */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Cursor style */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
        }

        /* Hover effect */
        .add-button:hover {
            background-color: #45a049; /* Darker shade of green on hover */
        }

        /* Styles for the floating container */
        .floating-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 300px;
            text-align: center;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .floating-container h2 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .floating-container p {
            font-size: 1rem;
            margin: 0;
        }

        .floating-container span {
            display: block;
            font-size: 2rem;
            font-weight: bold;
            color: #00FF00;
            margin-top: 10px;
        }

        #continue-button {
            background-color: #4299e1; /* Tailwind bg-blue-500 */
            color: white; /* Text color */
            font-weight: bold; /* Bold text */
            padding: 8px 16px; /* Padding */
            border-radius: 0.375rem; /* Rounded corners */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* Shadow */
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out; /* Smooth transition */
            cursor: pointer; /* Pointer cursor */
            display: inline-block; /* Inline block display */
            margin-top: 1.25rem; /* Margin-top from Tailwind mt-5 */
        }

        #continue-button:hover {
            background-color: #2b6cb0; /* Darker shade of blue for hover, Tailwind hover:bg-blue-700 */
            transform: scale(1.05); /* Slight scale up on hover */
        }

        #continue-button:disabled {
            background-color: #cbd5e0; /* Light gray background when disabled, Tailwind bg-gray-400 equivalent */
            cursor: not-allowed; /* Not-allowed cursor when disabled */
        }

        /* Keyframe for the slide-in animation */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Apply the slide-in animation */
        .floating-container {
            animation: slideIn 0.5s ease-out;
        }
    </style>

    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <div class="border-b mb-5 flex justify-between text-sm">
            <div class="text-indigo-600 flex items-center pb-2 pr-2 border-b-2 border-indigo-600 uppercase">
                <svg class="h-6 mr-3" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.005 455.005"
                     style="enable-background:new 0 0 455.005 455.005;" xml:space="preserve">
                </svg>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-20">
            @foreach($dish as $value)
                <div class="rounded overflow-hidden shadow-lg flex flex-col m-3">
                    <a href="#"></a>
                    <div class="relative">
                        <a href="#">
                            <img class="w-full" style="height: 270px" src="img/Berry Bliss.jpg" alt="Sunset in the mountains">
                            <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        </a>
                        <a href="#!">
                            <div class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Lunch
                            </div>
                        </a>
                    </div>
                    <div class="px-6 py-4 mb-auto">
                        <a href="#" class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">{{$value->name}}</a>
                        <p class="text-gray-500 text-sm">
                            {{$value->description}}
                        </p>
                    </div>
                    <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                        <span class="text-primary text-2xl">{{$value->price}}</span>
                        <a href="{{route('add', $value->id)}}" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                            <button class="add-button" id="button-{{ $value->id }}" data-id="{{ $value->id }}">Add</button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('checkout') }}">
            <button id="continue-button" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105" disabled>
                Continue
            </button>
        </a>

    </div>

    <div class="floating-container" id="floating-container">
        <h2>Selection Needed</h2>
        <p>You need to select</p>
        <span id="remaining-items">0/{{ session('number_of_meals', 0) }}</span>
    </div>

    <!-- Include jQuery if you haven't already -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            var maxMeals = {{ session('number_of_meals', 0) }};
            var selectedItems = 0;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function updateRemainingItems() {
                var remaining = maxMeals - selectedItems;
                $('#remaining-items').text(selectedItems + '/' + maxMeals);
                if (remaining <= 0) {
                    $('.add-button').prop('disabled', true).css('background-color', 'gray');
                    $('#continue-button').prop('disabled', false);
                }
            }

            $('.add-button').click(function(e){
                e.preventDefault();
                var button = $(this);
                var productId = button.data('id');

                $.ajax({
                    url: '/add/' + productId,
                    method: 'POST',
                    success: function(response){
                        button.text('Added');
                        button.css('background-color', 'gray');
                        button.prop('disabled', true);
                        selectedItems++;
                        updateRemainingItems();
                    },
                    error: function(error){
                        $('#cart-message').text('Failed to add product to cart.');
                    }
                });
            });

            updateRemainingItems();
        });
    </script>

</x-app-layout>
