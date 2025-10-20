<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\product;
use App\Http\Requests\StoreproductsRequest;
use App\Http\Requests\UpdateproductsRequest;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\spatie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\select;
use App\Models\meal_kit;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;



class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        SEOMeta::setTitle('Our Gym Products | FlexHouse');
        SEOMeta::setDescription('Browse our range of products designed to enhance your fitness journey. From supplements to workout equipment, find what you need.');
        SEOMeta::setCanonical(route('products.index'));

        OpenGraph::setTitle('Our Gym Products');
        OpenGraph::setDescription('Explore our fitness products, curated for your health and wellness journey.');
        OpenGraph::setUrl(route('products.index'));

        return view('pages.Products');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.products.form',[
            'products' => (new product()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductsRequest $request)
    {
            $save = new product();
            $save->name = request('name');
            $save->price = request('price');
            $save->slug = request('name');
            $save->description = request('description');
            $save->category = request('category');


//        if(!empty($request->file('image_file'))) {
//            $ext = $request->file('image_file')->getClientOriginalExtension();
//            $file = $request->file('image_file');
//            $filename = request('name') . '.' . $ext;
//            $file->move('upload/productimg/', $filename);
//            $save->image_file = $filename;
//        }

        if ($request->hasFile('image_file')) {
            $save->addMediaFromRequest('image_file')->toMediaCollection('images');
        }


$save->save();

        return redirect()->route('products.index')->with('success', 'Product successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
         return view('admin.products.form',[
             'products' => $product,
         ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductsRequest $request, product $product)
    {

        logger($request->all()); // Log the request data

        $validated = $request->validated();

        logger($validated); // Log the validated data

        $product->update($validated);

        if ($request->hasFile('image_file')) {
            $product->clearMediaCollection('images');
            $product->addMediaFromRequest('image_file')->toMediaCollection('images');
        }

        return redirect()->route('products.index')->with('success', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product successfully deleted!');
    }

    public function show_product(){
        $products = Product::all();
        foreach ($products as $product) {
            Log::info('Product Image URL: ' . $product->getFirstMediaUrl('images'));
        }
        return view('pages.menu', [
            'products' => $products,
        ]);
    }

    public function addtocart($id){
        $product = product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                "id" => $product->id,
                "product_name" => $product->name,
                "image" => $product->getFirstMediaUrl('images'),
                "price"=> $product->price,
                "quantity"=> 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(){
        return view('pages.cart');
    }
public function show_dish($preference){
        $data['dish'] = product::getsingle($preference);
        return view('pages.menu-select', $data);
}

    public function add($id){
        $product = product::findOrFail($id);
        $Mealcart = session()->get('Mealcart', []);

         $Mealcart[$id] = [
                "quantity"=> 1,
                "id" => $product->id,
            ];

        session()->put('Mealcart', $Mealcart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function order_complete(){


        if(session('paymenttype') == 'Subscription'){
            $productIds = session()->get('Mealcart');
            $meal_kit = new meal_kit();
            $meal_kit->subscription_id = session('id');
            $meal_kit->save();


            foreach ($productIds as  $item) {
                $productId = $item['id'];
                $quantity = $item['quantity'];
                $meal_kit->products()->attach($productId, ['quantity' => $quantity]);

            }

            session()->forget('Mealcart');
        }
        else {
            $products = session()->get('cart');
            $orderid = session('order_id');
            $save = Order::find($orderid);
            $save->payment_status = '1';
            $save->save();

            foreach ($products as  $item) {
                $productId = $item['id'];
                $quantity = $item['quantity'];
                $save->products()->attach($productId, ['quantity' => $quantity]);

            }



            session()->forget('cart');
            return view('pages.order-complete');
        }
    }



}
