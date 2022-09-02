@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="first_name" class="col-form-label text-md-end">{{ __('First_name') }}</label>
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="name"
                                        value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="last_name" class="col-form-label text-md-end">{{ __('Last_name') }}</label>
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="name"
                                        value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="email"
                                        class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="gender"
                                        class="col-form-label text-md-end">{{ __('Gender') }}</label>
                                    <select name="gender" id="gender" class="form-control @error('email') is-invalid @enderror">>
                                        <option @selected(old('gender') == 'm') value="m">Male</option>
                                        <option @selected(old('gender') == 'f') value="f">Female</option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="password-confirm"
                                        class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <label for="phone"
                                        class="col-form-label text-md-end">{{ __('Phone') }}</label>
                                    <input id="phone" type="tel" class="form-control"
                                        name="phone" value="{{old('phone')}}" >
                                </div>
                                <div class="col-md-6">
                                    <label for="image"
                                        class="col-form-label text-md-end">{{ __('Image') }}</label>
                                    <input id="image" type="file" class="form-control"
                                        name="image" value="{{old('phone')}}">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
