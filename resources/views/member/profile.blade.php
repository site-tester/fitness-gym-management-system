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

        /* .nav-link {
            color: var(--accent);
        } */
    </style>
@endsection

@section('background-color', 'bg-container')

@section('content')

    <div class="container-fluid w-100 w-md-75 m-auto pt-3">
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
        <div class="container-fluid container-md w-100 w-md-75 mt-5">
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

                        <div class="col-12 col-lg-3 p-3 p-md-0 ps-md-4 pe-md-4">
                            <ul id="myProfileTab" class="nav nav-underline flex-column " role="tablist"
                                aria-orientation="vertical">
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-start active link-danger" href="#profile-details-tab"
                                            role="tab" data-bs-toggle="tab">Personal
                                            Details</a></h5>
                                </li>
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-start link-danger" href="#gym-details-tab"
                                            role="tab" data-bs-toggle="tab">Gym
                                            Details</a>
                                    </h5>
                                </li>
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-start link-danger" href="#profile-notification-tab"
                                            role="tab" data-bs-toggle="tab">Notifications</a>
                                    </h5>
                                </li>
                                <li class="nav-item ">
                                    <h5><a class="nav-link w-100 float-end text-start link-danger" href="#profile-security-tab"
                                            role="tab" data-bs-toggle="tab">Security</a>
                                    </h5>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-9 p-3 p-md-0 tab-content ">
                            <div id="profile-details-tab" class="tab-pane fade show active mb-4 p-3 p-md-4" role="tabpanel">
                                <div class="">
                                    {{-- Full Name --}}
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="ProfileName" name="name" type="text"
                                            value="{{ Auth::user()->name ?? old('name') }}">
                                        <label class="small mb-1" for="name">Full Name <span
                                                class="text-danger">*</span></label>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Email Address -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="ProfileEmail" name="profileEmail" type="email"
                                            value="{{ Auth::user()->email ?? old('profileEmail') }}">
                                        <label class="small mb-1" for="ProfileEmail">Email address <span
                                                class="text-danger">*</span></label>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Birthdate -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="birthdate" name="birthdate" type="date"
                                            value="{{ $profile->membershipDetails->birthdate ?? old('birthdate') }}">
                                        <label class="small mb-1" for="birthdate">Birth Date <span
                                                class="text-danger">*</span></label>
                                        @error('birthdate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="age" name="age" type="number"
                                            value="{{ $profile->membershipDetails->age ?? old('age') }}" disabled>
                                        <label class="small mb-1" for="age">Age</label>
                                        <p class="help-block">Age is automatically calculated upon updating of Birth Date
                                        </p>
                                        @error('birthdate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Gender -->
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="gender" name="gender">
                                            <option disabled>Select one</option>
                                            <option value="Male"
                                                {{ ($profile->membershipDetails->gender ?? old('gender')) == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ ($profile->membershipDetails->gender ?? old('gender')) == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Others"
                                                {{ ($profile->membershipDetails->gender ?? old('gender')) == 'Others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>

                                        <label class="small mb-1" for="gender">Gender <span
                                                class="text-danger">*</span></label>
                                        @error('gender')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Civil Status --}}
                                    <div class="form-floating mb-3">
                                        {{-- <input class="form-control" id="civil_status" name="civil_status" type="text"
                                            value="{{ $profile->membershipDetails->civil_status ?? old('civil_status') }}"> --}}
                                        <select class="form-select" id="civil_status" name="civil_status">
                                            <option disabled>Select one</option>
                                            <option value="Single"
                                                {{ ($profile->membershipDetails->civil_status ?? old('civil_status')) == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Married"
                                                {{ ($profile->membershipDetails->civil_status ?? old('civil_status')) == 'Married' ? 'selected' : '' }}>
                                                Married</option>
                                            <option value="Widowed"
                                                {{ ($profile->membershipDetails->civil_status ?? old('civil_status')) == 'Widowed' ? 'selected' : '' }}>
                                                Widowed</option>
                                            <option value="Divorced"
                                                {{ ($profile->membershipDetails->civil_status ?? old('civil_status')) == 'Divorced' ? 'selected' : '' }}>
                                                Divorced</option>
                                        </select>

                                        <label class="small mb-1" for="civil_status">Civil Status <span
                                                class="text-danger">*</span></label>
                                        @error('civil_status')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Form Group (Phone Number)-->
                                    <div class=" form-floating mb-3">
                                        <input class="form-control" id="Phone_number" name="contact_number"
                                            type="text"
                                            value="{{ $profile->membershipDetails->phone ?? old('contact_number') }}">
                                        <label class="small mb-1" for="Phone_number">Contact Number <span
                                                class="text-danger">*</span></label>
                                        <p class="help-block">eg. 09123456789</p>
                                        @error('contact_number')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-group">
                                        <!-- Form Group (Address)-->
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="address" name="address" type="text"
                                                value="{{ $profile->membershipDetails->address ?? old('address') }}">
                                            <label class="small mb-1" for="address">Street Address <span
                                                    class="text-danger">*</span></label>
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
                                            value="{{ $profile->membershipDetails->height ?? old('heigth') }}"
                                            @if (Auth::user()->rfid_number == null) title="Please visit the gym to update this detail." @endif
                                            disabled>
                                        <label class="small mb-1" for="heigth">Height ({{$profile->membershipDetails->height_raw_unit ?? ''}})</label>
                                        @if (Auth::user()->rfid_number == null)
                                            <p class="help-block fst-italic"><span class="text-danger">*</span>Please
                                                visit the gym to update this detail.</p>
                                        @endif
                                        @error('height')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="weigth" name="weigth" type="number"
                                            value="{{ $profile->membershipDetails->weight ?? old('weigth') }}"
                                            @if (Auth::user()->rfid_number == null) title="Please visit the gym to update this detail." @endif
                                            disabled>
                                        <label class="small mb-1" for="heigth">Weight ({{$profile->membershipDetails->weight_raw_unit ?? ''}})</label>
                                        @if (Auth::user()->rfid_number == null)
                                            <p class="help-block fst-italic"><span class="text-danger">*</span>Please
                                                visit the gym to update this detail.</p>
                                        @endif
                                        {{-- <p class="help-block">Please visit the gym to update your details.</p> --}}
                                        @error('weight')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">

                                        @php
                                            $bmiCategory = '';
                                            if (isset($profile->membershipDetails->bmi)) {
                                                $bmi = $profile->membershipDetails->bmi;
                                                if ($bmi < 18.5) {
                                                    $bmiCategory = 'Underweight';
                                                } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                                                    $bmiCategory = 'Normal';
                                                } elseif ($bmi >= 25 && $bmi < 29.9) {
                                                    $bmiCategory = 'Overweight';
                                                } else {
                                                    $bmiCategory = 'Obese';
                                                }
                                            }
                                        @endphp

                                        <input class="form-control" id="bmi" name="bmi" type="text"
                                            value="{{ isset($profile->membershipDetails->bmi) ? number_format($profile->membershipDetails->bmi, 2) . ' (' . $bmiCategory . ')' : old('bmi') }}"
                                            @if (Auth::user()->rfid_number == null) disabled
                                                title="Please visit the gym to update this detail." @endif
                                            disabled>
                                        <label class="small mb-1" for="bmi">BMI</label>
                                        @if (Auth::user()->rfid_number == null)
                                            <p class="help-block fst-italic"><span class="text-danger">*</span>Please
                                                visit the gym to update this detail.</p>
                                        @endif
                                        {{-- <p class="help-block">Please visit the gym to update your details.</p> --}}
                                        @error('weight')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="medical_info" name="medical_info" type="text"
                                            value="{{ $profile->membershipDetails->medical_info ?? old('medical_info') }}"
                                            @if (Auth::user()->rfid_number == null) disabled
                                                title="Please visit the gym to update this detail." @endif>
                                        <label class="small mb-1" for="medical_info">Medical Information</label>
                                        @if (Auth::user()->rfid_number == null)
                                            <p class="help-block fst-italic"><span class="text-danger">*</span>Please
                                                visit the gym to update this detail.</p>
                                        @endif
                                        @error('medical_info')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="guardian" name="guardian" type="text"
                                            value="{{ $profile->membershipDetails->guardian ?? old('guardian') }}"
                                            @if (Auth::user()->rfid_number == null) disabled
                                                title="Please visit the gym to update this detail." @endif>
                                        <label class="small mb-1" for="guardian">Guardian</label>
                                        @if (Auth::user()->rfid_number == null)
                                            <p class="help-block fst-italic"><span class="text-danger">*</span>Please
                                                visit the gym to update this detail.</p>
                                        @endif
                                        @error('guardian')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if (Auth::user()->rfid_number == null)
                                    <div class="my-4">
                                        <button class="btn bg-accent btn-lg" type="submit"
                                            disabled>{{ __('Save') }}</button>
                                    </div>
                                @else
                                    <div class="my-4">
                                        <button class="btn bg-accent btn-lg" type="submit">{{ __('Save') }}</button>
                                    </div>
                                @endif
                            </div>
                    </form>

                    <div id="profile-notification-tab" class="tab-pane fade mb-4 p-3 p-md-4">
                        <div class="">
                            <div class="form-floating mb-3">
                                <div class="my-4 text-center">
                                    <button class="btn bg-accent btn-lg w-50" type="button"
                                        id="subscribeNotificationButton">
                                        {{ __('Enable Device Notification') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

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

@section('scripts')

    <script>
        const subscribeButton = document.getElementById("subscribeNotificationButton");
        const applicationServerKey =
            'BHobm4neAHKzOXazDwe8YKOB4TdSijuCLmj6R3sFXLXH7daMmXXW39S-GCbS7MxydAWxSvyz40PXKhVktTtCZNA';

        function updateButtonState(isSubscribed) {
            subscribeButton.textContent = isSubscribed ? "{{ __('Disable Device Notifications') }}" :
                "{{ __('Enable Device Notifications') }}";
        }

        function sendSubscriptionToServer(subscription, isNewSubscription = true) {
            fetch(isNewSubscription ? '/notification-subscribe' : '/notification-unsubscribe', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(subscription),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Server response:', data);
                    updateButtonState(!isNewSubscription);
                    window.location.reload(); // Refresh the page to reflect status
                })
                .catch(error => {
                    console.error('Error sending subscription to server:', error);
                });
        }

        function unsubscribeDevice(subscription) {
            subscription.unsubscribe()
                .then(successful => {
                    console.log('User unsubscribed:', successful);
                    sendSubscriptionToServer(subscription, false);
                })
                .catch(error => {
                    console.error('Error unsubscribing:', error);
                });
        }

        function urlBase64ToUint8Array(base64String) {
            const padding = '='.repeat((4 - base64String.length % 4) % 4);
            const base64 = (base64String + padding)
                .replace(/-/g, '+')
                .replace(/_/g, '/');

            const rawData = window.atob(base64);
            const outputArray = new Uint8Array(rawData.length);

            for (let i = 0; i < rawData.length; ++i) {
                outputArray[i] = rawData.charCodeAt(i);
            }
            return outputArray;
        }

        function initializePushSubscription() {
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(registration => {
                        console.log('Service Worker registered:', registration);
                        return registration.pushManager.getSubscription();
                    })
                    .then(subscription => {
                        if (subscription) {
                            console.log('Already subscribed on this device:', subscription.endpoint);
                            updateButtonState(true);
                        } else {
                            console.log('Not subscribed on this device.');
                            updateButtonState(false);
                        }

                        subscribeButton.addEventListener("click", () => {
                            navigator.serviceWorker.ready.then(registration => {
                                registration.pushManager.getSubscription()
                                    .then(currentSubscription => {
                                        if (currentSubscription) {
                                            unsubscribeDevice(currentSubscription);
                                        } else {
                                            const convertedVapidKey = urlBase64ToUint8Array(
                                                applicationServerKey);
                                            registration.pushManager.subscribe({
                                                    userVisibleOnly: true,
                                                    applicationServerKey: convertedVapidKey,
                                                })
                                                .then(newSubscription => {
                                                    console.log('Subscribed on this device:', newSubscription.endpoint);
                                                    sendSubscriptionToServer(newSubscription, true);
                                                })
                                                .catch(error => {
                                                    console.error('Subscribe error:', error);
                                                });
                                        }
                                    });
                            });
                        });
                    })
                    .catch(error => {
                        console.error('Service Worker registration failed:', error);
                    });
            } else {
                alert('Push notifications are not supported by your browser.');
            }
        }

        window.addEventListener('load', initializePushSubscription);
    </script>
@endsection
