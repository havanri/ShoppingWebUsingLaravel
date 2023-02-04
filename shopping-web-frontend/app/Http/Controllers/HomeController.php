<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){

        //Slider
        $sliders = Slider::latest()->limit(3)->get();

        //Setting icon
        $settings  = Setting::all();

        //Category Bac 1
        $categoriesParent = Category::where('parent_id',0)->get();

        //Category Bac 2
        $categoriesChilds=Category::where('parent_id',"!=",0)->get();
        //dd($categoriesChilds);

        //New Product !!! --feature product
        $products = Product::latest()->limit(6)->get();

        //Product Recommends
        $productRecommends = Product::latest('views_count','desc')->take(12)->get();

        //Menu
        $menuParent = Menu::where('parent_id',0)->get();
        return view('home.home',compact('sliders','categoriesParent','products','productRecommends','settings','menuParent','categoriesChilds'));
    }
    public function test(){

        return view('test');
    }
}
