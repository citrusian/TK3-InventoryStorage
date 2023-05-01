<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class EditItemController extends Controller
{
    public function show(Request $request)
    {
        $userid = $request->get('postid');
        Log::debug("testitm: ".$userid);
        Session::put('item', $userid);
//        dd($userid);
        return redirect('edit-item');
    }

    public function updateitem(Request $request)
    {
        Log::debug("postid: ".$request->get('postid'));
        $curid = $request->get('postid');
        $user = DB::table('users')->where('id',$curid)->get();

        Log::debug("curid: ".$curid);
        Log::debug("Nama: ".$request->get('Nama'));
        Log::debug("Deskripsi: ".$request->get('Deskripsi'));
        Log::debug("Jenis: ".$request->get('Jenis'));
        Log::debug("Stok: ".$request->get('Stok'));
        Log::debug("Harga_Beli: ".$request->get('Harga_Beli'));
        Log::debug("Harga_Jual: ".$request->get('Harga_Jual'));


        $attributes = request()->validate([
            'Nama' => 'required|max:255|min:2',
            'Deskripsi' => 'required|max:255|min:2',
            'Jenis' => 'required',
            'Stok' => 'required',
            'Harga_Beli' => 'required',
            'Harga_Jual' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        DataBarang::where('id',$curid)
            ->update([
            'Nama' => $request->get('Nama'),
            'Deskripsi' => $request->get('Deskripsi'),
            'Jenis' => $request->get('Jenis'),
            'Stok' => $request->get('Stok') ,
            'Harga_Beli' => $request->get('Harga_Beli') ,
            'Harga_Jual' => $request->get('Harga_Jual') ,
//            'image' => $request->get('image') ,
        ]);


//        not working....
//        need to find how to check if image same, maybe name + md5
//        $imageName = $curid.'-Obat'.'.'.$request->image->extension();
//        Log::debug("imagekey: ".$imageName);
//        if ($imageName != NULL){
////            $imageName = $curid.'-Obat'.'.'.$request->image->extension();
//            $request->image->move(public_path('img/barang'), $imageName);
//
//            DataBarang::where('id',$curid)
//                ->update([
//                    'image' => $imageName,
//                ]);
//        }


        $imageName = $curid.'-Obat'.'.'.$request->image->extension();
        $request->image->move(public_path('img/barang'), $imageName);

//        $barang = DB::table('data_barangs')
//            ->where('id', $curid)
//            ->update([
//                'image' =>  $imageName,
//            ]);


        DataBarang::where('id',$curid)
            ->update([
                'image' => $imageName,
            ]);

//        Log::debug("curridbar: ".$barang);

        Session::put('item', $curid);
        Log::debug("testitm: ".$curid);
        Log::debug("session: ".session('item'));
        return back()
            ->with('succes','Succes! Item Added!');



    }

}
