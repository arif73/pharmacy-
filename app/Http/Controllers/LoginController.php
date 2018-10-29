<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
      public function index(){
        $user=DB::table('users')
        ->select('role')
        ->distinct()
        ->get();
        
        return view('welcome')->with('user',$user);
   }

   public function authenticate(Request $request){
        if (Auth::attempt([
        	'email'=>$request->email,
         'password'=>$request->password,
             'role'=>$request->role  ])) {

        	$user=User::where('role',$request->role)->first();
        	if ($user->isAdmin()) {
        		return view('admin.dashboard');
        	}
            if ($user->isManager()) {
        		return view('manager.dashboard');
        	}
        	if ($user->isSalesman()) {
        		return view('salesman.dashboard');
        	}
        }
        return redirect()->back()->with('error-message','your email and password combination is wrong');
           
      
   }
   
   public function store(Request $request){
        

      

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->password=bcrypt($request->password);
        if($request->hasFile('file')){
            $image=$request->file('file');
            $filename=time().".".$image->getClientOriginalExtension();
            $location = public_path('images/');
            $image->move($location,$filename);
            $user->photo=$filename;
        }

      $user->save();

      return redirect()->back()->with('successfull','information uploaded successfully');

   } 


}
