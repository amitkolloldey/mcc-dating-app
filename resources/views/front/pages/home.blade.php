@extends('front.layouts.app')
@section('title') MCC Dating App @stop
@section('content')
    <section class="slider_area" style="background: url({{asset('img/hero.jpg')}})">
        <div class="slider_inner">
            <div class="hero_img">

            </div>
        </div>
        <div class="registration_form_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="registration_form_s">
                            <h4>Signup For Free</h4>
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

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control"
                                               name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control "
                                               name="email" value="{{ old('email') }}" autocomplete="email">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username"  class="col-md-4 col-form-label text-md-right">Username</label>

                                    <div class="col-md-8">
                                        <input id="username" type="text" class="form-control"  name="username" value="{{ old('username') }}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                               class="form-control" name="password"
                                               autocomplete="new-password">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right"> Date Of Birth</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="date" value="{{old('date_of_birth')}}" id="date_of_birth"
                                               name="date_of_birth" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right"> Gender</label>
                                    <div class="col-md-8">
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
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="download_area">
        <div class="download_full_slider">
            <div class="container">
                <div class="row">
                    <div class="item">
                        <div class="download_app_icon">
                            <h3>Download <span>MCC</span><span>Dating</span> app</h3>
                            <h5>Free Available in All Store PlayStore, AppStore & Microsoft Store</h5>
                            <ul>
                                <li><a href="#"><i class="fa fa-android"></i></a></li>
                                <li><a href="#"><i class="fa fa-apple"></i></a></li>
                                <li><a href="#"><i class="fa fa-windows"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.includes.get_geo_location')
@stop
