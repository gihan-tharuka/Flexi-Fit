<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Gallery;
use App\Models\MembershipPlan;
use App\Models\our_team;
use App\Models\product;
use App\Models\services;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index(){

        $blogs = BlogPost::latest()->get();
        $gallery = Gallery::all();
        $plans = MembershipPlan::all();
        $galleryImages = Gallery::all(); // Fetch all gallery images from the database
        $services = Services::all();
        $bestsellingProducts = Product::where('bestselling', 1)->get();
        $our_team = our_team::all();
        return view('home', compact('galleryImages', 'blogs', 'plans', 'bestsellingProducts' ,'gallery', 'services', 'our_team'));
    }
}
