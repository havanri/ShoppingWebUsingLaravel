<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\ProductImages;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $product;
    private $productImages;
    private $tags;
    private $productTags;
    use StorageImageTrait;

    public function __construct(Product $product,ProductImages $productImages,Tag $tags,ProductTag $productTags)
    {
        $this->product=$product;
        $this->productImages=$productImages;
        $this->tags=$tags;
        $this->productTags=$productTags;
    } 
    public function index()
    {
        //
        $products = $this->product->latest()->paginate(7);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $htmlOption = $this->getCategory('');
        return view('admin.product.create',compact('htmlOption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {
        //dd('storage');
        //request / name / folder
        //Insert Product
        DB::beginTransaction();
        try {
            //code...
        $dataUpload =  $this->storageTraitUpload($request,'feature_image','product');
        $product = $this->product::create([
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name'),'-'),
            'price'=>$request->input('price'),
            'feature_image'=>$dataUpload['file_name'],
            'feature_image_path'=>$dataUpload['file_path'],
            'content'=>$request->input('content'),
            'user_id'=>auth()->id(),
            'category_id'=>$request->input('category_id')
        ]);
        // if(!empty($dataUpload)){  
        //     $product['feature_image']= $dataUpload['file_name'];
        //     $product['feature_image_path']= $dataUpload['file_path'];
        // }
        $product->save();

        //Insert data to product_images (Image_detail)
        if($request->hasFile('image_path')){
            foreach($request->image_path as $fileItem){
                $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
                $product->productImages()->create([
                    'image_name'=>$dataProductImageDetail['file_name'],
                    'image_path'=>$dataProductImageDetail['file_path'],
                ]);
                //DB::connection()->enableQueryLog();
                //$query = DB::getQueryLog();
                //dd($query);
            }
        }
        //Insert data to tag
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
                //create tag 
                //$tagInstance=$this->tags::firstOrCreate(['name' => $tagItem]);
                //insert bang trung gian 
                // ProductTag::create([
                //     'product_id'=>$product->id,
                //     'tag_id'=>$tagInstance->id
                // ]);
    
                $tagInstance=$this->tags::firstOrCreate(['name' => $tagItem]);
                $tagId[]=$tagInstance->id;
            }
            $product->tags()->attach($tagId); 
        } 
        DB::commit();
        return redirect('/admin/products');
        } catch (\Throwable $ex) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$ex->getMessage().' Line '.$ex->getLine());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = $this->product::find($id);
        $htmlOption = $this->getCategory($product->category->id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd(Str::slug($request->input('name'),'-'));
        DB::beginTransaction();
        try {
            //code...
        
        $dataProductUpdate=[
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name'),'-'),
            'price'=>$request->input('price'),
            'content'=>$request->input('content'),
            'user_id'=>auth()->id(),
            'category_id'=>$request->input('category_id')
        ];
        $dataUpload =  $this->storageTraitUpload($request,'feature_image','product');
        if(!empty($dataUpload)){
            $dataProductUpdate['feature_image']=$dataUpload['file_name'];
            $dataProductUpdate['feature_image_path']=$dataUpload['file_path'];
        }
        $this->product->find($id)->update($dataProductUpdate);
        $product = $this->product->find($id);
        // if(!empty($dataUpload)){  
        //     $product['feature_image']= $dataUpload['file_name'];
        //     $product['feature_image_path']= $dataUpload['file_path'];
        // }
        //$product->save();

        //Insert data to product_images (Image_detail)
        if($request->hasFile('image_path')){
            //delete images old
            $this->productImages->where('product_id',$id)->delete();

            foreach($request->image_path as $fileItem){
                $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
                $product->productImages()->create([
                    'image_name'=>$dataProductImageDetail['file_name'],
                    'image_path'=>$dataProductImageDetail['file_path'],
                ]);
            }
        }
        //Insert data to tag
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
                //create tag 
                //$tagInstance=$this->tags::firstOrCreate(['name' => $tagItem]);
                //insert bang trung gian 
                // ProductTag::create([
                //     'product_id'=>$product->id,
                //     'tag_id'=>$tagInstance->id
                // ]);
    
                $tagInstance=$this->tags::firstOrCreate(['name' => $tagItem]);
                $tagId[]=$tagInstance->id;
            }
            $product->tags()->sync($tagId); 
        } 
        DB::commit();
        return redirect('/admin/products');
        } catch (\Throwable $ex) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$ex->getMessage().' Line '.$ex->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $this->product->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$th->getMessage().' Line '.$th->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }

    }
    public function getCategory($parentId){
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive($parentId);
        //string[]
        return $htmlOption;
    }
}
