<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\Subscription;


class analyticController extends Controller
{
    public function analytics(){
        // Existing time slot data
        $timeSlots = Subscription::select('delivery_time', DB::raw('count(*) as count'))
            ->groupBy('delivery_time')
            ->get();

        $labels = $timeSlots->pluck('delivery_time');
        $data1 = $timeSlots->pluck('count');

        // New subscription period data
        $subscriptionPeriods = Subscription::select('subscription_period', DB::raw('count(*) as count'))
            ->groupBy('subscription_period')
            ->get();

        $periodLabels = $subscriptionPeriods->pluck('subscription_period');
        $periodData = $subscriptionPeriods->pluck('count');

        // New meal preference data
        $mealPreferences = Subscription::select('preference', DB::raw('count(*) as count'))
            ->groupBy('preference')
            ->get();

        $mealLabels = $mealPreferences->pluck('preference');
        $mealData = $mealPreferences->pluck('count');

        // Number of meals data
        $mealNumbers = Subscription::select('number_of_meals', DB::raw('count(*) as count'))
            ->groupBy('number_of_meals')
            ->get();

        $mealNumberLabels = $mealNumbers->pluck('number_of_meals');
        $mealNumberData = $mealNumbers->pluck('count');

        // Number of servings data
        $servingNumbers = Subscription::select('number_of_servings', DB::raw('count(*) as count'))
            ->groupBy('number_of_servings')
            ->get();

        $servingLabels = $servingNumbers->pluck('number_of_servings');
        $servingData = $servingNumbers->pluck('count');

        $data['user_count'] = DB::table('users')->where('role', '=', 2)->count();

        return view('dashboard', $data, compact('labels', 'data1', 'periodLabels', 'periodData', 'mealLabels', 'mealData', 'mealNumberLabels', 'mealNumberData', 'servingLabels', 'servingData'));
    }

}
