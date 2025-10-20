<?php

namespace App\Livewire;

use Livewire\Component;


class PriceCalculator extends Component
{
        public $selectedPreference;
        public $serving = 2;

        public $number_of_meals = 2;
        public $TotalPrice;

        public $service_charge = 1500;

        public $box_price;

        public function serve2()
        {
            $this->serving =2;
            $this->calculate();
        }

        public function serve4(){
            $this->serving = 4;
            $this->calculate();
        }

        public function per2(){
          $this->number_of_meals = 2;
          $this->calculate();
        }

        public function per4(){
            $this->number_of_meals = 4;
            $this->calculate();
        }
        public function per5(){
            $this->number_of_meals = 5;
            $this->calculate();
        }
         public function per6(){
            $this->number_of_meals = 6;
            $this->calculate();
         }

        public function calculate()
        {
            if ($this->serving == 4){
                $this->box_price = ($this->number_of_meals * 1000) * 2;
            }
            else{
                $this->box_price = $this->number_of_meals * 1000;
            }
            $this->TotalPrice = $this->box_price + $this->service_charge;
        }
    public function up(){
            $this->servings = 4;
    }
    public function render()
    {

        return view('livewire.price-calculator');
    }
}




