@extends('layouts.app')

@section('content')
    <div id="alert">
        @include('components.alert')
    </div>
    {{--    @include('layouts.navbars.guest.navbar')--}}
    {{--    <main class="main-content  mt-0">--}}
    <div class="page-header align-items-start pt-5 pb-11 m-3 border-radius-lg"
    >
    </div>
    {{--        <div class="container">--}}
    <div class="container-fluid py-4"style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            {{--                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">--}}
            <div class="col-md-8">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Edit Barang</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updateitem') }}" enctype="multipart/form-data">
                            @csrf
                            <?php
                            $user = DB::table('data_barangs')->where('id',session('item'))->get();
                            ?>
                            <div id='HiddenView' style="display: none;">
                                <input class="form-control" type="text" name="postid" value="{{ $user[0]->id }}" >
                            </div>
                            <div class="row">
                                <p class="text-uppercase text-sm">Item Information</p>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nama" class="form-control-label">Nama</label>
                                        <input type="text" name="Nama" class="form-control" placeholder="Obat tralala" aria-label="Nama" value="{{ $user[0]->Nama }}" >
                                        @error('Nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Deskripsi" class="form-control-label">Deskripsi</label>
                                        <input type="text" name="Deskripsi" class="form-control" placeholder="Deskripsi Obat" aria-label="Deskripsi" value="{{ $user[0]->Deskripsi }}" >
                                        @error('Deskripsi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Jenis" class="form-control-label">Jenis Obat</label>
                                        {{--                                            fallback to old value if validator failed--}}
                                        <select type="Jenis" name="Jenis" class="form-control">
                                            <option value="Obat Batuk & Pilek"  {{ $user[0]->Jenis == 'Obat Batuk & Pilek' ? 'selected' : '' }}>
                                                Obat Batuk & Pilek
                                            </option>
                                            <option value="Obat Sakit Gigi" {{ $user[0]->Jenis == 'Obat Sakit Gigi' ? 'selected' : '' }}>
                                                Obat Sakit Gigi
                                            </option>
                                            <option value="Obat Diare" {{ $user[0]->Jenis == 'Obat Diare' ? 'selected' : '' }}>
                                                Obat Diare
                                            </option>
                                        </select>
                                        @error('Jenis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Stok" class="form-control-label">Stok</label>
                                        <input type="number" max="800"  name="Stok" class="form-control" placeholder="50" aria-label="Stok" value="{{ $user[0]->Stok }}" >
                                        @error('Stok') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                {{--                                    ----------------------------}}
                                <hr class="horizontal dark">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Harga_Beli" class="form-control-label">Harga Beli</label>
                                        <input type="number" name="Harga_Beli" class="form-control" placeholder="50" aria-label="Harga_Beli" value="{{ $user[0]->Harga_Beli }}" >
                                        @error('Harga_Beli') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Harga_Jual" class="form-control-label">Harga_Jual</label>
                                        <input type="number" name="Harga_Jual" class="form-control" placeholder="50" aria-label="Harga_Jual" value="{{ $user[0]->Harga_Jual }}" >
                                        @error('Harga_Jual') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                {{--                                    ----------------------------}}
                                <hr class="horizontal dark">
                                {{--                                    ----------------------------}}
                                <hr class="horizontal dark">


                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Foto Barang</p>
                                    <div class="row">
                                        <div class="col-sm text-center">
                                            Current Image
                                            <img src="img/barang/{{ $user[0]->image }}" width="100%">
{{--                                            <img src="img/barang/0-Obat-Example.png" width="100%">--}}
                                        </div>
                                        <div class="col-sm">
                                            <label class="form-label" for="inputImage">Select Image:</label>
                                            <input
                                                type="file"
                                                name="image"
                                                id="inputImage"
                                                class="form-control @error('image') is-invalid @enderror">

                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            {{--                                    </form>--}}
                                        </div>
                                    </div>
                                </div>

                                {{--                                    echo "<script>console.log('Debug Objects: " . {{ Session::get('$curid') }} . "' );</script>";--}}
                                {{Session::put('item', session('item'))}}
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update Item</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    </main>--}}
@endsection
