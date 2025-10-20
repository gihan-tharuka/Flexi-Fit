<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\Promotion_banner;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class Products extends Component
{
    public $products;
    public array $quantity = [];
    public $selectedCategory = null;
    public $selectedBrand = null;
    public $searchTerm = '';
    public array $cartAdded = [];


    public function mount()
    {
        $this->loadProducts();
    }

    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();


        return view('livewire.products', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $this->products,

        ]);
    }


    public function loadProducts()
    {
        $query = Product::query();

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->selectedBrand) {
            $query->where('brand_id', $this->selectedBrand);
        }

        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%');
        }

        $this->products = $query->get();
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->loadProducts();
    }

    public function filterByBrand($brandId)
    {
        $this->selectedBrand = $brandId;
        $this->loadProducts();
    }

    public function searchProducts()
    {
        $this->loadProducts();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'searchTerm') {
            $this->loadProducts();
        }
    }

    public function addToCart($product_id){
        $product = product::findorfail($product_id);

        // Get the total quantity of this product already in the cart
        $cartItem = Cart::content()->where('id', $product_id)->first();
        $cartQuantity = $cartItem ? $cartItem->qty : 0;

        // Check if adding this quantity exceeds available stock
        if (!$product || ($product->stock_quantity - $cartQuantity) < 1) {
            notify()->error('Not enough stock available.');
            return;
        }

        Cart::add(
            $product->id,
            $product->name, 1,
            $product->discount_price,
            ['stock' => $product->stock_quantity, 'image'  => $product->getFirstMediaUrl('product_image')]

        );

        $this->dispatch('cart_counter_updated');
        $this->cartAdded[$product_id] = true;


    }

    public function quickbuy($product_id){


        Cart::destroy();

        $product = product::findorfail($product_id);

        // Get the total quantity of this product already in the cart
        $cartItem = Cart::content()->where('id', $product_id)->first();
        $cartQuantity = $cartItem ? $cartItem->qty : 0;

        // Check if adding this quantity exceeds available stock
        if (!$product || ($product->stock_quantity - $cartQuantity) < 1) {
            session()->flash('error', 'Not enough stock available.');
            return;
        }

        Cart::add(
            $product->id,
            $product->name, 1,
            $product->discount_price,
            ['stock' => $product->stock_quantity, 'image'  => $product->getFirstMediaUrl('product_image')]

        );

        $this->redirect(url('/cart'));
    }
}
