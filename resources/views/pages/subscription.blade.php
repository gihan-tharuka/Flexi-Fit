<x-app-layout>


   @livewire('price-calculator')


      <script>

          // Get all serving buttons and meal number buttons
const servingButtons = document.querySelectorAll('#serving input[type="radio"]');
const mealNumberButtons = document.querySelectorAll('#number-meal input[type="radio"]');
const selectedServingSpan = document.getElementById('servings');
const selectedMealNumberSpan = document.getElementById('meals-per-week');


function updateSelectedValues() {
  selectedServing = Array.from(servingButtons).find(btn => btn.checked);
  selectedMealNumber = Array.from(mealNumberButtons).find(btn => btn.checked);

}

// Add click event listeners to serving buttons
servingButtons.forEach(button => {
  button.addEventListener('click', updateSelectedValues);
});

// Add click event listeners to meal number buttons
mealNumberButtons.forEach(button => {
  button.addEventListener('click', updateSelectedValues);
});


        const buttons = document.querySelectorAll('.preference-button');
        const selectedPreferences = document.getElementById('selected-pref');





          buttons.forEach(button => {
              button.addEventListener('click', () => {
                  // Remove the active class from all buttons
                  buttons.forEach(btn => btn.classList.remove('active'));

                  // Add the active class to the clicked button
                  button.classList.add('active');

                  // Get the value of the selected button
                  const selectedValue = button.value;

                  // Update the displayed selected preference
                  selectedPreferences.textContent = 'Selected Preference: ' + selectedValue;

                  // Store the selected preference in local storage
                  localStorage.setItem('preference', selectedValue);
              });
          });

        const boxprice = document.getElementById('box-price');


        var price = 0;



// Assuming 'boxprice' is an element with the id 'boxprice'
// document.getElementById('box-price').textContent = price.toFixed(2);
// localStorage.setItem('date', document.getElementById("first_delivery_date").value);


      </script>



</x-app-layout>
