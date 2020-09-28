@extends('layouts.guest')

@section('content')
<section class="hero-section">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-auto text-light">
                <h1>COVID-19 Testing Center</h1>
                <h2>Test Type</h2>
                <p>Do you represent someone / taking test of myself</p>
                <div class="form-group">
                    <select name="test_type" id="" class="form-control">
                        <option value="">Testing for Myself</option>
                        <option value="">Testing for Someone Else</option>
                    </select>
                </div>
                <button class="btn btn-secondary btn-lg">Take Test</button>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid bg-primary">
    <div class="container">
        <div class="row justify-content-center py-5 text-center text-light">
            <div class="col-md-3 px-5">
                <img class="py-5" src="/svgs/world.svg" alt="" />
                <h5>Locate</h5>
                <p>Locate Nearest Testing Center</p>
            </div>
            <div class="col-md-3 px-5">
                <img class="py-5" src="/svgs/customer.svg" alt="" />
                <h5>Register</h5>
                <p>Register a Testing Center to Get Help</p>
            </div>
            <div class="col-md-3 px-5">
                <img class="py-5" src="/svgs/report.svg" alt="" />
                <h5>Facts</h5>
                <p>Get to Know Facts
                    About <strong>COVID-19</strong></p>
            </div>
        </div>
        <div class="row justify-content-center text-light py-2">
            <div class="col-md-7">
                <p class="text-center">A simple process of giving people an opportunity to
                    answer simple questions, and based on the result they will be directed to the nearest testing center.</p>
            </div>
        </div>
    </div>
</div>

<iframe width="100%" height="576" src="https://app.developer.here.com/coronavirus/" frameborder="0"></iframe>

<section class="content">
    <div class="container">
        Insights
    </div>
</section>
@endsection
