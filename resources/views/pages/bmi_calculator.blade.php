<x-app-layout>
    {{-- bmi start --}}
    <div id="bmi" class="w-full dark:bg-[#171717] py-12 px-4 pt-20">
        <div class="container mx-auto p-8 text-center ">
            <h2 class="text-[#F41E1E] text-lg font-bold uppercase mb-2 flex items-center justify-center">
            <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
            </span>
                BMI Calculator
                <span class="inline-block w-12 h-0.5 bg-[#F41E1E] mx-2">
            </span>
            </h2>
            <h1 class="text-4xl font-extrabold mb-16 text-gray-900 dark:text-white">
                Calculate Your Body Mass Index (BMI)
            </h1>
            <div class="flex flex-col lg:flex-row justify-between items-start">
                <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
                    <form class="space-y-4" onsubmit="event.preventDefault(); calculateBMI();">
                        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                            <input type="text" id="height" placeholder="Height / cm"
                                   class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                            <input type="text" id="weight" placeholder="Weight / kg"
                                   class="w-full lg:w-1/2 p-3 border border-red-500 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                        </div>
                        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
                            <input type="text" id="age" placeholder="Age"
                                   class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                            <select id="gender"
                                    class="w-full lg:w-1/2 p-3 border border-gray-300 rounded dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <select id="activityFactor"
                                class="w-full p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300 rounded">
                            <option value="">Select an activity factor:</option>
                            <option value="1.2">Sedentary (little or no exercise)</option>
                            <option value="1.375">Lightly active (light exercise/sports 1-3 days/week)</option>
                            <option value="1.55">Moderately active (moderate exercise/sports 3-5 days/week)</option>
                            <option value="1.725">Very active (hard exercise/sports 6-7 days a week)</option>
                            <option value="1.9">Super active (very hard exercise/sports & physical job)</option>
                        </select>
                        <button type="submit"
                                class="w-full p-3 dark:bg-[#F41E1E] bg-black text-white text-md font-bold rounded-md hover:bg-[#F41E1E] dark:hover:bg-black uppercase">Calculate</button>
                    </form>
                    <p id="bmiResult" class="mt-4 text-xl font-bold"></p>
                </div>
                <div class="w-full lg:w-1/3">
                    <table class="w-full text-left border-collapse">
                        <thead>
                        <tr>
                            <th class="p-3 bg-[#141414] text-white text-center">BMI</th>
                            <th class="p-3 bg-[#141414] text-[#F41E1E] text-center">Weight Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Below 18.5</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Underweight</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                18.5 - 24.9</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Healthy</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                25.0 - 29.9</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Overweight</td>
                        </tr>
                        <tr>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                30.0 - and Above</td>
                            <td class="p-3 border border-gray-300 dark:border-gray-800 dark:bg-black dark:text-gray-300">
                                Obese</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateBMI() {
            // Get input values
            const heightCm = parseFloat(document.getElementById('height').value); // Height in cm
            const weightKg = parseFloat(document.getElementById('weight').value);  // Weight in kilograms
            const age = parseInt(document.getElementById('age').value);            // Age in years
            const gender = document.getElementById('gender').value;               // Gender
            const activityFactor = parseFloat(document.getElementById('activityFactor').value); // Activity factor

            // Validate inputs
            if (isNaN(heightCm) || isNaN(weightKg) || isNaN(age) || !gender || !activityFactor) {
                alert('Please fill in all fields correctly.');
                return;
            }

            // Convert height from cm to meters
            const heightMeters = heightCm / 100;

            // Calculate BMI
            const bmi = weightKg / (heightMeters * heightMeters);

            // Calculate BMR using the Mifflin-St Jeor Equation
            let bmr;
            if (gender === 'male') {
                bmr = 10 * weightKg + 6.25 * heightCm - 5 * age + 5;
            } else {
                bmr = 10 * weightKg + 6.25 * heightCm - 5 * age - 161;
            }

            // Adjust BMR for activity level
            const calorieNeeds = bmr * activityFactor;

            // Calculate daily protein intake
            let proteinFactor;
            if (activityFactor <= 1.375) {
                proteinFactor = 0.8; // Sedentary
            } else if (activityFactor <= 1.55) {
                proteinFactor = 1.2; // Lightly Active to Moderately Active
            } else {
                proteinFactor = 1.6; // Very Active to Super Active
            }
            const proteinIntake = weightKg * proteinFactor;

            // Determine BMI category
            let bmiCategory = '';
            if (bmi < 18.5) {
                bmiCategory = 'Underweight';
            } else if (bmi >= 18.5 && bmi < 24.9) {
                bmiCategory = 'Healthy';
            } else if (bmi >= 25 && bmi < 29.9) {
                bmiCategory = 'Overweight';
            } else {
                bmiCategory = 'Obese';
            }

            // Display result
            document.getElementById('bmiResult').innerText =
                `Your BMI is ${bmi.toFixed(2)} (${bmiCategory}).
            Based on your age, gender, and activity level:
            - Your daily calorie needs are approximately ${calorieNeeds.toFixed(2)} calories.
            - Your recommended daily protein intake is approximately ${proteinIntake.toFixed(2)} grams.`;
        }
    </script>




    {{-- bmi end --}}
</x-app-layout>
