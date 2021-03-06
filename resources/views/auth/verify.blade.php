@extends('front.layouts.app')
@section('title') Verify @stop
@section('content')
    <div class="container auth_form_wrapper">
        <div class="row  ">
            <div class="col-md-12">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                    .
                </form>
            </div>
        </div>
    </div>
@endsection
