@extends('layouts.wrapper')
@section('layout')
    <div style="height: 100vh; width: 100vw; background-image: url('./images/banner02.png'); background-repeat: no-repeat; background-position: center; background-size: cover; background-attachment:fixed;">
        <div class="@yield("bg")" style="height: 100vh; width: 100vw; background: @yield("bg", "rgba(75, 161, 210, 0.8)"); overflow:scroll;">
            <div class="container py-5 fixed-top">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('g_home') }}" class="text-light" style="font-weight: 300;">Go <strong style="font-weight: 500">Home</strong></a>
                    </div>
                </div>
            </div>
              
            @yield('content')
        </div>
    </div>
@endsection