@extends('front.layouts.app')
@section('title') Your Matches @stop
@section('content')
    <section class="banner_area" style="background: url({{asset('img/cover.jpg')}})">
        <div class="container">
            <div class="banner_content">
                <h3 title="Matches">Your Matches</h3>
                <p class="text-white">You both have liked each others!</p>
            </div>
        </div>
    </section>
    <section class="active_members">
        <div class="container">
            <div class="row">
                @forelse($matches as $match)
                <div class="col-md-2 single_match">
                    <div class="active_mem_item">
                        <ul class="nav navbar-nav">
                            <li class="dropdown tool_hover">
                                <a href="{{route('user_profile', $match->username)}}" target="_blank">
                                    <img class="img-circle" src="{{isset($match->image) ? asset('storage').'/'.$match->image : asset('img/default.jpg')}}" alt="{{$match->name}}"></a>
                            </li>
                        </ul>
                        <h4>{{$match->name}}</h4>
                        <h5>{{$match->age}} years old</h5>
                        <h6>from {{$match->city}}, {{$match->country}}</h6>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <h4>No Match Yet!</h4>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@stop
