@extends('layouts.app')

@section('title', 'Profile')

@section('css')
    <script src="https://kit.fontawesome.com/be5b1ff12e.js" crossorigin="anonymous"></script>
    <style>
        .bg-accent {
            background-color: var(--accent) !important;
            color: white !important;
        }

        .nav-pills .nav-link.active {
            color: white !important;
            background-color: var(--accent) !important;
        }

        .nav-link {
            color: var(--accent) !important;
        }
    </style>
@endsection

@section('background-color', 'bg-container')

@section('content')
    <div class="container w-75 m-auto mt-5">
        @if (Session::has('success'))
            <div class="toast-container end-0 ">
                <div id="liveToast" class="toast bg-success-subtle text-success-emphasis show" role="alert"
                    aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close float-end" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        <div class="container w-75">
            <div class="my-5 ">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card shadow">
                    <div class=" ">
                        <h3 class="py-3 px-4 mb-0">Profile</h3>
                    </div>
                    <form class="row" action="{{ route('profile.update') }}" method="POST" autocomplete="off">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="px-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-12 col-lg-3 border-end border-top ">
                            <ul id="myProfileTab" class="nav nav-pills flex-column " role="tablist"
                                aria-orientation="vertical">
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-end active rounded-start"
                                            href="#profile-details-tab" role="tab" data-bs-toggle="tab">Personal
                                            Details</a></h5>
                                </li>
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-end rounded-start" href="#gym-details-tab"
                                            role="tab" data-bs-toggle="tab">Gym
                                            Details</a>
                                    </h5>
                                </li>
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-end rounded-start"
                                            href="#profile-security-tab" role="tab" data-bs-toggle="tab">Security</a>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-9 ps-0 tab-content border-top">
                            <div id="profile-details-tab" class="tab-pane fade show active mb-4 p-3 p-md-4" role="tabpanel">
                                <div class="">
                                    {{-- Full Name --}}
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="ProfileName" name="name" type="text"
                                            value="{{ Auth::user()->name }}" value="{{ old('name') }}">
                                        <label class="small mb-1" for="name">Full Name</label>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Email Address -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="ProfileEmail" name="profileEmail" type="email"
                                            value="{{ Auth::user()->email }}" value="{{ old('profileEmail') }}">
                                        <label class="small mb-1" for="ProfileEmail">Email address</label>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Birthdate -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="birthdate" name="birthdate" type="date"
                                            value="{{ $profile->birthdate }}" value="{{ old('birthdate') }}">
                                        <label class="small mb-1" for="birthdate">Birth Date</label>
                                        @error('birthdate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Gender -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="gender" name="gender" type="text"
                                            value="{{ $profile->gender }}" value="{{ old('gender') }}">
                                        <label class="small mb-1" for="gender">Gender</label>
                                        @error('gender')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Civil Status --}}
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="civil_status" name="civil_status" type="text"
                                            value="{{ $profile->civil_status }}" value="{{ old('civil_status') }}">
                                        <label class="small mb-1" for="civil_status">Civil Status</label>
                                        @error('civil_status')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Form Group (Phone Number)-->
                                    <div class=" form-floating mb-3">
                                        <input class="form-control" id="Phone_number" name="contact_number" type="text"
                                            value="{{ $profile->phone }}">
                                        <label class="small mb-1" for="Phone_number">Contact Number</label>
                                        <p class="help-block">eg. 09123456789</p>
                                        @error('contact_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <!-- Form Group (Address)-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="address" name="address" type="text"
                                                value="{{ $profile->address }}">
                                            <label class="small mb-1" for="address">Street Address</label>
                                            @error('address')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <button class="btn bg-accent btn-lg" type="submit">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div id="gym-details-tab" class="tab-pane fade mb-4 p-3 p-md-4">
                                <div class="">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="heigth" name="heigth" type="number"
                                            value="{{ $profile->height }}" value="{{ old('heigth') }}" readonly>
                                        <label class="small mb-1" for="heigth">Height</label>
                                        @error('height')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="weigth" name="weigth" type="number"
                                            value="{{ $profile->weight }}" value="{{ old('weigth') }}">
                                        <label class="small mb-1" for="heigth">Weight</label>
                                        @error('weight')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="medical_info" name="medical_info" type="text"
                                            value="{{ $profile->medical_info }}" value="{{ old('medical_info') }}">
                                        <label class="small mb-1" for="medical_info">Medical Information</label>
                                        @error('medical_info')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="guardian" name="guardian" type="text"
                                            value="{{ $profile->guardian }}" value="{{ old('guardian') }}">
                                        <label class="small mb-1" for="guardian">Guardian</label>
                                        @error('guardian')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="my-4">
                                    <button class="btn bg-accent btn-lg" type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>
                    </form>

                    <!-- Security -->
                    <div id="profile-security-tab" class="tab-pane fade mb-4 p-3 p-md-4">
                        <div class="">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ Auth::user()->email }}" required autocomplete="email" hidden>

                                    <div class="my-4 text-center">
                                        <button class="btn bg-accent btn-lg w-50"
                                            type="submit">{{ __('Send Password Reset Link') }}</button>
                                    </div>
                                    <!-- Save changes button-->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection