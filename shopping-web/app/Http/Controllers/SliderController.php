<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    private $slider;
    use StorageImageTrait;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd('index');
        $sliders = $this->slider->latest()->paginate(10);;
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //dd($request->all());
        DB::beginTransaction();
        try {
            //code...
            $dataUpload =  $this->storageTraitUpload($request,'image_name','slider');
            $slider = $this->slider::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image_path'=>$dataUpload['file_path'],
            'image_name'=>$dataUpload['file_name'],
            ]);
            $slider->save();
            DB::commit();
            return redirect('/admin/sliders');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$th->getMessage().' Line '.$th->getLine());
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
        $slider=$this->slider::find($id);
        return view('admin.slider.edit',compact('slider'));
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
        DB::beginTransaction();
        try {
            //code...
            $dataUpdate = [
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
            ];
            $dataUpload =  $this->storageTraitUpload($request,'image_name','slider');
            if(!empty($dataUpload)){
                $dataUpdate['image_path']=$dataUpload['file_path'];
                $dataUpdate['image_name']=$dataUpload['file_name'];
            }  
            $this->slider->find($id)->update($dataUpdate);
            DB::commit();
            return redirect('/admin/sliders');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Log::error('Message '.$th->getMessage().' Line '.$th->getLine());
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
            $this->slider->find($id)->delete();
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
}
