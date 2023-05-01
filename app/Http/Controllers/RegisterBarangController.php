<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\DataBarang;
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
        return view('auth.registerbarang');
    }

    public function store(Request $request)
    {

//        $curid = User::where('id')->count();
        $curid = DB::table('data_barangs')->count();
        $curid +=1;

        Log::debug("curridbar: ".$curid);
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
//        Log::debug("attr: ".[$attributes);

        $user = DataBarang::create($attributes);

        $imageName = $curid.'-Obat'.'.'.$request->image->extension();
        $request->image->move(public_path('img/barang'), $imageName);

        $barang = DB::table('data_barangs')
            ->where('id', $curid)
            ->update([
                'image' =>  $imageName,
            ]);
        Log::debug("curridbar: ".$barang);

        return back()
            ->with('succes','Succes! Item Added!')
            ->with('image',$imageName);
    }
}
