<div class="flex items-center">
    <!-- Decrement Button -->
    <button wire:click="decreaseQuantity"
            class="px-3">
        -
    </button>

    <!-- Quantity Input -->
    <input type="text" wire:model.lazy="quantity" wire:change="updateCartQuantity"
           class="w-12 h-7 text-center border-t border-b border-gray-300" type="text" value="1"
           readonly />

    <!-- Increment Button -->
    <button wire:click="increaseQuantity"
            class="px-3">
        +
    </button>

    <!-- Loading Indicator -->
    <div wire:loading wire:target="quantity" class="ml-2">
        <i class="fas fa-spinner fa-spin text-lg"></i> Updating...
    </div>
</div>
