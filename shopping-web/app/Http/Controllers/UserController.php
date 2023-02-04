<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function index()
    {
        //
        $users=$this->user->latest()->paginate(10);
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=$this->role::all();
        return view('admin.user.create',compact('roles'));
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
        $password=Hash::make($request->input('password'));
        dd($password);
        DB::beginTransaction();
        try {
            $user = $this->user::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);
            //insert roles
            if(!empty($request->role_id)){
                $user->roles()->attach($request->role_id); 
            }
            DB::commit();
            return redirect('/admin/users');
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
        $user=$this->user::find($id);
        $roles=$this->role::all();
        $roleOfUser=$user->roles;
        //dd($roleOfUser);
        return view('admin.user.edit',compact('roles','user','roleOfUser'));
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
        // $password=Hash::make($request->input('password'));
        // dd($password);
        DB::beginTransaction();
        try {
            $this->user->find($id)->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);
            $user = $this->user->find($id);
            //insert roles
            if(!empty($request->role_id)){
                $user->roles()->sync($request->role_id); 
            }
            DB::commit();
            return redirect('/admin/users');
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
            $this->user->find($id)->delete();
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
