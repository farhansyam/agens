<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Models\notif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function get($user)
    {
        // $user = User::whereName($user)->first();
        // dd($user->name);
    }

    public function profile()
    {
        $notifs = notif::whereStatus(1)->get();
        $jumlahNotif = count($notifs);
        return view('backend.profile',compact('notifs','jumlahNotif'));
    }

    public function update(Request $request)
    {
        $pw = Hash::make($request->password);
        // $pw = 123;
          $user = Auth::user();
      
    //      $this->validate($request, [
    //     'name' => 'required|max:255|unique:users,name,'.$user->id,
    //     'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    //     'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    // ]);

    /**
     * storing the input fields name & email in variable $input
     * type array
     **/
    if(empty($request->password))
    {
           if(empty($request->file('avatar')))
           {
               $input = $request->only('email','username');
               $user->update($input);
            }
            else{
                  $file= $request->file('avatar');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['avatar']= $filename;
                   $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'avatar' => $filename,
        ]);
           }
 
    }else
    {
        $input = $request->only('email','username','password');
        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'password' => $pw,
        ]);

    }

    

    return back();

    }
}
