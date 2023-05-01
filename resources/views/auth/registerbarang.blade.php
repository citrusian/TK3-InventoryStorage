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
                        <h5>Input Barang</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('registerbarang.perform') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <p class="text-uppercase text-sm">User Information</p>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nama" class="form-control-label">Nama</label>
                                        <input type="text" name="Nama" class="form-control" placeholder="Obat tralala" aria-label="Nama" value="{{ old('Nama') }}" >
                                        @error('Nama') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Deskripsi" class="form-control-label">Deskripsi</label>
                                        <input type="text" name="Deskripsi" class="form-control" placeholder="Deskripsi Obat" aria-label="Deskripsi" value="{{ old('Deskripsi') }}" >
                                        @error('Deskripsi') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Jenis" class="form-control-label">Jenis Obat</label>
                                        {{--                                            fallback to old value if validator failed--}}
                                        <select type="Jenis" name="Jenis" class="form-control">
                                            <option value="Obat Batuk & Pilek"  {{ old('Jenis') == 'Admin' ? 'selected' : '' }}>
                                                Obat Batuk & Pilek
                                            </option>
                                            <option value="Obat Sakit Gigi" {{ old('Jenis') == 'Customer' ? 'selected' : '' }}>
                                                Obat Sakit Gigi
                                            </option>
                                            <option value="Obat Diare" {{ old('Jenis') == 'Customer' ? 'selected' : '' }}>
                                                Obat Diare
                                            </option>
                                        </select>
                                        @error('Jenis') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Stok" class="form-control-label">Stok</label>
                                        <input type="number" max="800"  name="Stok" class="form-control" placeholder="50" aria-label="Stok" value="{{ old('Stok') }}" >
                                        @error('Stok') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                {{--                                    ----------------------------}}
                                <hr class="horizontal dark">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Harga_Beli" class="form-control-label">Harga Beli</label>
                                        <input type="number" name="Harga_Beli" class="form-control" placeholder="50" aria-label="Harga_Beli" value="{{ old('Harga_Beli') }}" >
                                        @error('Harga_Beli') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Harga_Jual" class="form-control-label">Harga_Jual</label>
                                        <input type="number" name="Harga_Jual" class="form-control" placeholder="50" aria-label="Harga_Jual" value="{{ old('Harga_Jual') }}" >
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
                                            Contoh Foto
                                            <img src="img/barang/0-Obat-Example.png" width="100%">
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

                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                            Conditions</a>
                                    </label>
                                    @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Add Item</button>
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
