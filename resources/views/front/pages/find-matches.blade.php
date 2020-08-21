@extends('front.layouts.app')
@section('title') Your Matches @stop
@section('content')
    <section class="banner_area" style="background: url({{asset('img/cover.jpg')}})">
        <div class="container">
            <div class="banner_content">
                <h3 title="Matches">Find Your Matches Here</h3>
                <p class="text-white">Some of the profiles based on your interest and within 5km Radius</p>
            </div>
        </div>
    </section>
    <section class="active_members">
        <div class="container">
            <div class="row">
                <div class="text-center col-md-12">
                    {{$matches->links()}}
                </div>
                @forelse($matches as $match)
                    <div class="col-md-12 single_find_match text-center">
                        <div class="active_mem_item">
                            <a href="{{route('user_profile', $match->username)}}" target="_blank">
                                <img class="img-thumbnail"
                                     src="{{isset($match->image) ? asset('storage').'/'.$match->image : asset('img/default.jpg')}}"
                                     alt="{{$match->name}}">
                            </a>
                            <h4>{{$match->name}}</h4>
                            <p>{{$match->age}} years old</p>
                            <p>from {{$match->city}},{{$match->country}}</p>
                            <p class="mt-2">
                                <button class="btn btn-primary" onclick="likeSomeone({{$match->id}})" id="like"> {!! (in_array($match->id, $my_likes)) ? '<i class="fa fa-thumbs-up "></i>  Liked' : '<i class="fa fa-thumbs-o-up "></i> Like' !!}</button>
                                <button class="btn btn-primary" id="dislike" onclick="dislikeSomeone({{$match->id}})">{!! (in_array($match->id, $my_dislikes)) ? '<i class="fa fa-thumbs-down "></i>  Disliked' : '<i class="fa fa-thumbs-o-down "></i> Dislike' !!}</button>
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 single_find_match text-center">
                        <h2>No Match Found!</h2>
                    </div>
                @endforelse
                <div class="text-center col-md-12">
                    {{$matches->links()}}
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    @include('front.partials.scripts')
@stop
