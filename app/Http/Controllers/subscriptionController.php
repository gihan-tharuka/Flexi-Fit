<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class subscriptionController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

        $mealplan = new Subscription();
        $mealplan->delivery_address = request('address');
        $mealplan->city = request('city');
        $mealplan->zip = request('zip');
        $mealplan->delivery_time = request('time');
        $mealplan->subscription_period = request('delivery-method');
        $mealplan->price = session('totalprice');
        $mealplan->Number_of_meals = session('number_of_meals');
        $mealplan->Number_of_servings = session('number_of_serving');
        $mealplan->preference = session('preference');
        $mealplan->user_id = auth()->user()->id;
        $mealplan->save();


        session(['period' => request('delivery-method')]);
        session(['id' => $mealplan->id]);
        session(['address' => request('address')]);
        session(['phone' => request('phone')]);

        return redirect()->route('/summery');
    }



    public function store(Request $request)
    {

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function All_subscriptions(){
        $data['subscriptions'] = Subscription::paginate(5);
        return view('admin.subscription.index', $data);
    }

    public function storePreference(Request $request)
    {
        $preference = $request->input('preference');
        session(['preference' => $preference]);

        return response()->json(['success' => true]);
    }
}
