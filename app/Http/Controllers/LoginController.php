<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }
    public function login(Request $request){
        try{
            $loginInfo = [
                'username' => $request ->username,
                'password' => $request->password
            ];
            if(Auth::attempt($loginInfo)){
                $request ->session()->regenerate();

                return redirect()->route('user.index');
            }

            return back()->with('error','Username or password is invalid!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage().$e->getTraceAsString());
            return back()->with('error','Login fail');
       }
    }
    public function register(){
        return view('register');
    }
    public function RegisterUser(RegisterRequest $request)
    {
       try{
            $pass_confirm = $request->confirmpassword;
            $password = $request->password;
            if($password == $pass_confirm){
                User::create([
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password), // ma hoa password
                    'email' => $request->email,
                ]);
            } else {
                return back()->with('error','Two password must be match!')->withInput();
            }
            return back()->with('success','Register user successfully!');
       }catch(\Exception $e){
            Log::error($e->getMessage().$e->getTraceAsString());
            return back()->with('error','Register fail')->withInput();
       }
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
