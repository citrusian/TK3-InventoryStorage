@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Item Data'])
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="./assets/js/simplePagination.js"></script>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Item List</h6>
                </div>


                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive-xl">
                        <table class="table align-items-center table-flush" id="table-id">
                            <thead>
                            <tr>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Image">image</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Nama">Nama</th>
                                <th scope="col" class="sort align-middle text-center word-wrap" data-sort="Deskripsi">Deskripsi</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Jenis">Jenis</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Stok">Stok</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Harga_Beli">Harga_Beli</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Harga_Jual">Harga_Jual</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Action">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Image">image</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Nama">Nama</th>
                                <th scope="col" class="sort align-middle text-center word-wrap" data-sort="Deskripsi">Deskripsi</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Jenis">Jenis</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Stok">Stok</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Harga_Beli">Harga_Beli</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Harga_Jual">Harga_Jual</th>
                                <th scope="col" class="sort align-middle text-center text-wrap" data-sort="Action">Action</th>
                            </tr>
                            </tfoot>

                            <tbody class="Table">
                            @foreach ($q1 as $query)
                                <tr>
                                    <td class="Images" style="width: 15%;max-height: 20%;">
                                        <img src="img/barang/{{ $query->image }}" width="100%">
                                    </td>
                                    <td class="Nama align-middle text-center text-wrap">
                                        {{ $query->Nama }}
                                    </td>
                                    <td class="Deskripsi align-middle text-center text-wrap" style="width:15%;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $query->Deskripsi }}
                                    </td>
                                    <td class="Jenis align-middle text-center text-wrap">
                                        {{ $query->Jenis }}
                                    </td>
                                    <td class="Stok align-middle text-center text-wrap"  style="width: 10%;">
                                        {{ $query->Stok }}
                                    </td>
                                    <td class="Harga_Beli align-middle text-center text-wrap"  style="width: 10%;">
                                        {{ $query->Harga_Beli }}
                                    </td>
                                    <td class="Harga_Jual align-middle text-center text-wrap"  style="width: 10%;">
                                        {{$query->Harga_Jual}}
                                    </td>
                                    <td class="Action align-middle text-center text-wrap"  style="width: 10%;">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
{{--                                    <td class="Action">--}}
{{--                                        {{$query->Action}}--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer"  style="border-radius: 0 0;">
                        <script>
                            $("#table-id").simplePagination({
                                perPage: 5,
                                currentPage: 1,
                                previousButtonClass: "btn btn-twitter",
                                nextButtonClass: "btn btn-twitter"
                            });
                        </script>
                    </div>




                </div>
            </div>



        </div>



    </div>
@endsection
