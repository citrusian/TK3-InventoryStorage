<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KTPUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
//     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = auth()->id().'-KTP'.'.'.$request->image->extension();
//        $request->image->storeAs('images', $imageName);
//        storage folder not showing?
//        temp, use public
        $request->image->move(public_path('img/profile'), $imageName);

//        auth()->user()->update([
        Auth::user()->update([
            'profile_ktp_photo_path' => $imageName,
        ]);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
