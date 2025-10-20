<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\product;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\OrderPlacedNotification;
use Filament\Notifications\Notification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function user_info(){
        return view('pages.user-order-information');
    }

    // public function processOrder(Request $request){


    //     $order = new Order();
    //     $order->total = Cart::subtotal();
    //     $order->user_id = auth()->id();
    //     $order->payment_method = $request->delivery;
    //     $order->item_count = 0;
    //     $order->email = $request->email;
    //     $order->first_name = $request->first_name;
    //     $order->last_name = $request->last_name;
    //     $order->address = $request->address;
    //     $order->city = $request->city;
    //     $order->zip = $request->zip;
    //     $order->state = $request->state;
    //     $order->phone = $request->phone;
    //     $order->notes = $request->note;
    //     $order->save();


    //     foreach (Cart::content() as $item){
    //         $product = new product();
    //         $product = product::find($item->id);
    //         $product->stock_quantity = $product->stock_quantity - $item->qty;
    //         $product->save();
    //     }

    //     foreach (Cart::content() as $cartItem) {

    //         $order->products()->attach($cartItem->id, [
    //             'quantity' => $cartItem->qty, // Accessing quantity
    //             'price' => $cartItem->price,    // Accessing price
    //         ]);
    //     }

    //     $transaction = new Transaction();
    //     $transaction->amount = Cart::subtotal();
    //     $transaction->type = 'income';
    //     $transaction->description = 'Order Payment';
    //     $transaction->date = now();
    //     $transaction->category_id = 1;
    //     $transaction->save();

    //     $admin = User::where('role', 1)->first();  // Or get the admin(s) another way
    //     $admin->notify(new OrderPlacedNotification($order));

    //     $admin->notify(
    //         Notification::make()
    //             ->title('New Order Placed')
    //             ->toDatabase(),);

    //     session(['order_id' => $order->id]);
    //     Cart::destroy();

    //     if ($request->delivery == 'bank_transfer') {
    //         return redirect()->route('order_complete');
    //     }
    //     else {
    //         return redirect()->route('thank.you.cod');
    //     }
    // }


    public function processOrder(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'zip' => 'required|regex:/^\d{5}(-\d{4})?$/', // Example: US ZIP code
            'state' => 'required|string|max:255',
            'phone' => 'required|regex:/^\+?[0-9\s\-]{7,15}$/', // Valid phone format
            'note' => 'nullable|string|max:1000',
            'delivery' => 'required|in:KOKO,COD,BankTransfer,Card',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proceed with order processing
        $order = new Order();
        $order->sub_total = Cart::subtotal();
        $order->total = Cart::subtotal() + 399;
        $order->user_id = auth()->id();
        $order->payment_method = $request->delivery;
        $order->item_count = Cart::count();
        $order->email = $request->email;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->state = $request->state;
        $order->phone = $request->phone;
        $order->notes = $request->note;
        $order->save();

        // Update stock quantities
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);
            if ($product && $product->stock_quantity >= $item->qty) {
                $product->stock_quantity -= $item->qty;
                $product->save();
            } else {
                return redirect()->back()->with('error', 'Insufficient stock for product: ' . $item->name);
            }
        }

        // Attach products to the order
        foreach (Cart::content() as $cartItem) {
            $order->products()->attach($cartItem->id, [
                'quantity' => $cartItem->qty,
                'price' => $cartItem->price,
            ]);
        }

        // Record transaction
        $transaction = new Transaction();
        $transaction->amount = Cart::subtotal();
        $transaction->type = 'income';
        $transaction->description = 'Order Payment';
        $transaction->date = now();
        $transaction->category_id = 1; // Ensure category ID exists in your database
        $transaction->save();

        // Notify admin
        $admin = User::where('role', 1)->first();
        if ($admin) {
            $admin->notify(new OrderPlacedNotification($order));
        }

        // Set session and clear cart
        session(['order_id' => $order->id]);
        Cart::destroy();

        // Redirect based on payment method
        if ($request->delivery == 'BankTransfer') {
            return redirect()->route('order_complete');
        } else {
            return redirect()->route('thank.you.cod');
        }
    }


    public function order_complete(){
        return view('pages.order-complete');
    }

    public function uploadSlip(Request $request)
    {
        $orderId = session('order_id');
        $order = Order::find($orderId);

        if ($order) {
            // Clear any existing uploads for this field, if needed
            $order->clearMediaCollection('bank_slips');
            $order->addMediaFromRequest('file')->toMediaCollection('bank_slips');

            return redirect('/thank-you')->with('success', 'Slip uploaded successfully.');
        } else {
            return response()->json(['success' => false, 'message' => 'Order not found.']);
        }
    }

    public function Order_details($id){

        $order = product::find($id);

        return view('pages.product-details', compact('order'));
    }
}