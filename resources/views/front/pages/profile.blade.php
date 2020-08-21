@extends('front.layouts.app')
@section('title') Your Profile @stop
@section('content')
    <section class="banner_area profile_banner" style="background: url({{asset('img/cover.jpg')}})">
        <div class="profiles_inners">
            <div class="container">
                <div class="profile_content">
                    <div class="user_img">
                        <img class="img-thumbnail"
                             src="{{isset($user->image) ? asset('storage').'/'.$user->image : asset('img/default.jpg')}}"
                             alt="{{$user->name}}">
                    </div>
                    <div class="user_name">
                        <h3>{{$user->name}}</h3>
                        <h4>{{$user->age}} years old</h4>
                    </div>
                    @if($user->id == auth()->id())
                        <div class="right_side_content">
                            <a href="{{route('my_settings')}}" class="btn btn-primary"> <i class="fa fa-cogs"></i> Edit
                                Profile</a>
                        </div>
                    @else
                        <div class="right_side_content">
                            <button class="btn btn-primary" onclick="likeSomeone({{$user->id}})"
                                    id="like"> {!! (in_array($user->id, $my_likes)) ? '<i class="fa fa-thumbs-up "></i>  Liked' : '<i class="fa fa-thumbs-o-up "></i> Like' !!}</button>
                            <button class="btn btn-primary" id="dislike"
                                    onclick="dislikeSomeone({{$user->id}})">{!! (in_array($user->id, $my_dislikes)) ? '<i class="fa fa-thumbs-down "></i>  Disliked' : '<i class="fa fa-thumbs-o-down "></i> Dislike' !!}</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="blog_grid_area">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="members_profile_inners">
                        <div class="members_about_box">
                            <h4>Information</h4>
                            <p><strong>Age: </strong> {{$user->age}} years old</p>
                            <p><strong>Country: </strong> {{$user->country}}</p>
                            <p><strong>City: </strong> {{$user->city}}</p>
                            <p><strong>Date Of Birth: </strong> {{$user->date_of_birth}}</p>
                        </div>
                        <div class="members_about_box">
                            <h4>Bio</h4>
                            <p>{!! $user->bio !!}</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="right_sidebar_area">
                        <aside class="s_widget photo_widget">
                            <div class="s_title">
                                <h4>Interests</h4>
                            </div>
                            <ul class="tags_widget">
                                @forelse($user->interests as $interest)
                                    <li>
                                        <button class="btn btn-primary">{{$interest->name}}</button>
                                    </li>
                                @empty
                                    <p> No Interest Added!</p>
                                @endforelse
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    @include('front.partials.scripts')
@stop
