@extends('front.layouts.app')
@section('title') Sign Up @stop
@section('content')
    <div class="container auth_form_wrapper">
        <div class="row  ">
            <div class="col-md-12">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger form_errors">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"  class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control"  name="email" value="{{ old('email') }}" autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username"  class="col-md-4 col-form-label text-md-right">Username</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control"  name="username" value="{{ old('username') }}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control" name="password"
                                   autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date_of_birth" class="col-md-4 col-form-label text-md-right"> Date Of Birth</label>
                        <div class="col-md-6">
                            <input class="form-control" type="date" value="{{old('date_of_birth')}}" id="date_of_birth"
                                   name="date_of_birth" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right"> Gender</label>
                        <div class="col-md-6">
                            <select class="form-control" id="gender" name="gender">
                                @foreach(\App\Models\User::GENDER as $key => $gender)
                                    <option
                                        value="{{$key}}" {{old('gender') == $key ? 'selected' : ''}}>{{$gender}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hidden_fields">
                        <div id="lat_long">

                        </div>
                    </div>
                    <div class="form-group row mb-0">
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
    @include('front.includes.get_geo_location')
@endsection
