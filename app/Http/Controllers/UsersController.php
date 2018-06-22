<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class UsersController extends Controller {
    public function index() {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->isAdmin == 0) {
            return redirect()->back();
        }
        session_start();
        $error  = '';
        $message = '';
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['messageerror'])) {
            $error = $_SESSION['messageerror'];
            unset($_SESSION['messageerror']);
        }
        $users=User::get();
        return view('users.index')->with('message', $message)->with('error', $error)->with('users', $users);
    }
    public function anyData(){
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        return Datatables::of(User::query())->make(true);
    }
    public function createUser() {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->isAdmin == 0) {
            return redirect()->back();
        }
        return view('users.add');
    }
    
    public function addUser(Request $request) {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->isAdmin == 0) {
            return redirect()->back();
        }
        session_start();
        $validator = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'phone'=> 'required|numeric|',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            
        ]);
        $image = $request->file('image');
        if ($image != NULL) {
            $destinationPath = public_path('/images/user');
            $filename = date('Ymd') . '_' . md5($image->getClientOriginalName() . microtime()).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
        }
        $created_at = gmdate('Y-m-d H:i:s');
        $updated_at = gmdate('Y-m-d H:i:s');
        
        $add_user = User::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'confirmed' => 1,
            'isAdmin' => 0,
            'image' => $image != NULL ? $filename : NULL,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
            
        ]);
        $_SESSION['message'] = 'User added successfully';
        return redirect()->route('user');
    }
    
    public function deleteUser($id) {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->isAdmin == 0) {
            return redirect()->back();
        }
        session_start();
        $category = User::find($id);
        
        
        $category = User::where('id', '=', $id)->delete();
            $_SESSION['message'] = 'User deleted successfully';
            return redirect()->route('user');
        
    }
    
    public function editUser(Request $request,$id) {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->isAdmin == 0) {
            return redirect()->back();
        }
        session_start();
        $user = User::find($id);
       
        if ($request->isMethod('get')) {
            return view('users/edit')
            ->with('user', $user);
        }
        $validator = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|',
           
        ]);
        
        $first_name= isset($request->first_name) ? $request->first_name : '';
        $last_name = isset($request->last_name) ? $request->last_name : '';
        $email = isset($request->email) ? $request->email : '';
        $password = isset($request->password) ? $request->password : '';
        $phone = isset($request->phone) ? $request->phone : '';
        $image = $request->file('image') !== null ? $request->file('image') : NULL;
        $updated_at = gmdate('Y-m-d H:i:s');
        if ($image != NULL) {
            $destinationPath = public_path('/images/user');
            $filename = date('Ymd') . '_' . md5($image->getClientOriginalName() . microtime()).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
        }
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->phone = $phone;
        $user->image = $image != NULL ? $filename : $user->image;
        $user->updated_at=$updated_at;
        if ($user->save() == 1) {
            $_SESSION['message'] = 'User updated successfully';
            return redirect()->route('user');
        }
    }
    
    public function redirectBack(Request $request){
        return redirect()->back();
    }
    
    public function showProfile(Request $request){
        if (!Auth::user()) {
            return redirect()->route('login');
        }
//         if (Auth::user()->isAdmin == 1) {
//             return redirect()->back();
//         }
        $user_id = auth()->user()->id;
        $user= User::find($user_id);
        return view('users.profile')->with('user',$user);
    }
    
    public function updateProfile(Request $request){
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $validator = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|',
            
        ]);
        session_start();
        $user_id = auth()->user()->id;
        $user= User::find($user_id);
        $first_name= isset($request->first_name) ? $request->first_name : '';
        $last_name = isset($request->last_name) ? $request->last_name : '';
        $email = isset($request->email) ? $request->email : '';
        $password = isset($request->password) ? $request->password : '';
        $phone = isset($request->phone) ? $request->phone : '';
        $image = $request->file('image') !== null ? $request->file('image') : NULL;
        $updated_at = gmdate('Y-m-d H:i:s');
        if ($image != NULL) {
            $destinationPath = public_path('/images/user');
            $filename = date('Ymd') . '_' . md5($image->getClientOriginalName() . microtime()).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
        }
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->phone = $phone;
        $user->image = $image != NULL ? $filename : $user->image;
        $user->updated_at=$updated_at;
        if ($user->save() == 1) {
            $_SESSION['message'] = 'User updated successfully';
            return redirect()->route('profile/show')->with('message',$message);
        }
    }
}
