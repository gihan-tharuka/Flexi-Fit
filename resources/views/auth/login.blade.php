<x-app-layout>
    <div class="bg-white dark:bg-[#171717]">
        <div class="py-12 text-gray-900 dark:text-white flex flex-col md:flex-row items-center md:items-start p-8 md:p-16 space-y-8 md:space-y-0 md:space-x-16 max-w-4xl mx-auto">
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Log In</h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-red-600 dark:text-red-400 font-semibold hover:underline ml-2">Register here</a>
                </p>
                
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <div>
                        <input name="email" type="email" required
                            class="w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                            placeholder="Email" />
                    </div>
                    
                    <div class="relative">
                        <input id="password" name="password" type="password" required
                            class="w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                            placeholder="Password" />
                        <i class="fas fa-eye absolute right-3 top-3 text-gray-500 dark:text-gray-400 cursor-pointer hover:text-gray-700 dark:hover:text-gray-300" id="togglePassword"></i>
                    </div>
                    
                    <div>
                        <a href="{{ route('password.request') }}" class="text-gray-700 dark:text-white font-bold hover:text-red-600 dark:hover:text-red-400">
                            Forgot Password?
                        </a>
                    </div>
                    
                    <x-validation-errors class="mb-4" />
                    
                    <div class="flex justify-center">
                        <button type="submit"
                            class="w-1/2 p-2 bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 rounded-full text-white font-bold transition-colors duration-200">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="w-full md:w-1/2">
                <img src="/img/login.jpg" class="rounded w-full h-auto max-w-md mx-auto shadow-lg" alt="Login image" />
            </div>
        </div>
    </div>


    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</x-app-layout>