<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Traits\DebugToConsole;

class RegisterBarangController extends Controller
{
    use DebugToConsole;
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

//        $curid = User::where('id')->count();
        $curid = DB::table('Users')->count();
        $curid +=1;

        Log::debug("currid: ".$curid);


        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
//            'password' => 'required|min:5|max:255|confirmed',
//            Note: Using confirmed doesn't show alert message at confirmation input field
//            workaround: create "confirm-password' field
            'password' => 'required|min:5|max:255',
            'confirm-password' => 'same:password',
            'terms' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'TTL' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
//            'profile_ktp_photo_path' => $imageName,
        ]);

        $user = User::create($attributes);

        $imageName = $curid.'-KTP'.'.'.$request->image->extension();
        $request->image->move(public_path('img/profile'), $imageName);

        $customer = DB::table('users')
            ->where('id', $curid)
            ->update([
                'profile_ktp_photo_path' =>  $imageName,
            ]);
        Log::debug("currid: ".$customer);

        return back()
            ->with('succes','User Created')
            ->with('image',$imageName);
    }
}
