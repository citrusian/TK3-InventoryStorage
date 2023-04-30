<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

//        $imageName = time().'.'.$request->image->extension();
        $imageName = auth()->id().'-KTP'.'.'.$request->image->extension();

//        $request->image->move(public_path('images'), $imageName);
//        $request->image->storeAs('images', $imageName);
        $request->image->move(public_path('img/profile'), $imageName);

        /*
            Write Code Here for
            Store $imageName name in DATABASE from HERE
        */

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }
}
