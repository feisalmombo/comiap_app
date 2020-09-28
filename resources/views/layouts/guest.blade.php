@extends('layouts.wrapper')

@section('layout')
    <div class="container fixed-top">
        <div class="row">
            <div id="main-menu" class="d-flex col-auto  ml-auto">
                <a href="{{ route('g_home') }}" class="py-4 px-2">Home</a>
                <a href="{{ route('sitelocator') }}" class="py-4 px-2">Testing Site Locator</a>
                <a href="{{ route('g_home') }}" class="py-4 px-2">Business</a>
                @guest
                    <a href="{{ route('register') }}" class="py-4 px-2">Register</a>
                    <a href="{{ route('login') }}" class="py-4 px-2">Login</a>

                    @else 
                        @if (Auth::user()->isA("sudo"))
                            <a href="{{ route('home') }}" class="py-4 px-2">Admin</a>
                        @endif

                        @if (Auth::user()->isA("patient"))
                            <a href="{{ route('patient') }}" class="py-4 px-2">Patient</a>
                        @endif

                        @if (Auth::user()->isA("business"))
                            <a href="{{ route('business') }}" class="py-4 px-2">Business</a>
                        @endif

                        <a href="{{ route('logout') }}" class="py-4 px-2"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                @endguest
            </div>
        </div>
    </div>

    @yield('content')
@endsection