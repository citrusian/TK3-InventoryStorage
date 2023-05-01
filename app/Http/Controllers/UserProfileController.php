<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        Log::debug("TTL: ".$request->get('TTL'));
        Log::debug("gender: ".$request->get('gender'));
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'city' => ['required'],
            'country' => ['required'],
            'postal' => ['required'],
            'TTL' => ['required','date'],
            'gender' => ['required'],
            'idtype' => ['required'],
        ]);

        auth()->user()->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address') ,
            'city' => $request->get('city') ,
            'country' => $request->get('country') ,
            'postal' => $request->get('postal') ,
            'TTL' => $request->get('TTL'),
            'gender' => $request->get('gender'),
            'idtype' => $request->get('idtype'),
        ]);

//        ?? why this code doesn't work??
//        $user = User::update($attributes);
        return back()->with('succes', 'Profile succesfully updated');
    }


    public function ktp(Request $request)
    {
        // limit input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $imageName = auth()->id().'-KTP'.'.'.$request->image->extension();
//        $request->image->storeAs('images', $imageName);
//        storage folder not showing? temp dix, use public (not secure)
        $request->image->move(public_path('img/profile'), $imageName);

//        set current id to add / replace
        $curid = auth()->id();
        User::where('id',$curid)
            ->update([
            'profile_ktp_photo_path' => $imageName,
        ]);

        return back()
            ->with('succes', 'KTP succesfully updated')
            ->with('image',$imageName);
    }

    public function show_new()
    {
//        return view('pages.new_user');
        return view('auth.register');
    }

    public function new(Request $request)
    {
        $email = $request->input('email');
        $findemail = User::where('email', $email)->get();
        if ($findemail->count() > 0) {
            return back()->with('danger', 'Email already existed');
        }

        $curid = User::where('id')
            ->count();
        $curid +=1;

        $imageName = $curid.'-KTP'.'.'.$request->image->extension();
        $request->image->move(public_path('img/profile'), $imageName);

        User::where('id',$curid)
            ->update([
                'profile_ktp_photo_path' => $imageName,
            ]);


        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $user = User::create($attributes);


        return back()
            ->with('succes','Succes! User Created!');
    }
}
