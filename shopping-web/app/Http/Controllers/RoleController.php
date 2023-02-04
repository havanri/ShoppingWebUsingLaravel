<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    private $user;
    private $role;
    private $permission;
    public function __construct(User $user,Role $role,Permission $permission)
    {
        $this->user=$user;
        $this->role=$role;
        $this->permission=$permission;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=$this->role->latest()->paginate(5);
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = $this->permission->where('parent_id',0)->get();
        return view('admin.role.create',compact('permissions'));
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
            $role = $this->role::create([
                'name'=>$request->input('name'),
                'display_name'=>$request->input('display_name'),
            ]);
            //insert roles
            if(!empty($request->permission_id)){
                $role->permissions()->attach($request->permission_id); 
            }
            DB::commit();
            return redirect('/admin/roles');
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
        $role = $this->role->find($id);
        $permissions = $this->permission->where('parent_id',0)->get();
        $permissionOfRole=$role->permissions;
        return view('admin.role.edit',compact('permissions','role','permissionOfRole'));
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
            $this->role->find($id)->update([
                'name'=>$request->input('name'),
                'display_name'=>$request->input('display_name'),
            ]);
            $role = $this->role->find($id);
            //insert permissions
            if(!empty($request->permission_id)){
                $role->permissions()->sync($request->permission_id); 
            }
            DB::commit();
            return redirect('/admin/roles');
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
            $this->role->find($id)->delete();
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
