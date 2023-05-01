@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
{{--    <div class="card shadow-lg mx-4 card-profile-bottom">--}}
{{--    </div>--}}
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form role="form" method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">User Information</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
{{--                                        <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}" disabled>--}}
                                        <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
{{--                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>--}}
                                        <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"  value="{{ old('firstname', auth()->user()->firstname) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname" value="{{ old('lastname', auth()->user()->lastname) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div id='Customer_View'>
                                <p class="text-uppercase text-sm">Contact Information</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Address</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ old('address', auth()->user()->address) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">City</label>
                                            <input class="form-control" type="text" name="city" value="{{ old('city', auth()->user()->city) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Country</label>
                                            <input class="form-control" type="text" name="country" value="{{ old('country', auth()->user()->country) }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Postal code</label>
                                            <input class="form-control" type="tel" maxlength="8" name="postal" value="{{ old('postal', auth()->user()->postal) }}">
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
                                            {{--                                            fallback to old value if validator failed--}}
                                            <select type="gender" name="gender" class="form-control">
                                                <option value="Male" {{ old('gender', Auth::user()->gender) == 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female" {{ old('gender', Auth::user()->gender) == 'Female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">ID Type</label>
                                                                                        fallback to old value if validator failed
                                            <select type="idtype" name="idtype" class="form-control">
                                                <option value="Admin" {{ old('idtype', Auth::user()->idtype) == 'Admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                                <option value="Customer" {{ old('idtype', Auth::user()->idtype) == 'Customer' ? 'selected' : '' }}>
                                                    Customer
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id='Customer_View2'>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Foto KTP</p>
                            <div class="row">
                                <div class="col-sm">
                                    <img src="img/profile/{{ Auth::user()->profile_ktp_photo_path }}" width="100%">
                                </div>
                                <div class="col-sm">
                                    <form role="form" method="POST" action={{ route('profile_ktp') }} enctype="multipart/form-data">
                                        @csrf
                                        <label class="form-label" for="inputImage">Select Image:</label>
                                        <input
                                            type="file"
                                            name="image"
                                            id="inputImage"
                                            class="form-control @error('image') is-invalid @enderror">

                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="card-header pb-0">
                                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Upload</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
{{--                                    <img src="/img/profile/team-3.jpg"--}}
{{--                                    <img src="{{ Auth::user()->profile_photo_path }}"--}}
                                    <img src="{{ Auth::user()->profile_photo_path }}"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? 'Lastname' }}
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ auth()->user()->city ?? 'city' }}, {{ auth()->user()->country ?? 'country' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <script>--}}
{{--            var node;--}}
{{--            --}}{{--if({{ auth()->user()->email}} === 1) {--}}
{{--            if('{{ Auth::user()->idtype}}' === 'Admin') {--}}
{{--                document.getElementById('Customer_View').style.display = "none"--}}
{{--                document.getElementById('Customer_View2').style.display = "none"--}}
{{--            }--}}
{{--            else{--}}
{{--            }--}}
{{--        </script>--}}
    </div>
{{--    @include('layouts.footers.auth.footer')--}}
@endsection
