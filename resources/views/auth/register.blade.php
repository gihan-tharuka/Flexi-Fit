

<x-app-layout>
    <div class="bg-white dark:bg-[#171717]">
        <div class="py-12 text-gray-900 dark:text-white flex flex-col md:flex-row items-center md:items-start p-8 md:p-16 space-y-8 md:space-y-0 md:space-x-16 max-w-4xl mx-auto">
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-900 dark:text-white">Register</h2>
                <p class="mb-4 text-gray-700 dark:text-gray-300">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-red-600 dark:text-red-400 font-semibold hover:underline ml-2">Sign in here</a>
                </p>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <x-validation-errors class="mb-4" />

                    <!-- Section 1: Initial Registration Fields -->
                    <div id="section1">
                        <div>
                            <input name="name" type="text" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                placeholder="Name" />
                        </div>

                        <div>
                            <input name="email" type="email" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                placeholder="Email" />
                        </div>

                        <div>
                            <select id="membership_plan" name="membership_plan" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 text-gray-400">
                                <option value="">-- Select Membership --</option>
                                @foreach ($membershipPlans as $membership)
                                    <option value="{{ $membership->id }}" data-duration="{{ $membership->duration }}">
                                        {{ $membership->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="pt-4 flex justify-center">
                            <button type="button" onclick="showSection2()"
                                class="w-2/3 p-3 bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 rounded-full text-white font-bold transition duration-300">
                                Continue Registration
                            </button>
                        </div>
                    </div>

                    <!-- Section 2: Additional Registration Fields -->
                    <div id="section2" style="display: none;">

                        <div>
    <label for="start_date" class="block mb-1 font-semibold text-gray-700 dark:text-gray-300">Start Date</label>
    <input id="start_date" type="date" name="start_date" required
        class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-gray-400"
        placeholder="Start date" />
</div>
                        
                        {{-- <div>
                            <label for="start_date" class="block mb-1 font-semibold text-gray-700 dark:text-gray-300">Start Date</label>
                            <input id="start_date" type="date" name="start_date" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-gray-400"
                                placeholder="Start date" />
                        </div> --}}
        

                        
                        <div>
                            <label for="end_date" class="block mb-1 font-semibold text-gray-700 dark:text-gray-300">End Date</label>
                            <input id="end_date" type="date" name="end_date" required disabled
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-gray-400"
                                placeholder="End date" />
                        </div> 

                        {{-- <div>
                            <label for="end_date" class="block mb-1 font-semibold text-gray-700 dark:text-gray-300">End Date</label>
                            <input id="end_date" type="date" name="end_date" required readonly
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-gray-400"
                                placeholder="End date"
                                onkeydown="return false"
                                onpaste="return false"
                                />
                        </div> --}}
                                    

                        <div class="relative">
                            <input id="password" name="password" type="password" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                placeholder="Password" />
                            <i class="fas fa-eye absolute right-3 top-3 text-gray-500 dark:text-red-500 cursor-pointer hover:text-gray-700 dark:hover:text-red-400" id="togglePassword"></i>
                        </div>

                        <div class="relative">
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="mb-4 w-full py-2 px-4 bg-gray-50 dark:bg-[#141414] border border-gray-300 dark:border-gray-700 rounded focus:outline-none focus:ring-0 focus:border-red-500 dark:focus:border-red-400 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
                                placeholder="Confirm Password" />
                            <i class="fas fa-eye absolute right-3 top-3 text-gray-500 dark:text-red-500 cursor-pointer hover:text-gray-700 dark:hover:text-red-400" id="toggleConfirmPassword"></i>
                        </div>

                        <div class="flex justify-between pt-4">
                            <button type="button" onclick="showSection1()"
                                class="w-1/2 mr-2 p-2 bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-700 rounded-full text-gray-700 dark:text-white font-bold transition duration-300">
                                Back
                            </button>

                            <button type="submit"
                                class="w-1/2 ml-2 p-2 bg-red-600 hover:bg-red-700 dark:bg-red-600 dark:hover:bg-red-700 rounded-full text-white font-bold transition duration-300">
                                Sign Up
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="w-full md:w-1/2">
                <img src="/img/login.jpg" class="rounded w-full h-auto max-w-md mx-auto shadow-lg" alt="Sign up image" />
            </div>
        </div>
    </div>

    <script>
        // // Show Section 2 of the form
        // function showSection2() {
        //     document.getElementById('section1').style.display = 'none';
        //     document.getElementById('section2').style.display = 'block';
        // }

        // // Show Section 1 of the form
        function showSection1() {
            document.getElementById('section2').style.display = 'none';
            document.getElementById('section1').style.display = 'block';
        }
        // Function to set today's date as default
    function setDefaultStartDate() {
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];
        document.getElementById('start_date').value = formattedDate;
        
        // Also calculate end date if membership is already selected
        calculateEndDate();
    }

    // Show Section 2 of the form
    function showSection2() {
        document.getElementById('section1').style.display = 'none';
        document.getElementById('section2').style.display = 'block';
        setDefaultStartDate(); // Set default date when showing section 2
    }

        // Calculate membership end date based on selected plan
        document.getElementById('membership_plan').addEventListener('change', calculateEndDate);
        document.getElementById('start_date').addEventListener('change', calculateEndDate);

        function calculateEndDate() {
            const membershipSelect = document.getElementById('membership_plan');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');

            const selectedMembership = membershipSelect.options[membershipSelect.selectedIndex];
            const duration = selectedMembership.getAttribute('data-duration');

            const startDate = new Date(startDateInput.value);
            if (!isNaN(startDate) && duration) {
                const endDate = new Date(startDate);
                endDate.setDate(endDate.getDate() + parseInt(duration));
                endDateInput.value = endDate.toISOString().split('T')[0];
            } else {
                endDateInput.value = '';
            }
        }


        // Toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Toggle confirm password visibility
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#password_confirmation');

        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    


</x-app-layout>
