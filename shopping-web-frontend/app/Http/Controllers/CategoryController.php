<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;

class CategoryController extends Controller
{

    private $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }
    public function index($slug,$id){

        $productOfCategory = Product::where('category_id',$id)->latest()->paginate(9);

        //Setting icon
        $settings  = Setting::all();

        //Category Bac 1
        $categoriesParent = Category::where('parent_id',0)->get();

        //Menu
        $menuParent = Menu::where('parent_id',0)->get();

        //Category find
        $findCat=Category::find($id);
        return view('category.category',compact('categoriesParent','settings','menuParent','productOfCategory','findCat'));
    }
}
