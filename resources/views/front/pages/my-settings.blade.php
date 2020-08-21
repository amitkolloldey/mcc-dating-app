@extends('front.layouts.app')
@section('title') Your Profile @stop
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>
@stop
@section('content')
    <section class="banner_area" style="background: url({{asset('img/cover.jpg')}})">
        <div class="container">
            <div class="banner_content">
                <h3 title="Matches">Your Profile Settings</h3>
            </div>
        </div>
    </section>
    <section class="blog_grid_area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 left-settings">
                    <div id="profile_image" class="text-center">
                        <div id="message"></div>
                        <div id="my_image">
                            <img class="img-thumbnail"
                                 src="{{isset($user->image) ? asset('storage').'/'.$user->image : asset('img/default.jpg')}}"
                                 alt="{{$user->name}}" width="100%"
                                 id="preview">
                        </div>
                        <div class="fileUpload">
                            <input type="file" class="upload" id="change_image"/>
                            <span>Change Image</span>
                        </div>
                        <button class="btn-primary btn" id="after_upload" style="display: none">Upload</button>
                    </div>
                </div>
                <div class="col-md-9 right-settings">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs" id="profile_tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab"
                               aria-controls="home" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab"
                               aria-controls="security" aria-selected="false">Security</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="interest-tab" data-toggle="tab" href="#interest" role="tab"
                               aria-controls="interest" aria-selected="false">Interests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                               aria-controls="settings" aria-selected="false">Settings</a>
                        </li>
                    </ul>
                    <form action="{{route('change_settings', $user->username)}}" method="POST">
                        @csrf
                        <div class="tab-content" id="profile_tab_content">
                            <div class="tab-pane fade show active" id="general" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <h2>General</h2>


                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control"
                                               value="{{$user->name}}" name="name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-md-3 col-form-label text-md-right">Username</label>
                                    <div class="col-md-9">
                                        <input id="username" type="text" class="form-control"
                                               value="{{$user->username}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
                                    <div class="col-md-9">
                                        <input id="email" type="text" class="form-control" value="{{ $user->email}}"
                                               disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-9">
                                        <input id="phone" type="text" class="form-control"
                                               value="{{old('phone') ? old('phone') : $user->phone}}" name="phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="gender" name="gender">
                                            @foreach(\App\Models\User::GENDER as $key => $gender)
                                                @if(old('gender'))
                                                    <option
                                                        value="{{$key}}" {{old('gender') == $key ? 'selected' : ''}}>{{$gender}}</option>
                                                @else
                                                    <option
                                                        value="{{$key}}" {{$user->gender == $key ? 'selected' : ''}}>{{$gender}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="bio" class="col-md-3 col-form-label text-md-right">Bio</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="bio" id="bio" cols="30"
                                                  rows="10">{{old('bio') ? old('bio') : $user->bio}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-3 col-form-label text-md-right"> Date Of
                                        Birth</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date"
                                               value="{{old('date_of_birth') ? old('date_of_birth') : $user->date_of_birth}}"
                                               id="date_of_birth" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-md-3 col-form-label text-md-right"> Country</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text"
                                               value="{{old('country') ? old('country') : $user->country}}" id="country"
                                               name="country">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-3 col-form-label text-md-right"> City</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text"
                                               value="{{old('city') ? old('city') : $user->city}}" id="city"
                                               name="city">
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                <h2>Security</h2>


                                <p>If You Want To Reset Your Password. You can do it from <a
                                        href="{{route('password.request')}}">here</a>.</p>
                            </div>


                            <div class="tab-pane fade" id="interest" role="tabpanel" aria-labelledby="profile-tab">
                                <h2>Interests</h2>


                                <div class="form-group row">
                                    <label for="interests" class="col-md-3 col-form-label text-md-right">Select Your
                                        Interests</label>
                                    <div class="col-md-9">
                                        <select class="interest_select form-control" name="interests[]"
                                                multiple="multiple">
                                            @foreach($interests as $key => $interest)
                                                <option value="{{$key}}" {{in_array($key, $user_interests) ? 'selected' : ''}}>{{$interest}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="contact-tab">
                                <h2>Profile Settings</h2>


                                <div class="form-group row">
                                    <label for="show_age" class="col-md-3 col-form-label text-md-right">Show Age</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="show_age">
                                            <option value="1" {{isset($user_settings) && ($user_settings->show_age == 1) ? 'selected' : ''}}>Yes</option>
                                            <option value="0" {{isset($user_settings) && ($user_settings->show_age == 0) ? 'selected' : ''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="show_bio" class="col-md-3 col-form-label text-md-right">Show Bio</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="show_bio">
                                            <option value="1" {{isset($user_settings) && $user_settings->show_bio == 1 ? 'selected' : ''}}>Yes</option>
                                            <option value="0" {{isset($user_settings) && $user_settings->show_bio == 0 ? 'selected' : ''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="show_publicly" class="col-md-3 col-form-label text-md-right">Make your
                                        profile public</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="show_publicly">
                                            <option value="1" {{isset($user_settings) && ($user_settings->show_publicly == 1) ? 'selected' : ''}}>Yes</option>
                                            <option value="0" {{isset($user_settings) && $user_settings->show_publicly == 0 ? 'selected' : ''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="interested_in" class="col-md-3 col-form-label text-md-right">Interested
                                        In</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="interested_in">
                                            @foreach(\App\Models\UserSetting::INTERESTED_IN as $key => $interested_in)
                                                <option value="{{$key}}" {{isset($user_settings) && $user_settings->interested_in == $key ? 'selected' : ''}}>{{$interested_in}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-primary btn pull-right">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.interest_select').select2();
        });
    </script>
    <script>
        $("#change_image").change(function (event) {
            if (this.files && this.files[0]) {
                let data = new FormData();
                data.append('profile_image', this.files[0]);
                let url = "{{route('change_image')}}"
                axios.post(url, data)
                    .then(function (response) {
                        let message = document.getElementById('message')
                        if (response.data.validation) {
                            message.innerHTML = "<p class='alert alert-danger'>" + response.data.validation.profile_image + "</p>"
                        } else if (response.data.success) {
                            console.log(response.data)
                            let my_image = document.getElementById('my_image')
                            my_image.innerHTML = "<img src='{{asset('storage')}}/" + response.data.image + "' width='100%' class='img-thumbnail' />"
                            message.innerHTML = "<p class='alert alert-success'>" + response.data.success + "</p>"
                        } else {
                            message.innerHTML = "<p class='alert alert-danger'>Something Went Wrong!</p>"
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        });
    </script>
@stop
