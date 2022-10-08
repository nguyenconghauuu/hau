<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Utils\AppUtils;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $users = User::where('role',AppUtils::ROLE_USER)->paginate(AppUtils::ITEM_PER_PAGE);
            // dd($users);
            return view('admin.user.index',compact('users'));
        }
        catch(\Exception $e){
            Log::error($e->getMessage().$e->getTraceAsString());
        }
    }

    public function create(){
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        //
        try{
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password), // ma hoa password
                'email' => $request->email,
            ]);
            return redirect()->route('admin.user.index');
       }catch(\Exception $e){
            Log::error($e->getMessage().$e->getTraceAsString());
            return back()->with('error','Register user fail!')->withInput();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
