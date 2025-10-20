<div>

    <h1 class="main-top">Personolize your plan</h1>

    <div class="meal-plan">
        <div class="meal-plan-in">
            <div class="x86">
                <h2> 1. Select your preference</h2>
                <div class="preference">

                    <div >
                        <button id="r335" class="preference-button" value="meat">
                            <img src="{{url('icons/meat.png')}}" alt="">
                            <h5>Meat</h5>
                        </button>
                    </div>

                    <div>
                        <button id="r335" class="preference-button" value="keto">
                            <img src="{{url('icons/keto.png')}}" alt="">
                            <h5>Keto</h5>
                        </button>
                    </div>
                    </label>

                    <div>
                        <button id="r335" class="preference-button" value="vegan">

                            <img src="{{url('icons/vegan.png')}}" alt="">
                            <h5>Vegan</h5>
                        </button>
                    </div>


                    <div>
                        <button id="r335" class="preference-button" value="fish">
                            <img src="{{url('icons/fish.png')}}" alt="">
                            <h5>Pescatarian</h5>
                        </button>
                    </div>
                    <div>
                        <button id="r335" class="preference-button" value="gluten">
                            <img src="{{url('icons/gluten-free.png')}}" alt="">
                            <h5>Gluten free</h5>
                        </button>
                    </div>

                    <div >
                        <button id="r335" class="preference-button" value="family">

                            <img src="{{url('icons/family.png')}}" alt="">
                            <h5>Family frindly</h5>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="shock">
            <h2 class="mb-3"> 2. Customize your plan size</h2>


            <div id="serving" class="mb-4">
                <h4>Servings per meal</h4>
                <label id="r65">
                    <input type="radio" value="2" wire:click="serve2" name="serving">
                    <span id="r35" >2</span>
                </label>
                <label id="r65">
                    <input type="radio" value="4" wire:click="serve4" name="serving">
                    <span id="r35">4</span>
                </label>
            </div>


            <div id="number-meal" class="mb-4">
                <h4>Number of meals pre week</h4>
                <label id="r65">
                    <input type="radio" value="2" name="meal_number" wire:click="per2">
                    <span id="t35">2</span>
                </label>
                <label id="r65">
                    <input type="radio" value="4" name="meal_number" wire:click="per4">
                    <span id="t35">4</span>
                    <label id="r65">
                        <input type="radio" value="5" name="meal_number" wire:click="per5">
                        <span id="t35">5</span>
                    </label>
                    <label id="r65">
                        <input type="radio" value="6" name="meal_number" wire:click="per6">
                        <span id="t35">6</span>
                    </label>
            </div>
            <div id="bottem-box" class="border border-gray-300 p-3">
                <div class="price">
                    <label for="">Servings per meal</label>
                    <span id="servings" name="serving">{{$serving}}</span>
                    <br>
                    <label for="">Meals per week</label>
                    <span id="meals-per-week" name="number_of_meals">{{$number_of_meals}}</span>
                    <br>
                    <span id="selected-pref"></span>

                    <hr>
                    <label>Box Price</label>
                    <span id="Box-price">{{$box_price}}</span>
                    <br>
                    <label >service charge</label>
                    <span id="service-charge">{{$service_charge}}</span>
                    <br>
                    <div class="total">
                        <label>Total price per week</label>
                        <span id="serving">{{ $TotalPrice }}</span>
                    </div>
                    <a href="user-information">
                    <button type="submit" class="btn btn-primary">Continue</button>
                    </a>

                </div>
            </div>
        </div>

        </div>

</div>

<script>
    function selectPreference(preference) {
        document.getElementById('selected-pref').innerText = preference;
        @this.set('selectedPreference', preference); // Send to Livewire

        // Make an AJAX request to store the preference in the session
        fetch('{{ route('store.preference') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ preference: preference })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Preference stored in session');
                }
            });
    }
</script>

<?php
session(['box_price' => $box_price]);
session(['totalprice' => $TotalPrice]);
session(['number_of_meals' => $number_of_meals]);
session(['number_of_serving' => $serving]);

?>
