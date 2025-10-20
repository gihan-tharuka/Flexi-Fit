<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use App\Models\services;
use Illuminate\Http\Request;

class Navigationcontroller extends Controller
{
   public function our_services()
        {
            $services = Services::all();
            return view('pages.our_services', compact('services'));
        }

    public function pricing()
    {
        $plans = MembershipPlan::all();
        return view('pages.pricing', compact('plans'));
    }

    public function bmi()
    {
        return view('pages.bmi_calculator');
    }

    public function contact()
    {
        return view('pages.Contact_us');
    }
}
