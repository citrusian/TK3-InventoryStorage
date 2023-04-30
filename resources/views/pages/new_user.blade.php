@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'New Customer'])
{{--    <div class="card shadow-lg mx-4 card-profile-bottom">--}}
{{--    </div>--}}
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div id='Admin_View'>
                    <form role="form" method="POST" action={{ route('profile_new') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Enter Customer Information</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"  placeholder="John">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname" placeholder="Doe">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">TTL</label>
                                        <input class="form-control" type="date" name="TTL" value="2018-11-23" id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Gender</label>
                                        <select class="form-control" type="gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="example-text-input" class="form-control-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="example-text-input" class="form-control-label">Password Confirmation</label>
                                    <input type="password" name="confirm-password" class="form-control form-control-lg" placeholder="Password Confirmation" aria-label="Password"  >
                                    @error('confirm-password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                            </div>
                            <hr class="horizontal dark">


                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Address</label>
                                            <input class="form-control" type="text" name="address"
                                                   placeholder="Monumen Nasional, Jalan Tugu Monas, RT.5/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">City</label>
                                            <input class="form-control" type="text" name="city" placeholder="Jakarta">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Country</label>
                                            <input class="form-control" type="text" name="country" placeholder="Indonesia">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Postal code</label>
                                            <input class="form-control" type="tel" maxlength="8" name="postal" placeholder="10110">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Foto KTP</p>
                            <div class="row">
                                <div class="col-sm text-center">
                                    Contoh Foto
                                    <img src="img/profile/{{ Auth::user()->profile_ktp_photo_path }}" width="100%">
                                </div>
                                <div class="col-sm">
{{--                                    <form role="form" method="POST" action={{ route('new_user') }} enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
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
                        <div class="card-header pb-0 align-middle text-center">
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Create New User</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>




        <script>
            var node;
            if('{{ Auth::user()->idtype}}' === 'Admin') {
                document.getElementById('Admin_View').style.display = "none"
            }
            else{
            }
        </script>















    </div>
@endsection
