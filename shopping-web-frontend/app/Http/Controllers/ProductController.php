<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private $tag;
    public function __construct(Tag $tag)
    {
        $this->tag=$tag;
    }
    public function index($slug,$id){
        //Product
        $product = Product::find($id);

        //Product cua Tag lien quan | not optimized :(((

        $productOfAllTag=[];
        //$productOfAllTagId=[];
        $tagsOfProduct=$product->tags;
        foreach($tagsOfProduct as $tagOfProductItem){
            $productsOfTag=$tagOfProductItem->products;
            foreach($productsOfTag as $productOfTagItem){
                $check=false;
                //check isset
                $check = $this->findAllWithId($productOfAllTag,$productOfTagItem->id);
                //check current product
                if($productOfTagItem->id==$id){
                    $check=true;
                }
                // foreach($productOfAllTag as $item){
                //     if($item->id==$productOfTagItem->id){
                //         //
                //         $check=true;
                //     }
                // }
                //add vao mang allTag neu san pham chua ton tai trong mang
                if($check==false){
                    //array_push($productOfAllTagId,$productOfTagItem->id);
                    array_push($productOfAllTag,$productOfTagItem);
                } 
            }
        }
        //Splice get 4 element(limit 4 product of all tag lien quan )
        $productOfAllTag=array_splice($productOfAllTag, 0, 4);
        //dd($productOfAllTagId);


        //Product Recommends
        $productRecommends = Product::latest('views_count','desc')->take(12)->get();

        //Menu
        $menuParent = Menu::where('parent_id',0)->get();
        return view('product.product',compact('menuParent','product','productOfAllTag','productRecommends'));
    }
    public function findAllWithId($objects, $id) {
        return array_filter($objects, function($toCheck) use ($id) { 
            return $toCheck->id == $id; 
        });
    }
}
