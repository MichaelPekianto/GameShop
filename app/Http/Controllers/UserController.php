<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function updateprofile(Request $request){
        $user = User::find(auth()->user()->id);

        $rules= [
            'name'=> 'required',
            'email'=> 'required|email:dns|unique:users',
            'photo' => 'mimes:jpg,jpeg,png',
        ];
        $validation = Validator::make($request->all(), $rules);
        $user->password = bcrypt($request->password);
        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }
        $file = $request->file('photo');
        if ($file != null) {
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/images/profile', $file, $imageName);
            $user->image = 'images/profile/' . $imageName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->save();
        $messageprofile = "Updated successfully";
        return redirect('/profile');
    }
    public function updatepassword(Request $request){
        $user = User::find(auth()->user()->id);
         Validator::extend('checkpassword', function ($attribute, $value) use ($user) {
            return Hash::check($value, $user->password);
        });
        $msg = array('oldpassword.checkpassword' => "The Password didn't match our credentials!");
        $rules = [
            'oldpassword'=> "required|checkpassword:".$request->oldpassword,
            'newpassword'=> 'required|different:oldpassword',
            'confirmpassword'=> 'required|same:newpassword',
        ];
        $validation = Validator::make($request->all(), $rules,$msg);

        $user->password = Hash::make($request->newpassword);

        if ($validation->fails()) {
            return back()->withInput()->withErrors($validation);
        }

        $user->save();
        $message = "Updated successfully";
        return redirect('/profile');
    }
   
}
