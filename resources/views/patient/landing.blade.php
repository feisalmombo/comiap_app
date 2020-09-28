@extends('layouts.guest-minimal')

@section('content')
    <div class="container py-5">
        <div class="row py-5 text-light">
            <div class="col">
                <h1 style="font-weight: 300; font-size: 48px; line-height: 56px;">Personal Landing Page</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card" style="border-radius: 10px">
                    <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p style="font-size: 18px">
                                        Hi! <br>
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </p>
                                </div>

                                <div class="col-auto">
                                    
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection