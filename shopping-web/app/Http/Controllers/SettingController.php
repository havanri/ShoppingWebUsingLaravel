<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting=$setting;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = $this->setting->latest()->paginate(5);;
        return view('admin.setting.index',compact('settings'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.setting.create');
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
        DB::beginTransaction();
        try {
            //code...
            $dataCreate  = [
                'config_key'=> $request->input('config_key'),
                'config_value'=> $request->input('config_value'),
            ];
            $this->setting->create($dataCreate);
            //$this->setting->save($dataCreate);
            DB::commit();
            return redirect('/admin/settings');
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
        $setting=$this->setting::find($id);
        return view('admin.setting.edit',compact('setting'));
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
                'config_key'=>$request->input('config_key'),
                'config_value'=>$request->input('config_value'),
            ];
            $this->setting->find($id)->update($dataUpdate);
            DB::commit();
            return redirect('/admin/settings');
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
            $this->setting->find($id)->delete();
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
