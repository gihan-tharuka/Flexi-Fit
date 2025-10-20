<x-app-layout>
    <div class="dark:bg-[#171717]">
        <div class="max-w-2xl mx-auto p-8 text-center">
            <div class="bg-gray-100 dark:bg-[#141414] p-8 rounded-lg shadow-lg">
                <div class="flex justify-center mb-6">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-500 rounded-full">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-3xl font-bold text-green-600 mb-4">Thank You for Your Order!</h1>
                <p class="text-lg text-gray-800 mb-6 dark:text-white">We've received your bank transfer slip. Your order will be processed after we confirm the payment.</p>

                <p class="text-gray-600 mb-6 dark:text-gray-200">If you have any questions, please feel free to contact us at
                    <a href="mailto:support@example.com" class="text-[#cf4b4b] underline">support@example.com</a>.
                </p>

                <a href="/" class="inline-block mt-6 bg-[#F41E1E] hover:bg-black text-white py-1 px-2 rounded-md text-lg font-medium transition-all duration-500">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
