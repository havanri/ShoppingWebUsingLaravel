<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu=$menu;
    } 
    public function index()
    {
        //
        $menus=$this->menu->latest()->paginate(10);
        return view('admin.menu.index')->with('menus',$menus);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive('');
        return view('admin.menu.create',compact('htmlOption'));
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
        $menu = $this->menu::create([
            'name'=>$request->input('name'),
            'parent_id'=>$request->input('parent_id'),
            'slug'=>Str::slug($request->input('name'),'-')
        ]);
        //save databases
        $menu->save();
        return redirect('/admin/menus');
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
        $menu = $this->menu::find($id);
        $htmlOption = $this->getMenu($menu->parent_id);
        return view('admin.menu.edit',compact('htmlOption','menu'));
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
        $this->menu::where('id',$id)->update([
            'name'=>$request->input('name'),
            'parent_id'=>$request->input('parent_id'),
            'slug'=>Str::slug($request->input('name'),'-')
        ]);
        return redirect('/admin/menus');
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
        $menu = $this->menu::find($id);
        $menu->delete();
        return redirect('/admin/menus');

    }

    public function getMenu($parentId){
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive($parentId);
        //string[]
        return $htmlOption;
    }
}
