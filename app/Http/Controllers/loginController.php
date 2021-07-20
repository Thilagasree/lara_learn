<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;
use DB;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
    }


    public function save(Request $request){
               $request->validate([
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
            ]);

        
        
            $data = $request->input();
            try{
                $student = new loginModel;
                $student->name = $data['name'];
                $student->email = $data['email'];
                $student->password = $data['password'];
                $student->save();
                return redirect('register')->with('status',"Insert successfully! please login with your Email");
            }
            catch(Exception $e){
                return redirect('register')->with('failed',"operation failed");
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

      return view('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $request->validate([
                
                'email'=>'required',
                'password'=>'required',
            ]);

       $getUser = DB::table('login')
                  ->where('email', '=', $request->email)
                  ->where('password', '=', $request->password)
                  ->first();
                if(!empty($getUser)&&is_object($getUser)){

                    return redirect('/dashboard'); // Welcome USer
                } 
                else {
                  // User not exist
                  return redirect('/login'); // and show the error
                }

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
