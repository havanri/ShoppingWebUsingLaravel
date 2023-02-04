<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //
    public function index(){

        //Setting icon
        $settings  = Setting::all();

        // //Category Bac 1
        // $categoriesParent = Category::where('parent_id',0)->get();

        //Menu
        $menuParent = Menu::where('parent_id',0)->get();

        //Encrypt Cookie App\Http\Encryptcookie
        
        $productsOfCartFromLocal = json_decode(Cookie::get('productsOfCart'));
        if(!empty($productsOfCartFromLocal)){
            $products = [];
            foreach($productsOfCartFromLocal as $item){
                $product = Product::find($item->id);
                array_push($products,$product);
            }
            return view('cart.cart',compact('settings','menuParent','products','productsOfCartFromLocal'));
        }
        return view('cart.cart',compact('settings','menuParent'));
    }
    public function addProductInCart(){
        
    }
}
