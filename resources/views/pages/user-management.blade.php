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
                    <h6>Action</h6>
                </div>


                <div class="card-body px-0 pt-0 pb-2">
                    <form role="form" method="GET" action={{ route('show_new') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">New Customer</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Customer List</h6>
                </div>


                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive-xl">
                        <table class="table align-items-center table-flush" id="table-id">
                            <thead>
                            <tr>
                                <th scope="col" class="sort align-middle text-center " data-sort="No">No.</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="KTP">KTP</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Nama">Nama</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Gender">Gender</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="TTL">TTL</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Address">Address</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Type">Type</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Action">Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th scope="col" class="sort align-middle text-center " data-sort="No">No.</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="KTP">KTP</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Nama">Nama</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Gender">Gender</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="TTL">TTL</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Address">Address</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Type">Type</th>
                                <th scope="col" class="sort align-middle text-center " data-sort="Action">Action</th>
                            </tr>
                            </tfoot>

                            <tbody class="Table">
                            @foreach ($q1 as $query)
                                <tr>
                                    <td class="No align-middle text-center text-wrap" style="width:3%;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $query->id }}
                                    </td>
                                    <td class="KTP" style="width: 15%; max-height: 20%;">
                                        <img src="img/profile/{{ $query->profile_ktp_photo_path }}" width="100%">
                                    </td>
                                    <td class="Nama align-middle text-center text-wrap">
                                        {{ $query->firstname }} {{ $query->lastname }}
                                    </td>
                                    <td class="Gender align-middle text-center text-wrap" style="width:15%;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $query->gender }}
                                    </td>
                                    <td class="TTL align-middle text-center text-wrap">
                                        {{ $query->TTL }}
                                    </td>
                                    <td class="Address align-middle text-center text-wrap"  style="width: 10%;">
                                        {{ $query->address }}
                                    </td>
                                    <td class="Type align-middle text-center text-wrap"  style="width: 10%;">
                                        {{ $query->idtype }}
                                    </td>
                                    <td class="Action align-middle text-center text-wrap"  style="width: 10%;">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <p class="text-sm font-weight-bold mb-0">Edit</p>
                                            <p class="text-sm font-weight-bold mb-0 ps-2">Delete</p>
                                        </div>
                                    </td>
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
