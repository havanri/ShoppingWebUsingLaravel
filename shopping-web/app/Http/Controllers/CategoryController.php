<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $category;

    public function __construct(Category $category)
    {
        $this->category=$category;
    } 
    public function index()
    {
        //
        $categories = $this->category->latest()->paginate(10);
        return view('admin.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive('');
        return view('admin.category.create',compact('htmlOption'));
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
        
        $category = $this->category::create([
            'name'=>$request->input('name'),
            'parent_id'=>$request->input('parent_id'),
            'slug'=>Str::slug($request->input('name'),'-')
        ]);
        //save databases
        $category->save();
        return redirect('/admin/categories');
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
        dd('show');
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
        $category = $this->category::find($id);
        $htmlOption =$this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('htmlOption','category'));
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
        //dd($request->input('name').$request->input('parent_id'));
        Category::where('id',$id)
                ->update([
                    'name'=>$request->input('name'),
                    'parent_id'=>$request->input('parent_id'),
                    'slug'=>Str::slug($request->input('name'),'-')
                ]);
        return redirect('/admin/categories');
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
        $category = $this->category::find($id);
        $category->delete();
        return redirect('/admin/categories');
    }
    
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive($parentId);
        //string[]
        return $htmlOption;
    }
}
