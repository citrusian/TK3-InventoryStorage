<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class EditProfileController extends Controller
{
    public function show(Request $request)
    {
        $userid = $request->get('postid');
        Log::debug("testreq: ".$userid);
        Session::put('user', $userid);
//        dd($userid);
        return redirect('edit-profile');
    }

    public function updateuser(Request $request)
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
        return back()->with('succes', 'Profile succesfully updated');
    }


    public function updatektp(Request $request)
    {
        // limit input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $curid = $request->get('postid');

        $imageName = $curid.'-KTP'.'.'.$request->image->extension();
//        $request->image->storeAs('images', $imageName);
//        storage folder not showing? temp dix, use public (not secure)
        $request->image->move(public_path('img/profile'), $imageName);

//        set current id to add / replace
//        $curid = $request->get('postid');
//        dd($curid);
        User::where('id',$curid)
            ->update([
                'profile_ktp_photo_path' => $imageName,
            ]);

        Session::put('user', $curid);
        return back()
            ->with('succes', 'KTP succesfully updated')
            ->with('image',$imageName);
    }

}
